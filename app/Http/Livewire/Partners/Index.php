<?php

namespace App\Http\Livewire\Partners;

use App\Models\Partner;
use Livewire\Component;

class Index extends Component
{
    public $partners;

    public function mount()
    {
        $this->partners = Partner::all()->sortByDesc(function ($partner) {
            return (bool) $partner->description;
        });
    }

    public function render()
    {
        return view('partners.index');
    }
}
