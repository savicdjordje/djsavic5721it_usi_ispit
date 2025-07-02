@extends('layouts.public')

@section('title', 'Katalog usluga')

@section('content')
<div class="w3-row-padding w3-margin-top">
    @forelse($services as $service)
        <div class="w3-third w3-margin-bottom">
            <div class="w3-card-4 w3-white w3-padding">
                <h5>{{ $service->naziv }}</h5>

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

                <a href="{{ route('services.detail', $service->id) }}" class="w3-button w3-black w3-margin-top">Opširnije</a>
            </div>
        </div>
    @empty
        <p class="w3-center">Trenutno nema dostupnih usluga.</p>
    @endforelse
</div>
@endsection
