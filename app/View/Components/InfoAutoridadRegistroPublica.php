<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\Component;


class InfoAutoridadRegistroPublica extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
           /* $datospki = DB::table('datospkis')
            ->orderBy('categoriaspki_id')
            ->get();
 
        return view('components.info-autoridad-registro-publica', compact('datospki'));*/
        //return redirect()->away('http://192.168.0.2/plantillas_menu_lateral/08');
        //return Redirect::to('http://192.168.0.2/plantillas_menu_lateral/08');
        //return Redirect::away('http://192.168.0.2/plantillas_menu_lateral/08');
    }
}
