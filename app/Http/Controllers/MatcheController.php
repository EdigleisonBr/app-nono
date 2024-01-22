<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\Goal;
use App\Models\GoalkeeperGoal;
use App\Models\Matche;
use App\Models\OppossingTeam;
use Illuminate\Http\Request;

class MatcheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Matche::all();
        return view('match.index', compact('matches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('match.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $match = new Matche();
        $match->local = $request->local;
        $match->match_date = $request->match_date;    
        $match->hour = $request->hour; 
        $match->oppossing_team_id = $request->oppossing_team_id;
        $match->save();

        // toast('Cadastro realizado com sucesso!','success');
        return redirect('/match/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matche  $matche
     * @return \Illuminate\Http\Response
     */
    public function show(Matche $matche)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matche  $matche
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $match = Matche::findOrFail($id);
        return view('match.edit', ['match' => $match]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matche  $matche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        Matche::findOrFail($request->id)->update($data);
        // toast('Cadastro editado com sucesso!','success');
        return redirect('/match/index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matche  $matche
     * @return \Illuminate\Http\Response
     */
    public function edit_goals($id)
    {
        $match = Matche::findOrFail($id);
        $athletes = Athlete::all();
        $goalkeepers = Athlete::where('goalkeeper', '=', True)->get();
        $goals_in_favor = Goal::where('match_id', $id)->get();
        $own_goals = GoalkeeperGoal::where('match_id', $id)->get();
        return view('match.edit_goals', ['match' => $match, 
                                        'athletes' => $athletes, 
                                        'goalkeepers' => $goalkeepers,
                                        'goals_in_favor' => $goals_in_favor,
                                        'own_goals' => $own_goals]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matche  $matche
     * @return \Illuminate\Http\Response
     */
    public function update_goals(Request $request)
    {
        if($request->athlete){
            $search_goal = Goal::where('match_id', $request->match_id)->where('athlete_id', $request->athlete)->first();
            if($search_goal){
                $sum_goal = $search_goal->goals;
                $sum_goal += $request->goals_in_favor;
                $search_goal->goals = $sum_goal;
                $search_goal->update();   
            }
            else{
                $goal = new Goal();
                $goal->match_id = $request->match_id;
                $goal->athlete_id = $request->athlete;
                $goal->goals = $request->goals_in_favor; 
                $goal->save();
            }
        }
        if($request->goalkeeper){
            $search_goal = GoalkeeperGoal::where('match_id', $request->match_id)->where('athlete_id', $request->goalkeeper)->first();
            if($search_goal){
                $sum_goal = $search_goal->goals;
                $sum_goal += $request->own_goals;
                $search_goal->goals = $sum_goal;
                $search_goal->update(); 
            }
            else{
                $goalkeeper = new GoalkeeperGoal();
                $goalkeeper->match_id = $request->match_id;
                $goalkeeper->athlete_id = $request->goalkeeper;
                $goalkeeper->goals = $request->own_goals;
                $goalkeeper->save();
            }
        }
              
        // toast('Cadastro editado com sucesso!','success');
        return redirect('/match/edit_goals/'.$request->match_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matche  $matche
     * @return \Illuminate\Http\Response
     */
    public function delete_goals($id)
    {
        $goal = Goal::findOrFail($id);
        Goal::where('id', $id)->delete();
        return redirect('/match/edit_goals/'.$goal->match_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matche  $matche
     * @return \Illuminate\Http\Response
     */
    public function delete_goals_goalkeeper($id)
    {
        $goal = GoalkeeperGoal::findOrFail($id);
        GoalkeeperGoal::where('id', $id)->delete();
        return redirect('/match/edit_goals/'.$goal->match_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matche  $matche
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matche $matche)
    {
        //
    }
}
