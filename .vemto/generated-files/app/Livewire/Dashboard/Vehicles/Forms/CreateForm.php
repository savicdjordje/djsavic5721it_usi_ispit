<?php

namespace App\Livewire\Dashboard\Vehicles\Forms;

use Livewire\Form;
use App\Models\Vehicle;
use Livewire\Attributes\Rule;

class CreateForm extends Form
{
    #[Rule('required')]
    public $klijent_id = '';

    #[Rule('required|string')]
    public $registarski_broj = '';

    #[Rule('required|string')]
    public $marka = '';

    #[Rule('required|string')]
    public $model = '';

    #[Rule('required')]
    public $godina_proizvodnje = '';

    public function save()
    {
        $this->validate();

        $vehicle = Vehicle::create($this->except([]));

        $this->reset();

        return $vehicle;
    }
}
