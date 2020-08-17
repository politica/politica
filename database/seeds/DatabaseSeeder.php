<?php

use App\Axis;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->delete();

        $users = DB::connection('old')->table('users')->get();

        foreach ($users as $user) {
            $newUser = User::create([
                'avatar' => $user->avatar,
                'discord_id' => $user->discord_id,
                'email' => $user->email,
                'name' => $user->name,
            ]);

            $results = DB::connection('old')->table('results')->where('user_id', $user->id)->get();

            $userResults = [];

            foreach ($results as $result) {
                $test = DB::connection('old')->table('tests')->find($result->test_id);

                $labelLeft = $test->label_left;
                $labelRight = $test->label_right;

                $labelLeft = $labelLeft == 'Economically left' ? 'Left' : $labelLeft;
                $labelLeft = $labelLeft == 'Libertarian' ? 'Liberty' : $labelLeft;
                $labelLeft = $labelLeft == 'Culturally left' ? 'Left' : $labelLeft;
                $labelLeft = $labelLeft == 'Separatist' ? 'Separation' : $labelLeft;
                $labelLeft = $labelLeft == 'Productivist' ? 'Productivity' : $labelLeft;

                $labelRight = $labelRight == 'Economically right' ? 'Right' : $labelRight;
                $labelRight = $labelRight == 'Authoritarian' ? 'Authority' : $labelRight;
                $labelRight = $labelRight == 'Culturally right' ? 'Right' : $labelRight;
                $labelRight = $labelRight == 'Globalist' ? 'Global' : $labelRight;
                $labelRight = $labelRight == 'Environmentalist' ? 'Environment' : $labelRight;

                $axis = Axis::firstOrCreate(
                    [
                        'name' => $test->name,
                    ], [
                        'color_left' => $test->color_left,
                        'color_right' => $test->color_right,
                        'icon_left' => $test->icon_left,
                        'icon_right' => $test->icon_right,
                        'label_left' => $labelLeft,
                        'label_right' => $labelRight,
                        'sort_order' => $test->sort_order,
                    ]
                );

                if ($axis) {
                    $userResults[] = [
                        'axis' => $axis->id,
                        'value' => $result->value,
                    ];
                }
            }

            if (count($userResults)) {
                $result = $newUser->results()->create([
                    'questions_answered' => count($userResults) * rand(10, 16),
                ]);

                foreach ($userResults as $userResult) {
                    $result->axes()->create([
                        'axis_id' => $userResult['axis'],
                        'value' => $userResult['value'],
                    ]);
                }
            }
        }

        // $questions = DB::connection('old')->table('questions')->get();
        //
        // foreach ($questions as $question) {
        //     $newQuestion = new Question;
        //     $newQuestion->body = $question->body;
        //     $newQuestion->is_required = true;
        //
        //     $test = DB::connection('old')->table('tests')->find($question->test_id);
        //     $axis = Axis::where('name', $test->name)->first();
        //
        //     $answers = DB::connection('old')->table('answers')->where('question_id', $question->id)->get();
        //
        //     foreach ($answers as $answer) {
        //         $name = Str::snake($answer->label);
        //
        //         if (in_array($name, [
        //             'strongly_agree',
        //             'agree',
        //             'neutral',
        //             'disagree',
        //             'strongly_disagree',
        //         ])) {
        //             $newQuestion['description_'.$name] = $answer->description ?: null;
        //         }
        //     }
        //
        //     $newQuestion->save();
        //
        //     $effect = new QuestionEffect();
        //     $effect->axis_id = $axis->id;
        //     $effect->question_id = $newQuestion->id;
        //
        //     foreach ($answers as $answer) {
        //         $name = Str::snake($answer->label);
        //
        //         if (in_array($name, [
        //             'strongly_agree',
        //             'agree',
        //             'neutral',
        //             'disagree',
        //             'strongly_disagree',
        //         ])) {
        //             $effect['magnitude_'.$name] = $answer->direction == 'left' ? $answer->magnitude - $answer->magnitude - $answer->magnitude : ($answer->direction == 'right' ? $answer->magnitude : 0);
        //         }
        //     }
        //
        //     $effect->save();
        // }
        //
        // Axis::where('name', 'Integration')->first()->delete();
        //
        // $economics = Axis::where('name', 'Economics')->first();
        // $economics->regions()->createMany([
        //     [
        //         'min' => 0,
        //         'max' => 10,
        //         'label' => 'Communist',
        //     ],
        //     [
        //         'min' => 11,
        //         'max' => 25,
        //         'label' => 'Socialist',
        //     ],
        //     [
        //         'min' => 26,
        //         'max' => 40,
        //         'label' => 'Social',
        //     ],
        //     [
        //         'min' => 41,
        //         'max' => 60,
        //         'label' => 'Centrist',
        //     ],
        //     [
        //         'min' => 61,
        //         'max' => 75,
        //         'label' => 'Market',
        //     ],
        //     [
        //         'min' => 76,
        //         'max' => 90,
        //         'label' => 'Capitalist',
        //     ],
        //     [
        //         'min' => 91,
        //         'max' => 100,
        //         'label' => 'Lassez-Faire',
        //     ],
        // ]);
        //
        // $power = Axis::where('name', 'State Power')->first();
        // $power->regions()->createMany([
        //     [
        //         'min' => 0,
        //         'max' => 10,
        //         'label' => 'Anarchist',
        //     ],
        //     [
        //         'min' => 11,
        //         'max' => 25,
        //         'label' => 'Libertarian',
        //     ],
        //     [
        //         'min' => 26,
        //         'max' => 40,
        //         'label' => 'Liberal',
        //     ],
        //     [
        //         'min' => 41,
        //         'max' => 60,
        //         'label' => 'Moderate',
        //     ],
        //     [
        //         'min' => 61,
        //         'max' => 75,
        //         'label' => 'Statist',
        //     ],
        //     [
        //         'min' => 76,
        //         'max' => 90,
        //         'label' => 'Authoritarian',
        //     ],
        //     [
        //         'min' => 91,
        //         'max' => 100,
        //         'label' => 'Totalitarian',
        //     ],
        // ]);
        //
        // $culture = Axis::where('name', 'Culture')->first();
        // $culture->regions()->createMany([
        //     [
        //         'min' => 0,
        //         'max' => 10,
        //         'label' => 'Revolutionary',
        //     ],
        //     [
        //         'min' => 11,
        //         'max' => 25,
        //         'label' => 'Very Progressive',
        //     ],
        //     [
        //         'min' => 26,
        //         'max' => 40,
        //         'label' => 'Progressive',
        //     ],
        //     [
        //         'min' => 41,
        //         'max' => 60,
        //         'label' => 'Neutral',
        //     ],
        //     [
        //         'min' => 61,
        //         'max' => 75,
        //         'label' => 'Traditional',
        //     ],
        //     [
        //         'min' => 76,
        //         'max' => 90,
        //         'label' => 'Very Traditional',
        //     ],
        //     [
        //         'min' => 91,
        //         'max' => 100,
        //         'label' => 'Reactionary',
        //     ],
        // ]);
        //
        // $nation = Axis::where('name', 'Nation')->first();
        // $nation->regions()->createMany([
        //     [
        //         'min' => 0,
        //         'max' => 10,
        //         'label' => 'Cosmopolitan',
        //     ],
        //     [
        //         'min' => 11,
        //         'max' => 25,
        //         'label' => 'Internationalist',
        //     ],
        //     [
        //         'min' => 26,
        //         'max' => 40,
        //         'label' => 'Peaceful',
        //     ],
        //     [
        //         'min' => 41,
        //         'max' => 60,
        //         'label' => 'Balanced',
        //     ],
        //     [
        //         'min' => 61,
        //         'max' => 75,
        //         'label' => 'Patriotic',
        //     ],
        //     [
        //         'min' => 76,
        //         'max' => 90,
        //         'label' => 'Nationalist',
        //     ],
        //     [
        //         'min' => 91,
        //         'max' => 100,
        //         'label' => 'Chauvinist',
        //     ],
        // ]);
        //
        // $environment = Axis::where('name', 'Environment')->first();
        // $environment->regions()->createMany([
        //     [
        //         'min' => 0,
        //         'max' => 10,
        //         'label' => 'Extreme Productivist',
        //     ],
        //     [
        //         'min' => 11,
        //         'max' => 25,
        //         'label' => 'Productivist',
        //     ],
        //     [
        //         'min' => 26,
        //         'max' => 40,
        //         'label' => 'Moderate Productivist',
        //     ],
        //     [
        //         'min' => 41,
        //         'max' => 60,
        //         'label' => 'Neutral',
        //     ],
        //     [
        //         'min' => 61,
        //         'max' => 75,
        //         'label' => 'Moderate Environmentalist',
        //     ],
        //     [
        //         'min' => 76,
        //         'max' => 90,
        //         'label' => 'Environmentalist',
        //     ],
        //     [
        //         'min' => 91,
        //         'max' => 100,
        //         'label' => 'Radical Environmentalist',
        //     ],
        // ]);
        //
        // $ideologies = '[{"name":"Anarcho-Communism","stats":{"econ":100,"dipl":50,"govt":100,"scty":90}},{"name":"Libertarian Communism","stats":{"econ":100,"dipl":70,"govt":80,"scty":80}},{"name":"Trotskyism","stats":{"econ":100,"dipl":100,"govt":60,"scty":80}},{"name":"Marxism","stats":{"econ":100,"dipl":70,"govt":40,"scty":80}},{"name":"De Leonism","stats":{"econ":100,"dipl":30,"govt":30,"scty":80}},{"name":"Leninism","stats":{"econ":100,"dipl":40,"govt":20,"scty":70}},{"name":"Stalinism/Maoism","stats":{"econ":100,"dipl":20,"govt":0,"scty":60}},{"name":"Religious Communism","stats":{"econ":100,"dipl":50,"govt":30,"scty":30}},{"name":"State Socialism","stats":{"econ":80,"dipl":30,"govt":30,"scty":70}},{"name":"Theocratic Socialism","stats":{"econ":80,"dipl":50,"govt":30,"scty":20}},{"name":"Religious Socialism","stats":{"econ":80,"dipl":50,"govt":70,"scty":20}},{"name":"Democratic Socialism","stats":{"econ":80,"dipl":50,"govt":50,"scty":80}},{"name":"Revolutionary Socialism","stats":{"econ":80,"dipl":20,"govt":50,"scty":70}},{"name":"Libertarian Socialism","stats":{"econ":80,"dipl":80,"govt":80,"scty":80}},{"name":"Anarcho-Syndicalism","stats":{"econ":80,"dipl":50,"govt":100,"scty":80}},{"name":"Left-Wing Populism","stats":{"econ":60,"dipl":40,"govt":30,"scty":70}},{"name":"Theocratic Distributism","stats":{"econ":60,"dipl":40,"govt":30,"scty":20}},{"name":"Distributism","stats":{"econ":60,"dipl":50,"govt":50,"scty":20}},{"name":"Social Liberalism","stats":{"econ":60,"dipl":60,"govt":60,"scty":80}},{"name":"Christian Democracy","stats":{"econ":60,"dipl":60,"govt":50,"scty":30}},{"name":"Social Democracy","stats":{"econ":60,"dipl":70,"govt":60,"scty":80}},{"name":"Progressivism","stats":{"econ":60,"dipl":80,"govt":60,"scty":100}},{"name":"Anarcho-Mutualism","stats":{"econ":60,"dipl":50,"govt":100,"scty":70}},{"name":"National Totalitarianism","stats":{"econ":50,"dipl":20,"govt":0,"scty":50}},{"name":"Global Totalitarianism","stats":{"econ":50,"dipl":80,"govt":0,"scty":50}},{"name":"Technocracy","stats":{"econ":60,"dipl":60,"govt":20,"scty":70}},{"name":"Centrist","stats":{"econ":50,"dipl":50,"govt":50,"scty":50}},{"name":"Liberalism","stats":{"econ":50,"dipl":60,"govt":60,"scty":60}},{"name":"Religious Anarchism","stats":{"econ":50,"dipl":50,"govt":100,"scty":20}},{"name":"Right-Wing Populism","stats":{"econ":40,"dipl":30,"govt":30,"scty":30}},{"name":"Moderate Conservatism","stats":{"econ":40,"dipl":40,"govt":50,"scty":30}},{"name":"Reactionary","stats":{"econ":40,"dipl":40,"govt":40,"scty":10}},{"name":"Social Libertarianism","stats":{"econ":60,"dipl":70,"govt":80,"scty":70}},{"name":"Libertarianism","stats":{"econ":40,"dipl":60,"govt":80,"scty":60}},{"name":"Anarcho-Egoism","stats":{"econ":40,"dipl":50,"govt":100,"scty":50}},{"name":"Nazism","stats":{"econ":40,"dipl":0,"govt":0,"scty":5}},{"name":"Autocracy","stats":{"econ":50,"dipl":20,"govt":20,"scty":50}},{"name":"Fascism","stats":{"econ":40,"dipl":20,"govt":20,"scty":20}},{"name":"Capitalist Fascism","stats":{"econ":20,"dipl":20,"govt":20,"scty":20}},{"name":"Conservatism","stats":{"econ":30,"dipl":40,"govt":40,"scty":20}},{"name":"Neo-Liberalism","stats":{"econ":30,"dipl":30,"govt":50,"scty":60}},{"name":"Classical Liberalism","stats":{"econ":30,"dipl":60,"govt":60,"scty":80}},{"name":"Authoritarian Capitalism","stats":{"econ":20,"dipl":30,"govt":20,"scty":40}},{"name":"State Capitalism","stats":{"econ":20,"dipl":50,"govt":30,"scty":50}},{"name":"Neo-Conservatism","stats":{"econ":20,"dipl":20,"govt":40,"scty":20}},{"name":"Fundamentalism","stats":{"econ":20,"dipl":30,"govt":30,"scty":5}},{"name":"Libertarian Capitalism","stats":{"econ":20,"dipl":50,"govt":80,"scty":60}},{"name":"Market Anarchism","stats":{"econ":20,"dipl":50,"govt":100,"scty":50}},{"name":"Objectivism","stats":{"econ":10,"dipl":50,"govt":90,"scty":40}},{"name":"Totalitarian Capitalism","stats":{"econ":0,"dipl":30,"govt":0,"scty":50}},{"name":"Ultra-Capitalism","stats":{"econ":0,"dipl":40,"govt":50,"scty":50}},{"name":"Anarcho-Capitalism","stats":{"econ":0,"dipl":50,"govt":100,"scty":50}}]';
        //
        // $ideologies = json_decode($ideologies, true);
        //
        // foreach ($ideologies as $ideology) {
        //     $record = \App\Ideology::create([
        //         'name' => $ideology['name'],
        //     ]);
        //
        //     $midpoint = (100 - $ideology['stats']['econ']);
        //     $min = $midpoint - 20;
        //     $max = $midpoint + 20;
        //
        //     if ($min < 0) $min = 0;
        //     if ($max > 100) $max = 100;
        //
        //     $record->requirements()->create([
        //         'axis_id' => $economics->id,
        //         'min' => $min,
        //         'max' => $max,
        //     ]);
        //
        //     $midpoint = (100 - $ideology['stats']['dipl']);
        //     $min = $midpoint - 20;
        //     $max = $midpoint + 20;
        //
        //     if ($min < 0) $min = 0;
        //     if ($max > 100) $max = 100;
        //
        //     $record->requirements()->create([
        //         'axis_id' => $nation->id,
        //         'min' => $min,
        //         'max' => $max,
        //     ]);
        //
        //     $midpoint = (100 - $ideology['stats']['govt']);
        //     $min = $midpoint - 20;
        //     $max = $midpoint + 20;
        //
        //     if ($min < 0) $min = 0;
        //     if ($max > 100) $max = 100;
        //
        //     $record->requirements()->create([
        //         'axis_id' => $power->id,
        //         'min' => $min,
        //         'max' => $max,
        //     ]);
        //
        //     $midpoint = (100 - $ideology['stats']['scty']);
        //     $min = $midpoint - 20;
        //     $max = $midpoint + 20;
        //
        //     if ($min < 0) $min = 0;
        //     if ($max > 100) $max = 100;
        //
        //     $record->requirements()->create([
        //         'axis_id' => $culture->id,
        //         'min' => $min,
        //         'max' => $max,
        //     ]);
        // }
    }
}
