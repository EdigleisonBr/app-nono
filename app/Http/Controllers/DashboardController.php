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
    public function index()
    {
        $now = Carbon::now();
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        $month_ = ucfirst(utf8_encode(strftime("%B", strtotime($now))));
        
        $matches = Matche::all()->sortByDesc('match_date');

        // Aniversários
        $month = date('m');
        $birthdays = Athlete::whereMonth('date_birth', $month)->orderByRaw('day(date_birth) asc')->get();    
                
        // Artilheiros
        $gunners = Goal::select(
            [
                'athlete_id',
                 DB::raw("sum(goals) AS goal")
            ]
        )->groupBy('athlete_id')
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
        $sum_goals_in_favor = DB::table('goals')->get()->sum('goals');

        // Gols contra
        $sum_own_goals = DB::table('goalkeeper_goals')->get()->sum('goals');

        // Quantidade de Jogos
        $matches_ = DB::table('matches')->where('match_date', '<', $now)->get();
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
        
        // Aproveitamento
        if ($matches){
            $disputed_points = $count_matches * 3;
            $obtained_points = ($victory * 3) + $equal;
            $success = round(($obtained_points / $disputed_points) * 100,1);
        }
                
        return view('dashboard', compact(
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
        return view('athlete.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $athlete = new Athlete;
        $athlete->name = $request->name;
        $athlete->surname = $request->surname;    
        $athlete->cell_phone = $request->cell_phone;
        $athlete->date_birth = $request->date_birth; 
        if ($request->goalkeeper){
            $athlete->goalkeeper = 1;
        }
        else{ $athlete->goalkeeper = 0; }
        if ($request->active){
            $athlete->active = 1;
        }
        else{ $athlete->active = 0; }
        $athlete->save();

        // toast('Cadastro realizado com sucesso!','success');
        return redirect('/athlete/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $athlete = Athlete::findOrFail($id);
        return view('athlete.show', ['athlete' => $athlete]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $athlete = Athlete::findOrFail($id);
        return view('athlete.edit', ['athlete' => $athlete]);
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
        $data = $request->all();
        $data['active'] = isset($request->active) ? 1 : 0;
        $data['goalkeeper'] = isset($request->goalkeeper) ? 1 : 0;
        Athlete::findOrFail($request->id)->update($data);
        // toast('Cadastro editado com sucesso!','success');
        return redirect('/athlete/index');
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
