<?php

namespace App\Livewire\Dashboard\Services\Forms;

use Livewire\Form;
use App\Models\Service;
use Illuminate\Validation\Rule;

class UpdateForm extends Form
{
    public ?Service $service;

    public $vozilo_id = '';

    public $zaposleni_id = '';

    public $admin_id = '';

    public $status_id = '';

    public $naziv = '';

    public $opis = '';

    public function rules(): array
    {
        return [
            'vozilo_id' => ['required'],
            'zaposleni_id' => ['required'],
            'admin_id' => ['required'],
            'status_id' => ['required'],
            'naziv' => ['required', 'string'],
            'opis' => ['nullable', 'string'],
        ];
    }

    public function setService(Service $service)
    {
        $this->service = $service;

        $this->vozilo_id = $service->vozilo_id;
        $this->zaposleni_id = $service->zaposleni_id;
        $this->admin_id = $service->admin_id;
        $this->status_id = $service->status_id;
        $this->naziv = $service->naziv;
        $this->opis = $service->opis;
    }

    public function save()
    {
        $this->validate();

        $this->service->update(
            $this->except([
                'service',
                'vozilo_id',
                'zaposleni_id',
                'admin_id',
                'status_id',
            ])
        );
    }
}
