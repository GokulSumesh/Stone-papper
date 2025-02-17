<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\spscontroller;
use App\Models\sps;
class spscontroller extends Controller
{

    public function score(Request $request) {

        $player1Name = $request->player1; 
        $player2Name = $request->player2;
    
        $player1score = 0;
        $player2score = 0;
    
        for ($i = 0; $i < 5; $i++) {
            $player1 = random_int(1, 3); 
            $player2 = random_int(1, 3); 
    
            if ($player1 == $player2) {
                $player1score+=0;
                $player2score+=0; 
            } elseif (
                ($player1 == 1 && $player2 == 3) ||  
                ($player1 == 2 && $player2 == 1) ||      
                ($player1 == 3 && $player2 == 2)     
            ) {
                $player1score++; 
            } else {
                $player2score++;
            }
        }

        sps::create([
            'player1' => $player1Name, 
            'player2' => $player2Name,
            'player1score' => $player1score, 
            'player2score' => $player2score
        ]);
    

        if ($player1score === $player2score) {
            return redirect('/')->with('success', 'Match Draw!');
        } elseif ($player1score > $player2score) {
            return redirect('/')->with('success', "$player1Name 'wins'");
        } else {
            return redirect('/')->with('success', "$player2Name 'wins'");
        }
    }
    

}
