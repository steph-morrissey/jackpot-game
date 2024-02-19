<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GameController extends Controller
{
    public function index() 
    {
        // Temporary hardcoded loot options
        $lootOptions =  [
            [
                'name' => 'Cherry',
                'initial' => 'C',
                'points' => 10,
            ],
            [
                'name' => 'Lemon',
                'initial' => 'L',
                'points' => 20,
            ],
            [
                'name' => 'Orange',
                'initial' => 'O',
                'points' => 30,
            ],
            [
                'name' => 'Watermelon',
                'initial' => 'W',
                'points' => 40,
            ],
        ];

        $lootOptions = array_slice($lootOptions, 0, 3);
        foreach ($lootOptions as $index => $value) {
            Session::put('option' . ($index + 1), $value);
        }
        Session::put('credits', '10');
        return view('game');
    }

    public function spin()
    {
         $userCredits = Session::get('credits');
         
         // Temporary hardcoded loot options
         $lootOptions =  [
            [
                'name' => 'Cherry',
                'initial' => 'C',
                'points' => 10,
            ],
            [
                'name' => 'Lemon',
                'initial' => 'L',
                'points' => 20,
            ],
            [
                'name' => 'Orange',
                'initial' => 'O',
                'points' => 30,
            ],
            [
                'name' => 'Watermelon',
                'initial' => 'W',
                'points' => 40,
            ],
        ];

        $this->generateLootOptions($lootOptions);

         if ($userCredits < 40) { 
            $this->validateSpin($userCredits);
         } elseif ($userCredits >= 40 && $userCredits <= 60) {
             if (rand(1, 100) <= 30) {
                $this->generateLootOptions($lootOptions);
                $this->validateSpin($userCredits);
             }
         } elseif ($userCredits > 60) {
             if (rand(1, 100) <= 60) {
                $this->generateLootOptions($lootOptions);
                $this->validateSpin($userCredits);
             }
         }
         return view('game');
    }

    public function endGame()
    {
        Session::flush();
        return redirect('/game/session');
    }

    private function generateLootOptions($lootOptions)
    {
        $generatedOptions = [];
        for ($i = 0; $i < 3; $i++) {
            $key = 'option' . $i+1;
            $value = $lootOptions[array_rand($lootOptions)];
            Session::put($key, $value);
         }

        return $generatedOptions;
    }
    private function validateSpin($userCredits)
    {
        $option1 = Session::get('option1');
        $option2 = Session::get('option2');
        $option3 = Session::get('option3');
        if ($option1['name'] === $option2['name'] && $option2['name'] === $option3['name']) {
            $userCredits = $userCredits + $option1['points'];
            Session::put('credits', $userCredits);
        } else {
            $userCredits = $userCredits - 1;
            Session::put('credits', $userCredits);
        }
    }
}
