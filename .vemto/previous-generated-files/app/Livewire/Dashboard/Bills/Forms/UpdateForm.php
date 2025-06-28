<?php

namespace App\Livewire\Dashboard\Bills\Forms;

use Livewire\Form;
use App\Models\Bill;
use Illuminate\Validation\Rule;

class UpdateForm extends Form
{
    public ?Bill $bill;

    public $usluga_id = '';

    public $cena = '';

    public function rules(): array
    {
        return [
            'usluga_id' => ['required'],
            'cena' => ['required'],
        ];
    }

    public function setBill(Bill $bill)
    {
        $this->bill = $bill;

        $this->usluga_id = $bill->usluga_id;
        $this->cena = $bill->cena;
    }

    public function save()
    {
        $this->validate();

        $this->bill->update($this->except(['bill', 'usluga_id']));
    }
}
