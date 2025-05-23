<?php

namespace App\View\Components;

use App\Models\Datospki;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class InfoLayout extends Component
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
        $datospki = DB::table('datospkis')
            ->orderBy('categoriaspki_id','asc')
            ->orderBy('bloquecategoria','asc')
            ->get();
        return view('components.info-layout', compact('datospki'));
    }
}
