<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Servicios;
use App\Models\Servicios_Unidades;
use App\Models\Tipo_Servicios;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$user = User::find('auth');
        
        $servicios = Servicios::where('fecha_salida','<>',null)->where('oculto','<>',1)->orderBy('fecha_salida','desc')->take(10)->get();
        $iniservis = Servicios::where('fecha_salida','=',null)->where('oculto','<>',1)->orderBy('fecha_entrada','desc')->take(10)->get();
        return view('home', compact('servicios','iniservis'));
    }
}
