<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleStoreRequest;
use App\Http\Requests\VehicleUpdateRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $vehicles = Vehicle::all();

        return view('vehicle.index', [
            'vehicles' => $vehicles,
        ]);
    }

    public function create(Request $request)
    {
        return view('vehicle.create');
    }

    public function store(VehicleStoreRequest $request)
    {
        $vehicle = Vehicle::create($request->validated());

        $request->session()->flash('vehicle.id', $vehicle->id);

        return redirect()->route('vehicles.index');
    }

    public function show(Request $request, Vehicle $vehicle)
    {
        return view('vehicle.show', [
            'vehicle' => $vehicle,
        ]);
    }

    public function edit(Request $request, Vehicle $vehicle)
    {
        return view('vehicle.edit', [
            'vehicle' => $vehicle,
        ]);
    }

    public function update(VehicleUpdateRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->validated());

        $request->session()->flash('vehicle.id', $vehicle->id);

        return redirect()->route('vehicles.index');
    }

    public function destroy(Request $request, Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()->route('vehicles.index');
    }
}
