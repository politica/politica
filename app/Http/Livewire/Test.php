<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\QuestionEffect;
use App\Models\Result;
use Livewire\Component;

class Test extends Component
{
    public $importance = 5;

    public $questionIndex;

    public $questions;

    public $requiredQuestionsCount = 0;

    public $responses = [];

    public function calculateResult()
    {
        // Initialise array to hold axes that results were recorded for
        $axes = [];

        // Create result record
        $result = Result::create([
            'questions_answered' => count($this->responses),
            'user_id' => user()->id ?? null,
        ]);

        // Each question that was answered
        foreach ($this->responses as $index => $response) {
            $question = $this->questions[$index];

            // Each question effect
            $question->effects->each(function (QuestionEffect $effect) use (&$axes, $question, $response, $result) {
                $axisId = $effect->axis_id;

                // Add an axis entry if not present already
                if (! array_key_exists($axisId, $axes)) {
                    $axes[$axisId] = [
                        'position' => [
                            'left' => 0,
                            'right' => 0,
                        ],
                        'range' => [
                            'left' => 0,
                            'right' => 0,
                        ],
                        'value' => 50,
                    ];
                }

                // Accumulate magnitudes for each possible answer
                $magnitudes = [
                    'agree' => $effect->magnitude_agree,
                    'disagree' => $effect->magnitude_disagree,
                    'neutral' => $effect->magnitude_neutral,
                    'stronglyAgree' => $effect->magnitude_strongly_agree,
                    'stronglyDisagree' => $effect->magnitude_strongly_disagree,
                ];

                $importanceMultiplier = $response['importance'] + 1;

                // Increase range
                $axes[$axisId]['range']['left'] += min($magnitudes) * $importanceMultiplier;
                $axes[$axisId]['range']['right'] += max($magnitudes) * $importanceMultiplier;

                // Adjust position on axis
                $axes[$axisId]['position'][$magnitudes[$response['answer']] < 0 ? 'left' : 'right'] += $magnitudes[$response['answer']] * $importanceMultiplier;

                // Create response record
                $result->responses()->create([
                    'answer' => $response['answer'],
                    'question_id' => $question->id,
                ]);
            });
        }

        // Each axes that results were recorded for
        foreach ($axes as $index => $axis) {
            // Calculate result for that axis
            if ($axis['range']['left'] && $axis['range']['right']) {
                $axis['value'] = round(50 - (($axis['position']['left'] / $axis['range']['left']) * 50) + (($axis['position']['right'] / $axis['range']['right']) * 50));
            }

            // Save the axis result
            $result->axes()->create([
                'axis_id' => $index,
                'value' => $axis['value'],
            ]);
        }

        if (! session()->has('results')) session(['results' => []]);
        session()->push('results', $result->id);

        redirect()->route('results.show', ['result' => $result]);
    }

    public function getQuestionProperty()
    {
        return $this->questions[$this->questionIndex];
    }

    public function mount()
    {
        $requiredQuestions = Question::where('is_required', true)->get()->shuffle();
        $optionalQuestions = Question::where('is_required', false)->get()->shuffle();
        $this->questions = $requiredQuestions->concat($optionalQuestions);
        $this->requiredQuestionsCount = count($requiredQuestions);
    }

    public function nextQuestion()
    {
        if ($this->questionIndex + 1 >= count($this->questions)) {
            return $this->calculateResult();
        }

        $this->questionIndex++;

        $this->restoreImportance();
    }

    public function previousQuestion()
    {
        if (! $this->questionIndex) return;

        $this->questionIndex--;

        $this->restoreImportance();
    }

    public function respond($answer)
    {
        $this->responses[$this->questionIndex] = [
            'answer' => $answer,
            'importance' => $this->importance,
        ];

        $this->nextQuestion();
    }

    public function restoreImportance()
    {
        if (! array_key_exists($this->questionIndex, $this->responses))
            return $this->reset('importance');

        $this->importance = $this->responses[$this->questionIndex]['importance'];
    }

    public function saveImportance()
    {
        if (! array_key_exists($this->questionIndex, $this->responses)) return;

        $this->responses[$this->questionIndex]['importance'] = $this->importance;
    }

    public function render()
    {
        return view('test');
    }
}
