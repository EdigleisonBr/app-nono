<?php

namespace App\Http\Controllers;

use App\Models\OppossingTeam;
use Illuminate\Http\Request;

class OppossingTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oppossing_teams = OppossingTeam::all();
        return view('oppossing_team.index', compact('oppossing_teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('oppossing_team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oppossing_team = new OppossingTeam;
        $oppossing_team->name = $request->name;
        $oppossing_team->image = $request->image;
        $oppossing_team->responsible = $request->responsible;    
        $oppossing_team->cell_phone = $request->cell_phone; 
        if ($request->active){
            $oppossing_team->active = 1;
        }
        else{ $oppossing_team->active = 0; }
        $oppossing_team->save();

        // toast('Cadastro realizado com sucesso!','success');
        return redirect('/oppossing_team/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OppossingTeam  $oppossingTeam
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oppossing_team = OppossingTeam::findOrFail($id);
        return view('oppossing_team.show', ['oppossing_team' => $oppossing_team]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OppossingTeam  $oppossingTeam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oppossing_team = OppossingTeam::findOrFail($id);
        return view('oppossing_team.edit', ['oppossing_team' => $oppossing_team]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OppossingTeam  $oppossingTeam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $data['active'] = isset($request->active) ? 1 : 0;
        OppossingTeam::findOrFail($request->id)->update($data);
        // toast('Cadastro editado com sucesso!','success');
        return redirect('/oppossing_team/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OppossingTeam  $oppossingTeam
     * @return \Illuminate\Http\Response
     */
    public function destroy(OppossingTeam $oppossingTeam)
    {
        //
    }
}
