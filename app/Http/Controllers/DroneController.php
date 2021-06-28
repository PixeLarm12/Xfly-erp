<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Xfly\Model\Drone;
use App\Xfly\Model\Company;
use App\Xfly\Model\Service;
use App\Http\Requests\DroneCreateRequest;
use App\Http\Requests\DroneUpdateRequest;

class DroneController extends Controller
{
    private $total_pages = 10;
    private $details_page = 4;

    public function index()
    {
        $drones = Drone::orderByRaw('purchase_date DESC')->paginate($this->total_pages);

        return view('Drones.welcome', compact('drones'));
    }

    public function create()
    {
        return view('Drones.create');
    }

    public function store(DroneCreateRequest $request)
    {
        if ($request->validated()) {
            $drone = Drone::create($request->returnData());

            $droneModels = Drone::where('model', $drone->model)->where('company_id', $drone->company_id)->get();

            $count = count($droneModels);

            if ($count == 0) {
                $drone->update(['key' => 1]);
            }

            $drone->update(['key' => $count]);

            $drones = Drone::orderByRaw('purchase_date DESC')->paginate($this->total_pages);

            return redirect('/drones')->with('drones');
        }
        echo 'Erro ao cadastrar drone';
    }

    public function edit(Drone $drone)
    {
        $companies = Company::all();
        $client = Company::where('id', $drone->company_id)->get();

        return view('Drones.edit', compact('drone', 'client', 'companies'));
    }

    public function details(Drone $drone)
    {
        $client = Company::where('id', $drone->company_id)->get();
        $services = Service::orderByRaw('purchase_date DESC')->where('drone_id', $drone->id)->paginate($this->details_page);

        return view('Drones.details', compact('drone', 'client', 'services'));
    }

    public function update(DroneUpdateRequest $request, Drone $drone)
    {
        $key = Drone::where('model', $request->model)->where('company_id', $drone->company_id)->max('key');

        $control = 0;
        if ($drone->model == $request->model) {
            $control = 1;
        }

        $drone->update($request->validated());

        if ($key == null) {
            $drone->update(['key' => 1]);
        }

        if ($control != 1) {
            $key = $key + 1;
            $drone->update(['key' => $key]);
        }

        $client = Company::where('id', $drone->company_id)->get();
        $services = Service::orderByRaw('purchase_date DESC')->where('drone_id', $drone->id)->paginate($this->details_page);

        return view('Drones.details', compact('drone', 'client', 'services'));
    }

    public function destroy(Request $request)
    {
        if ($request->confirm == 1) {
            Drone::where('id', $request->id)->delete();
        }

        $drones = Drone::orderByRaw('purchase_date DESC')->paginate($this->total_pages);

        return redirect('/drones')->with('drones');
    }
}
