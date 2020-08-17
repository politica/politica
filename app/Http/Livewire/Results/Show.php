<?php

namespace App\Http\Livewire\Results;

use App\Result;
use App\ResultAxis;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class Show extends Component
{
    public $axes;

    public $isClaimable = false;

    public $isParticipant = false;

    public $result;

    public function claim($authProvider)
    {
        if (! $this->isClaimable) return;

        session(['auth-provider' => $authProvider]);

        redirect(URL::signedRoute('results.claim', ['result' => $this->result]));
    }

    public function discard()
    {
        if (! $this->isParticipant) return;

        $this->result->user()->dissociate();
        $this->result->save();

        redirect()->route('test');
    }

    public function mount(Result $result)
    {
        $this->result = $result;

        $this->axes = $this->result->axes->sortBy(function (ResultAxis $resultAxis) {
            return $resultAxis->axis->sort_order;
        });
        $this->isClaimable = session()->has('results') && ! $this->result->user ? in_array($this->result->id, session('results')) : false;
        $this->isParticipant = ($this->result->user_id && $this->result->user_id === optional(user())->id) || (session()->has('results') && in_array($this->result->id, session('results')));
    }

    public function render()
    {
        return view('results.show');
    }
}
