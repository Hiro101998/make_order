<?php

namespace App\Http\Controllers;
use App\Models\twentyFirstplayers;
use App\Models\teams;
use Illuminate\Http\positions;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $players =\DB::table('twentyFirstPlayers')->join('teams','twentyFirstPlayers.team_id','=','teams.team_id')->join('positions','twentyFirstPlayers.position_id','=','positions.position_id')->get();
        // $playerName =\DB::table('twentyFirstPlayers')->join('teams','twentyFirstPlayers.team_id','=','teams.team_id')->join('positions','twentyFirstPlayers.position_id','=','positions.position_id')->get(['name']);
        // $getPlayer = $players->random(1);
        return view('top',compact('players'));
    }
    public function edit(){
        return view('edit');
    }
}
