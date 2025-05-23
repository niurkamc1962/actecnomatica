<?php

namespace App\View\Components;

use App\Models\Datospki;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class InfoMarcoLegal extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        //$datospki = Datospki::all();
        /*$datospki = DB::table('datospkis')
            ->where('categoriaspki_id','=',3)
            ->orderBy('bloquecategoria')
            ->get();*/

        $datospki = DB::table('datospkis')
            ->leftJoin('documentospkis', 'datospkis.id','=', 'documentospkis.datospki_id')
            ->select(
                'datospkis.id',
                'datospkis.titulo',
                'datospkis.contenido',
                'datospkis.categoriaspki_id',
                'datospkis.bloquecategoria',
                'datospkis.iconopki',
                'datospkis.tooltip',
                'datospkis.imagenpki',
                'datospkis.documentopki as documentopki',
                DB::raw('GROUP_CONCAT(DISTINCT CONCAT(documentospkis.id,"-",documentospkis.documentopki)) as documentospki')
            )
            ->groupBy('datospkis.bloquecategoria')
            ->where('categoriaspki_id','=','3')
            ->orderBy('datospkis.bloquecategoria')
            ->get();
        return view('components.info-marco-legal', compact('datospki'));
    }
}
