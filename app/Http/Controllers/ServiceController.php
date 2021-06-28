<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Xfly\Model\Service;
use App\Xfly\Model\Company;
use App\Xfly\Model\Drone;
use App\Xfly\Model\Product;
use App\Xfly\Model\User;
use App\Http\Requests\ServiceCreateProductRequest;
use App\Http\Requests\ServiceUpdateProductRequest;
use App\Http\Requests\ServiceCreateDroneRequest;
use App\Http\Requests\ServiceUpdateDroneRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ServicesExport;
use PDF;

class ServiceController extends Controller
{
    private $total_pages = 10;
    private $today;

    public function __construct()
    {
        $this->today = date('Y-m-d');
    }

    public function index()
    {
        $services = Service::orderByRaw('updated_at DESC')->paginate($this->total_pages);

        return view('Services.welcome', compact('services'));
    }

    public function createProduct(Product $product)
    {
        $users = User::all();

        return view('Services.create_product', compact('product', 'users'));
    }

    public function createDrone(Drone $drone)
    {
        $users = User::all();

        return view('Services.create_drone', compact('drone', 'users'));
    }

    public function selection()
    {
        $companies = Company::paginate($this->total_pages);

        return view('Services.selection', compact('companies'));
    }

    public function storeProduct(ServiceCreateProductRequest $request)
    {
        if ($service = Service::create($request->validated())) {
            $image = $request->file('image');

            $imageName = 'nullImage.png';

            if ($image != null) {
                $imageName = Str::random(15);
                $imageName = "{$imageName}.{$image->getClientOriginalExtension()}";
                Storage::disk('services_images')->put($imageName, File::get($image->getRealPath()));
            }

            $service->update([
                'image' => $imageName,
            ]);

            $services = Service::paginate($this->total_pages);

            return redirect('/services')->with('services');
        }

        return 'Erro ao cadastrar o Serviço!';
    }

    public function storeDrone(ServiceCreateDroneRequest $request)
    {
        if ($service = Service::create($request->validated())) {
            $image = $request->file('image');
            $param = $request->file('param');

            $imageName = 'nullImage.png';
            $paramName = 'nullParam.param';

            if ($image != null) {
                $imageName = Str::random(15);
                $imageName = "{$imageName}.{$image->getClientOriginalExtension()}";
                Storage::disk('services_images')->put($imageName, File::get($image->getRealPath()));
            }

            if ($param != null) {
                $paramName = Str::random(15);
                $paramName = "{$paramName}.{$param->getClientOriginalExtension()}";
                Storage::disk('services_params')->put($paramName, File::get($param->getRealPath()));
            }

            $service->update([
                'param' => $paramName,
                'image' => $imageName,
            ]);

            $services = Service::orderByRaw('updated_at DESC')->paginate($this->total_pages);

            return redirect('/services')->with('services');
        }

        return 'Erro ao cadastrar o Serviço!';
    }

    public function editProduct(Service $service)
    {
        $users = User::all();
        $products = Product::where('company_id', $service->company_id)->get();
        $item = Product::where('id', $service->product_id)->get();

        return view('Services.edit_product', compact('service', 'users', 'products', 'item'));
    }

    public function editDrone(Service $service)
    {
        $users = User::all();
        $item = Drone::where('id', $service->drone_id)->get();
        $drones = Drone::where('company_id', $service->company_id)->get();

        return view('Services.edit_drone', compact('service', 'users', 'item', 'drones'));
    }

    public function updateDrone(ServiceUpdateDroneRequest $request, Service $service)
    {
        $oldImage = $service->image;
        $oldParam = $service->param;

        $service->update($request->validated());

        $image = $request->file('image');
        $param = $request->file('param');

        if ($oldImage == 'nullImage.png') {
            $imageName = 'nullImage.png';
        } else {
            $imageName = $oldImage;
        }

        if ($oldParam == 'nullParam.param') {
            $paramName = 'nullParam.param';
        } else {
            $paramName = $oldParam;
        }

        if ($image != null) {
            if ($image) {
                if ($oldImage != 'nullImage.png') {
                    Storage::disk('services_images')->delete($oldImage);
                }

                $imageName = Str::random(15);
                $imageName = "{$imageName}.{$image->getClientOriginalExtension()}";
                Storage::disk('services_images')->put($imageName, File::get($image->getRealPath()));
            }
        }

        if ($param != null) {
            if ($param) {
                if ($oldParam != 'nullParam.param') {
                    Storage::disk('services_params')->delete($oldParam);
                }

                $paramName = Str::random(15);
                $paramName = "{$paramName}.{$param->getClientOriginalExtension()}";
                Storage::disk('services_params')->put($paramName, File::get($param->getRealPath()));
            }
        }

        $service->update([
            'param' => $paramName,
            'image' => $imageName,
            'updated_at' => $this->today,
        ]);

        $services = Service::orderByRaw('updated_at DESC')->paginate($this->total_pages);

        return redirect('/services')->with('services');
    }

