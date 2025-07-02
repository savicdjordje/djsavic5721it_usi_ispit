@extends('layouts.public')

@section('title', 'Detalji usluge')

@section('content')
<section class="w3-container w3-padding-64">
    <h2 class="w3-xxlarge">{{ $service->naziv }}</h2>

    <div class="w3-row-padding w3-margin-top">
        <div class="w3-col l6 m12 w3-white w3-padding-large w3-card">
            <p><strong>Opis:</strong> {{ $service->opis }}</p>

            <p><strong>Zaposleni:</strong> 
                {{ $service->zaposleni->ime ?? 'Nepoznato' }} 
                {{ $service->zaposleni->prezime ?? '' }}
            </p>

            <p><strong>Vozilo:</strong> 
                {{ $service->vozilo->marka ?? '' }} 
                {{ $service->vozilo->model ?? '' }} 
                ({{ $service->vozilo->registarski_broj ?? '' }})
            </p>

            <p><strong>Cena:</strong> 
                {{ $service->racuni->first()->cena ?? 'N/A' }} RSD
            </p>

            @auth
                <a href="{{ route('reservations.create', ['service_id' => $service->id]) }}" class="w3-button w3-green w3-margin-top">Rezerviši</a>
            @endauth

            <a href="{{ url()->previous() }}" class="w3-button w3-black w3-margin-top">Nazad</a>
        </div>
    </div>
</section>
@endsection
