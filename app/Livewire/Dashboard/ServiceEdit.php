<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use App\Models\Status;
use Livewire\Component;
use App\Models\Service;
use App\Models\Vehicle;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\Services\Forms\UpdateForm;
use Illuminate\Support\Facades\Auth;

class ServiceEdit extends Component
{
    public ?Service $service = null;

    public UpdateForm $form;
    public Collection $vehicles;
    public Collection $admin_users;
    public Collection $zaposleni_users;
    public Collection $statuses;

    public function mount(Service $service)
    {
        $this->authorize('view-any', Service::class);

        $this->service = $service;

        $this->form->setService($service);
        $this->vehicles = Vehicle::pluck('registarski_broj', 'id');
        $this->zaposleni_users = User::where('role', 'zaposleni')->pluck('ime', 'id');
        $this->statuses = Status::pluck('naziv', 'id');

        if (!$this->form->admin_id) {
            $this->form->admin_id = Auth::id();
        }
    }

    public function save()
    {
        $this->authorize('update', $this->service);

        $this->validate();

        $this->form->admin_id = Auth::id();

        $this->form->save();

        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.dashboard.services.edit', []);
    }
}
