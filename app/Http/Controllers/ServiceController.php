<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceStoreRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Models\Bill;
use App\Models\Service;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::all();

        return view('service.index', [
            'services' => $services,
        ]);
    }

    public function create(Request $request)
    {
        return view('service.create');
    }

    public function store(ServiceStoreRequest $request)
    {
        $service = Service::create($request->validated());

        $request->session()->flash('service.id', $service->id);

        return redirect()->route('services.index');
    }

    public function show(Request $request, Service $service)
    {
        return view('service.show', [
            'service' => $service,
        ]);
    }

    public function edit(Request $request, Service $service)
    {
        return view('service.edit', [
            'service' => $service,
        ]);
    }

    public function update(ServiceUpdateRequest $request, Service $service)
    {
        $service->update($request->validated());

        $request->session()->flash('service.id', $service->id);

        return redirect()->route('services.index');
    }

    public function destroy(Request $request, Service $service)
    {
        $service->delete();

        return redirect()->route('services.index');
    }

    public function homepage()
    {
        $services = Service::limit(5)->get();

        return view('homepage', [
            'services' => $services
        ]);
    }

    public function detail($id)
    {
        $service = Service::findOrFail($id);
        return view('service.detail', [
            'service' => $service
        ]);
    }

    public function catalog()
    {
        $services = Service::all();

        return view('service.catalog', [
            'services' => $services
        ]);
    }

    public function createReservation(Request $request)
    {
        return view('service.reserve', [
            'service_id' => $request->service_id,
        ]);
    }

    public function storeReservation(Request $request)
    {
        $data = $request->validate([
            'registarski_broj' => 'required|string',
            'marka' => 'required|string',
            'model' => 'required|string',
            'godina_proizvodnje' => 'required|integer',
            'naziv' => 'required|string',
            'opis' => 'nullable|string',
        ]);

        $vozilo = Vehicle::create([
            'klijent_id' => Auth::id(),
            'registarski_broj' => $data['registarski_broj'],
            'marka' => $data['marka'],
            'model' => $data['model'],
            'godina_proizvodnje' => $data['godina_proizvodnje'],
        ]);

        $usluga = Service::create([
            'vozilo_id' => $vozilo->id,
            'zaposleni_id' => null,
            'admin_id' => null,
            'status_id' => 1,
            'naziv' => $data['naziv'],
            'opis' => $data['opis'],
        ]);

        Bill::create([
            'usluga_id' => $usluga->id,
            'cena' => 0.00,
        ]);

        return redirect()->route('homepage')->with('success', 'Rezervacija uspešno kreirana.');
    }
}
