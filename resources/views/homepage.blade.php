@extends('layouts.public')

@section('title', 'Početna')

@section('content')
<section class="w3-container w3-center w3-padding-64">
    <h2 class="w3-xxxlarge">Dobrodošli!</h2>
    <p class="w3-large w3-opacity">
        AutoLak servis nudi vrhunsku uslugu lakiranja, poliranja i estetskog sređivanja vašeg automobila. 
        Koristimo moderne tehnologije i najkvalitetnije materijale kako bismo vašem vozilu vratili sjaj i izgled iz snova.
    </p>
</section>

<section class="w3-container w3-padding-64">
    <h2 class="w3-center w3-xxlarge w3-border-bottom w3-padding-16">Istaknute usluge</h2>

    <div class="w3-row-padding w3-margin-top">
        @foreach($services as $service)
            <div class="w3-third w3-margin-bottom">
                <div class="w3-card-4 w3-white">
                    <div class="w3-container w3-padding">
                        <h4 class="w3-text-blue">{{ $service->naziv }}</h4>
                        <p><strong>Opis:</strong> {{ $service->opis ?? 'Nema opisa' }}</p>

                        @if($service->vozilo)
                            <p><strong>Vozilo:</strong> 
                                {{ $service->vozilo->marka }} 
                                {{ $service->vozilo->model }} 
                                ({{ $service->vozilo->registarski_broj }})
                            </p>
                        @endif

                        @if($service->zaposleni)
                            <p><strong>Izvršilac:</strong> {{ $service->zaposleni->ime }} {{ $service->zaposleni->prezime }}</p>
                        @endif

                        @php
                            $cena = $service->racuni->first()->cena ?? null;
                        @endphp
                        <p><strong>Cena:</strong> {{ $cena ? number_format($cena, 2) . ' RSD' : 'Nije uneta' }}</p>

                        <a href="#" class="w3-button w3-black w3-margin-top">Opširnije</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
