<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use Illuminate\Http\Request;

class AthleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $athletes = Athlete::all();
        return view('athlete.index', compact('athletes'));
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
        $athlete->instagram = $request->instagram;
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