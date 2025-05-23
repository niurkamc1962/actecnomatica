<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Empresaspki;
use Illuminate\Http\Request;

class EmpresaspkiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresaspki = Empresaspki::paginate();
        return view('admin.empresaspki.index', compact('empresaspki'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.empresaspki.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Empresaspki::create($request->all());
        return redirect()->route('admin.empresaspki.index')->with('info','Empresa creada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresaspki  $empresaspki
     * @return \Illuminate\Http\Response
     */
    public function show(Empresaspki $empresaspki)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresaspki  $empresaspki
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresaspki $empresaspki)
    {
        return view('admin.empresaspki.edit',compact('empresaspki'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresaspki  $empresaspki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresaspki $empresaspki)
    {
        $request->validate([
            'reeup'=>'required',
            'entidad'=>'required',
        ]);

        $empresaspki->update($request->all());

        return redirect()->route('admin.empresaspki.index')->with('info','Empresa actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresaspki  $empresaspki
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresaspki $empresaspki)
    {
        $empresaspki->delete();
        return redirect()->route('admin.empresaspki.index')->with('info','Eliminada con exito la Entidad');
    }
}
