<?php

namespace App\Http\Livewire;

use App\Models\Paket;
use Livewire\Component;

class TopupCoin extends Component
{
    public $myChannel, $paket;
    public $idPaket = [];

    public function render()
    {
        $this->paket = Paket::all();

        return view('livewire.topup-coin');
    }
}
