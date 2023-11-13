<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\bets;
use App\Models\tickets;

class betController extends Controller
{
    public function insertBet(Request $request) {
        
        $bets = new bets;
        $bets->bet_number = $request->bet_number;
        $bets->bet_amount = $request->bet_amount;
        $bets->bet_type = $request->bet_type;
        $bets->ticket_id = $request->ticket_id;
        $bets->save();

        $tickets = new tickets;
        $tickets->ticket_id = $request->ticket_id;
        $tickets->ticket_draw_time = $request->time_draw;
        $tickets->save();
        
        return redirect()->back()->with('status','Bet Added');

        return view('/index');
    }

    public function fetchBet() {

        $fetch_bets = DB::table('tickets')
        ->join('bets', 'tickets.ticket_id', '=', 'bets.ticket_id')
            ->get();

        return view('/index', compact('fetch_bets'));
    }
}