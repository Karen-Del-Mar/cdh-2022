<?php

namespace App\Http\Controllers;

use App\Http\Requests\SolicitudeRequest;
use App\Models\Solicitude;
use Illuminate\Http\Request;

class SolicitudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes = Solicitude::get();
        return view ('dashboard.solicitudes.index',['lista'=>$solicitudes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.solicitudes.create',['solicitude'=> new Solicitude()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SolicitudeRequest $request)
    {  
        Solicitude::create($request ->validated());
        return back()->with('solicitud','sended');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solicitude  $solicitude
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solicitudes = (Solicitude::where('id',$id)->get())[0];
        return view('dashboard.solicitudes.show',['solicitudes'=>$solicitudes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solicitude  $solicitude
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitude $solicitude)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solicitude  $solicitude
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitude $solicitude)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solicitude  $solicitude
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitude $solicitude)
    {
        //
    }
    public function showConditions()
    {
        return view('dashboard.solicitudes.conditions');
    }
}