    public function updateProduct(ServiceUpdateProductRequest $request, Service $service)
    {
        $oldImage = $service->image;

        $service->update($request->validated());

        $image = $request->file('image');

        if ($oldImage == 'nullImage.png') {
            $imageName = 'nullImage.png';
        } else {
            $imageName = $oldImage;
        }

        if ($image != null) {
            if ($image) {
                if ($oldImage != 'nullImage.png') {
                    Storage::disk('services_images')->delete($oldImage);
                }

                $imageName = Str::random(15);
                $imageName = "{$imageName}.{$image->getClientOriginalExtension()}";
                Storage::disk('services_images')->put($imageName, File::get($image->getRealPath()));
            }
        }

        $service->update([
            'image' => $imageName,
            'updated_at' => $this->today,
        ]);

        $services = Service::orderByRaw('updated_at DESC')->paginate($this->total_pages);

        return redirect('/services')->with('services');
    }

    public function destroy(Request $request)
    {
        $service = Service::where('id', $request->id)->get();

        $image = $service[0]['image'];
        $param = $service[0]['param'];

        if ($request->confirm == 1) {
            if ($service[0]['image'] != 'nullImage.png') {
                Storage::disk('services_images')->delete($image);
            }

            if ($service[0]['param'] != 'nullParam.param') {
                Storage::disk('services_params')->delete($param);
            }

            Service::where('id', $request->id)->delete();
        }

        $services = Service::orderByRaw('updated_at DESC')->paginate($this->total_pages);

        return redirect('/services')->with('services');
    }

    public function reports()
    {
        return view('Services.report');
    }

    public function reportAllServices(Request $request)
    {
        $services = Service::all();

        if ($request->report_option == 'PDF') {
            $pdf = PDF::loadView('Services.Reports.PDF.reportAllServices', compact('services'));

            return $pdf->setpaper('a4')->stream('Relatorio_Servicos_' . date('d_m_Y', strtotime($this->today)) . '.pdf');
        }
        if ($request->report_option == 'EXCEL') {
            return Excel::download(new ServicesExport($services), 'Relatorio_Servicos_' . date('d_m_Y', strtotime($this->today)) . '.xlsx');
        }
    }

    public function reportSoldAtServices(Request $request)
    {
        $initial = $request->date_initial;
        $final = $request->date_final;

        $services = Service::whereBetween('purchase_date', [$initial, $final])->get();

        if ($request->report_option == 'PDF') {
            $pdf = PDF::loadView('Services.Reports.PDF.reportSoldAtServices', compact('services', 'initial', 'final'));

            return $pdf->setpaper('a4')->stream('Relatorio_Servicos_' . date('d_m_Y', strtotime($this->today)) . '.pdf');
        }
        if ($request->report_option == 'EXCEL') {
            return Excel::download(new ServicesExport($services), 'Relatorio_Servicos_' . date('d_m_Y', strtotime($this->today)) . '.xlsx');
        }
    }

    public function reportServiceTypeServices(Request $request)
    {
        $services = Service::where('service', $request->service)->get();

        if ($request->report_option == 'PDF') {
            $pdf = PDF::loadView('Services.Reports.PDF.reportServiceTypeServices', compact('services'));

            return $pdf->setpaper('a4')->stream('Relatorio_' . $request->service . '_' . date('d_m_Y', strtotime($this->today)) . '.pdf');
        }
        if ($request->report_option == 'EXCEL') {
            return Excel::download(new ServicesExport($services), 'Relatorio_' . $request->service . '_' . date('d_m_Y', strtotime($this->today)) . '.xlsx');
        }
    }

    public function reportIdCompanyServices(Request $request)
    {
        $services = Service::where('company_id', $request->company_id)->get();
        $company = Company::where('id', $request->company_id)->get();

        if ($request->report_option == 'PDF') {
            $pdf = PDF::loadView('Services.Reports.PDF.reportIdCompanyServices', compact('services'));

            return $pdf->setpaper('a4')->stream('Relatorio_Servicos_' . $company[0]['name'] . '_' . date('d_m_Y', strtotime($this->today)) . '.pdf');
        }
        if ($request->report_option == 'EXCEL') {
            return Excel::download(new ServicesExport($services), 'Relatorio_Servicos_' . $company[0]['name'] . '_' . date('d_m_Y', strtotime($this->today)) . '.xlsx');
        }
    }

    public function downloadParam($param)
    {
        $string = 'app/public/services_params/';

        return response()->download(storage_path($string . $param), 'codigo_param.param');
    }

    public function viewAllServices()
    {
        return view('Services.reportAllServices');
    }

    public function viewSoldAtServices()
    {
        return view('Services.reportSoldAtServices');
    }

    public function viewServiceTypeServices()
    {
        return view('Services.reportServiceTypeServices');
    }

    public function viewIdCompanyServices()
    {
        $companies = Company::all();

        return view('Services.reportIdCompanyServices', compact('companies'));
    }
}
