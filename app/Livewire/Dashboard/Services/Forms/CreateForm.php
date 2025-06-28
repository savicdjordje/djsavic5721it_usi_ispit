<?php

namespace App\Livewire\Dashboard\Services\Forms;

use Livewire\Form;
use App\Models\Service;
use Livewire\Attributes\Rule;

class CreateForm extends Form
{
    #[Rule('required')]
    public $vozilo_id = '';

    #[Rule('required')]
    public $zaposleni_id = '';

    #[Rule('required')]
    public $admin_id = '';

    #[Rule('required')]
    public $status_id = '';

    #[Rule('required|string')]
    public $naziv = '';

    #[Rule('nullable|string')]
    public $opis = '';

    public function save()
    {
        $this->validate();

        $service = Service::create($this->except([]));

        $this->reset();

        return $service;
    }
}
