<?php

namespace App\Http\Livewire\Partners;

use App\Partner;
use Livewire\Component;

class Show extends Component
{
    public $otherPartners;

    public $partner;

    public function mount(Partner $partner)
    {
        $this->partner = $partner;

        $this->otherPartners = Partner::where('id', '!=', $this->partner->id)->orderBy('name')->get()->shuffle()->take(5);
    }

    public function render()
    {
        return view('partners.show');
    }
}
