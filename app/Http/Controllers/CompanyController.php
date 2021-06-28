<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Xfly\Model\Company;
use App\Xfly\Model\Drone;
use App\Xfly\Model\Product;
use App\Xfly\Model\Address;
use App\Xfly\Model\Contact;
use App\Xfly\Model\Notifier;
use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Http\Requests\ContactCreateRequest;
use App\Http\Requests\AddressUpdateRequest;
use App\Http\Requests\AddressCreateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use PDF;

class CompanyController extends Controller
{
    private $total_drones_page = 4;

    public function create()
    {
        return view('Companies.create');
    }

    public function addContact($companyId)
    {
        return view('Companies.Contacts.create', compact('companyId'));
    }

    public function addAddress($companyId)
    {
        return view('Companies.Addresses.create', compact('companyId'));
    }

    public function search(Request $request)
    {
        $companies = Company::where('name', 'like', '%' . $request->search . '%')->get();
        $notifiers = Notifier::all();

        return view('welcome', compact('companies', 'notifiers'));
    }

    public function searchServices(Request $request)
    {
        $companies = Company::where('name', 'like', '%' . $request->search . '%')->get();
        $notifiers = Notifier::all();

        return view('Services.selection', compact('companies', 'notifiers'));
    }

    public function store(CompanyCreateRequest $request)
    {
        if ($company = Company::create($request->validated())) {
            $avatar = $request->file('avatar');

            $avatarName = 'nullAvatar.png';

            if ($avatar != null) {
                $avatarName = Str::random(15);
                $avatarName = "{$avatarName}.{$avatar->getClientOriginalExtension()}";
                Storage::disk('companies_images')->put($avatarName, File::get($avatar->getRealPath()));
            }

            $company->contacts()->createMany($request->getContactsData());
            $company->addresses()->createMany($request->getAddressesData());

            $company->update([
                'avatar' => $avatarName,
            ]);

            $companies = Company::all();

            return redirect('/')->with('companies');
        }

        return 'Erro ao cadastrar o Cliente!';
    }

    public function storeContact(ContactCreateRequest $request)
    {
        $contact = DB::transaction(function () use ($request) {
            return Contact::create($request->validated());
        });

        $companies = Company::all();

        return redirect('/')->with('companies');
    }

    public function storeAddress(AddressCreateRequest $request)
    {
        $address = DB::transaction(function () use ($request) {
            return Address::create($request->validated());
        });

        $companies = Company::all();

        return redirect('/')->with('companies');
    }

    public function show()
    {
        $companies = Company::all();

        return view('Companies.show', compact('companies'));
    }

    public function edit(Company $company)
    {
        $contacts = Contact::where('company_id', $company->id)->get();
        $addresses = Address::where('company_id', $company->id)->get();

        return view('Companies.edit', compact('company', 'contacts', 'addresses'));
    }

    public function drones(Company $company)
    {
        $drones = Drone::where('company_id', $company->id)->paginate($this->total_drones_page);
        $notifiers = Notifier::where('company_id', $company->id)->where('drone_id', '!=', null)->get();

        return view('Companies.drones', compact('company', 'drones', 'notifiers'));
    }

    public function products(Company $company)
    {
        $products = Product::where('company_id', $company->id)->paginate($this->total_drones_page);
        $notifiers = Notifier::where('company_id', $company->id)->where('product_id', '!=', null)->get();

        return view('Companies.products', compact('company', 'products', 'notifiers'));
    }

    public function editContact($id)
    {
        $contact = Contact::where('id', $id)->get();

        return view('Companies.Contacts.edit', compact('contact'));
    }

    public function editAddress($id)
    {
        $address = Address::where('id', $id)->get();

        return view('Companies.Addresses.edit', compact('address'));
    }

