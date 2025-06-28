<?php

namespace App\Livewire\Dashboard\Vehicles\Forms;

use Livewire\Form;
use App\Models\Vehicle;
use Illuminate\Validation\Rule;

class UpdateForm extends Form
{
    public ?Vehicle $vehicle;

    public $klijent_id = '';

    public $registarski_broj = '';

    public $marka = '';

    public $model = '';

    public $godina_proizvodnje = '';

    public function rules(): array
    {
        return [
            'klijent_id' => ['required'],
            'registarski_broj' => ['required', 'string'],
            'marka' => ['required', 'string'],
            'model' => ['required', 'string'],
            'godina_proizvodnje' => ['required'],
        ];
    }

    public function setVehicle(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;

        $this->klijent_id = $vehicle->klijent_id;
        $this->registarski_broj = $vehicle->registarski_broj;
        $this->marka = $vehicle->marka;
        $this->model = $vehicle->model;
        $this->godina_proizvodnje = $vehicle->godina_proizvodnje;
    }

    public function save()
    {
        $this->validate();

        $this->vehicle->update($this->except(['vehicle', 'klijent_id']));
    }
}
