<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;

use App\Models\Athlete;
use App\Models\Goal;
use App\Models\Matche;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $season_ = date('Y');
        $season = $request->input('season', $season_);
                       
        $now = Carbon::now();
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        $month_ = ucfirst(utf8_encode(strftime("%B", strtotime($now))));

        $matches = Matche::whereYear('match_date', $season)->orderByRaw('match_date desc')->get();

        // Aniversários
        $month = date('m');
        $birthdays = Athlete::whereMonth('date_birth', $month)->orderByRaw('day(date_birth) asc')->get(); 

        // Artilheiros - produção
        $gunners = Goal::select(
            [
                'athlete_id',
                 DB::raw("sum(goals) AS goal")
            ]
        )->where('season', $season)
        ->groupBy('athlete_id')
        ->orderBy('goal', 'DESC')
        ->get(); 
        
        if(count($gunners) > 0){
            $name = Athlete::where('id', $gunners[0]['athlete_id'])->value('surname');
            $goals = $gunners[0]['goal'];
        }else{
            $gunners = [];
            $name = False;
            $goals = False;
        }
        
        // Gols a Favor 
        $sum_goals_in_favor = DB::table('goals')->where('season', $season)->get()->sum('goals');

        // Gols contra
        $sum_own_goals = DB::table('goalkeeper_goals')->where('season', $season)->get()->sum('goals');

        // Quantidade de Jogos
        if ( $season == date('Y', strtotime(now())) ){
            $matches_ = DB::table('matches')->whereYear('match_date', $season)->where('match_date', '<', $now)->get();   
        }
        $matches_ = DB::table('matches')->whereYear('match_date', $season)->get(); // todo
        $count_matches = $matches_->count('id');
        
        // Vitórias, Derrotas, Empates
        $victory = 0;
        $loss = 0;
        $equal = 0;
        foreach($matches_ as $m){
            if($m->goals_in_favor > $m->own_goals) {
                $victory += 1;
            }
            elseif($m->own_goals > $m->goals_in_favor){
                $loss += 1;
            }
            elseif($m->own_goals == $m->goals_in_favor){
                $equal += 1;
            }
        }  
                
        $success = 0; // todo
        // Aproveitamento
        if (count($matches) > 0){
            $disputed_points = $count_matches * 3;
            $obtained_points = ($victory * 3) + $equal;
            $success = round(($obtained_points / $disputed_points) * 100,1);
        }
        
        return view('dashboard', compact(
            'season',
            'matches', 
            'name', 
            'goals', 
            'gunners', 
            'sum_goals_in_favor', 
            'sum_own_goals', 
            'count_matches', 
            'birthdays', 
            'month_',
            'victory',
            'loss',
            'equal',
            'success'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Athlete $athlete)
    {
        //
    }
}