    public function update(CompanyUpdateRequest $request, Company $company)
    {
        $oldAvatar = $company->avatar;

        $company->update($request->validated());

        $avatar = $request->file('avatar');

        $avatarName = 'nullImage.png';

        if ($avatar != null) {
            if ($avatar) {
                if ($oldAvatar != 'nullAvatar.png') {
                    Storage::disk('companies_images')->delete($oldAvatar);
                }

                $avatarName = Str::random(15);
                $avatarName = "{$avatarName}.{$avatar->getClientOriginalExtension()}";
                Storage::disk('companies_images')->put($avatarName, File::get($avatar->getRealPath()));
            }
        } elseif ($company->avatar != 'nullImagem.png') {
            $avatarName = $company->avatar;
        }

        $company->update([
            'avatar' => $avatarName,
        ]);

        $companies = Company::all();

        return redirect('/')->with('companies');
    }

    public function updateContact(ContactUpdateRequest $request)
    {
        $contact = Contact::where('id', $request->id)->get();

        $contact = DB::transaction(function () use ($request, $contact) {
            $contact[0]->update($request->validated());

            return $contact;
        });

        $companies = Company::all();

        return redirect('/')->with('companies');
    }

    public function destroyContact(Request $request)
    {
        if ($request->confirm == 1) {
            Contact::where('id', $request->id)->delete();
        }

        $companies = Company::all();

        return redirect('/')->with('companies');
    }

    public function updateAddress(AddressUpdateRequest $request)
    {
        $address = Address::where('id', $request->id)->get();

        $address = DB::transaction(function () use ($request, $address) {
            $address[0]->update($request->validated());

            return $address;
        });

        $companies = Company::all();

        return redirect('/')->with('companies');
    }

    public function destroyAddress(Request $request)
    {
        if ($request->confirm == 1) {
            Address::where('id', $request->id)->delete();
        }

        $companies = Company::all();

        return redirect('/')->with('companies');
    }

    public function destroy(Request $request)
    {
        $company = Company::where('id', $request->id)->get();

        if ($request->confirm == 1) {
            if ($company[0]['avatar'] != 'nullAvatar.png') {
                Storage::disk('companies_images')->delete($company[0]['avatar']);
            }

            Contact::where('company_id', $company[0]['id'])->delete();
            Address::where('company_id', $company[0]['id'])->delete();
            Drone::where('company_id', $company[0]['id'])->delete();
            Product::where('company_id', $company[0]['id'])->delete();
            Notifier::where('company_id', $company[0]['id'])->delete();

            Company::where('id', $request->id)->delete();
        }

        $companies = Company::all();

        return redirect('/')->with('companies');
    }

    public function showRestore()
    {
        $companies = Company::onlyTrashed()->get();

        return view('Companies.restore', compact('companies'));
    }

    public function restore($id)
    {
        Company::onlyTrashed()->where('id', $id)->restore();
        Contact::onlyTrashed()->where('company_id', $id)->restore();
        Address::onlyTrashed()->where('company_id', $id)->restore();

        $companies = Company::all();

        return redirect('/')->with('companies');
    }

    public function reports()
    {
        return view('Companies.report');
    }

    public function reportAllCompanies()
    {
        $companies = Company::all();

        $pdf = PDF::loadView('Companies.Reports.reportAllCompanies', compact('companies'));

        return $pdf->setPaper('a4')->stream('Relatorio_Todos_Clientes.pdf');
    }

    public function viewCreatedAtCompanies()
    {
        return view('Companies.reportCreatedAtCompanies');
    }

    public function viewOwnerCompanies()
    {
        return view('Companies.reportOwnerCompanies');
    }

    public function reportCreatedAtCompanies(Request $request)
    {
        $companies = Company::where('created_at', $request->date)->get();

        $pdf = PDF::loadView('Companies.Reports.reportCreatedAtCompanies', compact('companies'));

        return $pdf->setPaper('a4')->stream('Relatorio_Clientes_Por_Data.pdf');
    }

    public function reportOwnerCompanies(Request $request)
    {
        $companies = Company::where('owner', $request->owner)->get();

        $pdf = PDF::loadView('Companies.Reports.reportOwnerCompanies', compact('companies'));

        return $pdf->setPaper('a4')->stream('Relatorio_Clientes_Por_Responsável.pdf');
    }
}
