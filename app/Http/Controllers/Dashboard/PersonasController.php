<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        echo "Index";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $empresas = Empresa::get();
      dd($empresas);
      
      echo view('dashboard.personas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd(request("nombre"));
        echo($request->all);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $personas = Personas::find($id);
        return compact('peronas');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personas $personas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personas $personas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personas $personas)
    {
        //
    }
}
