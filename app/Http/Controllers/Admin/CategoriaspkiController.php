<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoriaspki;
use Illuminate\Http\Request;

class CategoriaspkiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriaspki = Categoriaspki::paginate();
        return view('admin.categoriaspki.index', compact('categoriaspki'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoriaspki.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Categoriaspki::create($request->all());
        return redirect()->route('admin.categoriaspki.index')->with('info','Categoria creada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoriaspki  $categoriaspki
     * @return \Illuminate\Http\Response
     */
    public function show(Categoriaspki $categoriaspki)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoriaspki  $categoriaspki
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoriaspki $categoriaspki)
    {
        return view('admin.categoriaspki.edit',compact('categoriaspki'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoriaspki  $categoriaspki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoriaspki $categoriaspki)
    {
        $request->validate([
            'categoria'=>'required',
        ]);

        $categoriaspki->update($request->all());

        return redirect()->route('admin.categoriaspki.index')->with('info','CAtegoria actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoriaspki  $categoriaspki
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoriaspki $categoriaspki)
    {
        //
    }
}
