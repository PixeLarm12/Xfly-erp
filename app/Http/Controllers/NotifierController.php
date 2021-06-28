<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Xfly\Model\Notifier;
use App\Xfly\Model\Drone;
use App\Xfly\Model\Company;
use App\Xfly\Model\Product;
use App\Http\Requests\NotifierCreateRequest;
use App\Http\Requests\NotifierUpdateRequest;

class NotifierController extends Controller
{
    public function index()
    {
        $notifiers = Notifier::paginate($this->total_pages);

        return view('/', compact('notifiers'));
    }

    public function confirm($id)
    {
        $notifier = Notifier::where('id', $id)->get();

        return view('Notifiers.confirm', compact('notifier'));
    }

    public function select_company()
    {
        $companies = Company::all();

        return view('Notifiers.select_company', compact('companies'));
    }

    public function select_type(Request $request)
    {
        $company_id = $request->company_id;

        if ($company_id == null) {
            $companies = Company::all();

            return view('Notifiers.select_company', compact('companies'));
        }

        return view('Notifiers.select_type', compact('company_id'));
    }

    public function selection(Request $request)
    {
        $company_id = $request->company_id;

        if ($request->type == null) {
            return view('Notifiers.select_type', compact('company_id'));
        }

        if ($request->type == 'Produto') {
            $products = Product::where('company_id', $company_id)->get();

            return view('Notifiers.product_create', compact('company_id', 'products'));
        }
        if ($request->type == 'Drone') {
            $drones = Drone::where('company_id', $company_id)->get();

            return view('Notifiers.drone_create', compact('company_id', 'drones'));
        }

        $companies = Company::all();
        $notifiers = Notifier::all();

        return redirect('/', compact('companies', 'notifiers'));
    }

    public function drone_create(Request $request)
    {
        $company_id = $request->company_id;
        $drones = Drone::where('company_id', $company_id)->get();

        return view('Notifiers.drone_create', compact('drones', 'company_id'));
    }

    public function product_create(Request $request)
    {
        $company_id = $request->company_id;
        $products = Product::where('company_id', $company_id);

        return view('Notifiers.product_create', compact('products', 'company_id'));
    }

    public function store(NotifierCreateRequest $request)
    {
        if ($request->validated()) {
            Notifier::create($request->data());

            return redirect('/');
        }

        echo 'Não foi possível cadastrar';
    }

    public function edit_drone(Notifier $notifier)
    {
        return view('Notifiers.drone_edit', compact('notifier'));
    }

    public function edit_product(Notifier $notifier)
    {
        return view('Notifiers.product_edit', compact('notifier'));
    }

    public function update(NotifierUpdateRequest $request, Notifier $notifier)
    {
        $notifier->update($request->validated());

        $notifiers = Notifier::all();

        return redirect('/')->with('notifiers');
    }

    public function destroy(Request $request)
    {
        if ($request->answer == 'yes') {
            Notifier::where('id', $request->notifier_id)->delete();
        } else {
            $notifiers = Notifier::all();

            return redirect('/')->with('notifiers');
        }

        $notifiers = Notifier::all();

        return redirect('/')->with('notifiers');
    }
}
