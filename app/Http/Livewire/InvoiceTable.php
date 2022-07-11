<?php

namespace App\Http\Livewire;

use Livewire\Component;

class InvoiceTable extends Component
{
    public function like() {
        $this->emit('alert', "test");
    }

    public function render()
    {
        return view('livewire.invoice-table');
    }
}
