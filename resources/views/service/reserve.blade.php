@extends('layouts.public')

@section('title', 'Rezerviši uslugu')

@section('content')
<section class="w3-container w3-padding-64">
    <h2 class="w3-xxlarge">Rezervacija usluge</h2>

    <form action="{{ route('reservations.store') }}" method="POST" class="w3-container w3-card w3-padding w3-white w3-margin-top">
        @csrf

        <h4 class="w3-text-blue">Informacije o vozilu</h4>
        <p>
            <label>Registarski broj</label>
            <input class="w3-input w3-border" name="registarski_broj" required>
        </p>
        <p>
            <label>Marka</label>
            <input class="w3-input w3-border" name="marka" required>
        </p>
        <p>
            <label>Model</label>
            <input class="w3-input w3-border" name="model" required>
        </p>
        <p>
            <label>Godina proizvodnje</label>
            <input type="number" class="w3-input w3-border" name="godina_proizvodnje" required>
        </p>

        <h4 class="w3-text-blue">Informacije o usluzi</h4>
        <p>
            <label>Naziv usluge</label>
            <input class="w3-input w3-border" name="naziv" required>
        </p>
        <p>
            <label>Opis</label>
            <textarea class="w3-input w3-border" name="opis" rows="4"></textarea>
        </p>

        <button class="w3-button w3-green w3-margin-top" type="submit">Pošalji rezervaciju</button>
    </form>
</section>
@endsection
