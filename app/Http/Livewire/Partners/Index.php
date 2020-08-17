<?php

namespace App\Http\Livewire\Partners;

use App\Partner;
use Livewire\Component;

class Index extends Component
{
    public $partners;

    public function mount()
    {
        $this->partners = Partner::orderBy('name')->get();
    }

    public function render()
    {
        return view('partners.index');
    }
}
