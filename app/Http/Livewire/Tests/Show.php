<?php

namespace App\Http\Livewire\Tests;

use App\Answer;
use App\Response;
use App\Result;
use App\Test;
use Livewire\Component;

class Show extends Component
{
    public $activeQuestion;

    public $communityResults;

    public $otherTests;

    public $questions;

    public $questionsAnswered = 0;

    public $result;

    public $test;

    public function answer($answer)
    {
        user()->responses()->whereHas('answer', function ($query) {
            $query->where('question_id', $this->questions[$this->activeQuestion]->id);
        })->delete();

        $answer = Answer::find($answer);

        if ($answer) {
            $response = new Response();
            $response->answer()->associate($answer);
            user()->responses()->save($response);

            $this->questionsAnswered++;
        }

        if ($this->activeQuestion + 1 < count($this->questions)) {
            return $this->activeQuestion++;
        }

        if ($this->questionsAnswered) {
            Result::whereTestId($this->test->id)->whereUserId(user()->id)->delete();

            $this->result = new Result();
            $this->result->test()->associate($this->test);
            $this->result->setValueAttribute();
            user()->results()->save($this->result);
        }

        $this->reset('activeQuestion');
    }

    public function discard()
    {
        Result::whereTestId($this->test->id)->whereUserId(user()->id)->delete();

        // @todo Work out why we can't just $this->reset('result'), Start button becomes unresponsive
        redirect()->route('tests.show', [
            'test' => $this->test,
        ]);
    }

    public function mount(Test $test)
    {
        $this->test = $test;
        $this->communityResults = $this->test->results()->where('user_id', '!=', user()->id ?? null)->orderBy('created_at', 'desc')->limit(5)->get();
        $this->otherTests = $this->test->category->tests()->where('id', '!=', $this->test->id)->get();
        $this->questions = $this->test->questions()->has('answers')->get();
        $this->result = $this->test->results()->whereUserId(user()->id ?? null)->first();
    }

    public function start()
    {
        if (! user()) {
            session()->put('url.intended', route('tests.show', ['test' => $this->test]));
            redirect()->route('auth');
        }

        if (count($this->questions)) {
            $this->activeQuestion = 0;
        }
    }

    public function render()
    {
        return view('tests.show');
    }
}
