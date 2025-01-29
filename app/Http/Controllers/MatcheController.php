<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\Goal;
use App\Models\GoalkeeperGoal;
use App\Models\Matche;
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
        $year = date('Y'); // todo
                
        $matches = Matche::orderBy('match_date', 'desc')->get();
        
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
        $match = Matche::where('id', $request->match_id)->first();
        
        if($request->athlete){
            $search_goal = Goal::where('match_id', $request->match_id)->where('athlete_id', $request->athlete)->first();
            if($search_goal){
                $sum_goal = $search_goal->goals;
                $match->goals_in_favor += $sum_goal;  
                $sum_goal += $request->goals_in_favor;
                $search_goal->goals = $sum_goal;
                $search_goal->update();
                $match->goals_in_favor = $sum_goal;  
                $match->update();
            }
            else{
                $goal = new Goal();
                $goal->season =  substr($match->match_date, 0, 4);
                $goal->match_id = $request->match_id;
                $goal->athlete_id = $request->athlete;
                $goal->goals = $request->goals_in_favor; 
                $goal->save();
                $match->goals_in_favor += $request->goals_in_favor;
                $match->update();
            }
        }
        if($request->goalkeeper){
            $search_goal = GoalkeeperGoal::where('match_id', $request->match_id)->where('athlete_id', $request->goalkeeper)->first();
            if($search_goal){
                $sum_goal = $search_goal->goals;
                $match->own_goals += $sum_goal;
                $sum_goal += $request->own_goals;
                $search_goal->goals = $sum_goal;
                $search_goal->update(); 
                $match->update();
            }
            else{
                $goalkeeper = new GoalkeeperGoal();
                $goalkeeper->match_id = $request->match_id;
                $goalkeeper->season =  substr($match->match_date, 0, 4);
                $goalkeeper->athlete_id = $request->goalkeeper;
                $goalkeeper->goals = $request->own_goals;
                $goalkeeper->save();
                $match->own_goals = $request->own_goals;
                $match->update();
            }
        }
              
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
        $match = Matche::where('id', $goal->match_id)->first();
        $goals = $match->goals_in_favor - $goal->goals;
        $match->goals_in_favor = $goals;
        $match->update();
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
        $goalkeeper = GoalkeeperGoal::findOrFail($id);
        
        $match = Matche::where('id', $goalkeeper->match_id)->first();
        $goals = $match->own_goals - $goalkeeper->goals;
        $match->own_goals = $goals;
        $match->update();
        
        GoalkeeperGoal::where('id', $id)->delete();
        
        return redirect('/match/edit_goals/'.$goalkeeper->match_id);
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
