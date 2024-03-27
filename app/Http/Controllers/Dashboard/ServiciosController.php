<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Servicios;
use App\Models\Servicios_Unidades;
use App\Models\Personas;
use App\Models\Tipo_Servicios;
use App\Models\Tipo_Estados;
use App\Models\Tipo_Unidades;
use App\Models\Unidades;
use App\Models\Marcas;
use App\Http\Requests\CreateServicioRequest;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Barryvdh\DomPDF\Facade\Pdf;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicios::where('oculto','<>',1)->get();
        return view('dashboard.servicios.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $nombre = $request->nombre;
        $telefono = $request->telefono;
        $correo = $request->correo;
        $empresa = $request->empresa;

        $pagePersona = $request->input('page_user', 1);
        Paginator::currentPageResolver(function () use ($pagePersona) {
            return $pagePersona;
        });

        $personas = Personas::where(function ($query) use ($nombre) {
            $terminos = explode(' ', $nombre);
            
            foreach ($terminos as $termino) {
                $query->where(function ($q) use ($termino) {
                    $q->where('nombre', 'like', '%' . $termino . '%')
                      ->orWhere('paterno', 'like', '%' . $termino . '%')
                      ->orWhere('materno', 'like', '%' . $termino . '%');
                });
            }
        })
        ->when($telefono, function ($query) use ($telefono) {
            return $query->where('telefono', 'like', '%' . $telefono . '%');
        })
        ->when($correo, function ($query) use ($correo) {
            return $query->where('correo', 'like', '%' . $correo . '%');
        })
        ->whereHas('empresa', function ($query) use ($empresa) {
            return $query->where('nombre', 'like', '%' . $empresa . '%');
        })
        ->paginate(15, ['*'], 'page_user');

        $tipo = $request->tipo;
        $marca = $request->marca;
        $modelo = $request->modelo;
        $no_serieQ = $request->no_serieQ;
        $responsables = $request->responsables;

        $pageUnidad = $request->input('page_unit', 1);
        Paginator::currentPageResolver(function () use ($pageUnidad) {
            return $pageUnidad;
        });
        
        $unidades = Unidades::whereHas('tipounit', function ($query) use ($tipo) {
            return $query->where('nombre', 'like', '%' . $tipo . '%');
        })
        ->whereHas('marcas', function ($query) use ($marca) {
            return $query->where('nombre', 'like', '%' . $marca . '%');
        })
        ->when($modelo, function ($query) use ($modelo) {
            return $query->where('modelo', 'like', '%' . $modelo . '%');
        })
        ->when($no_serieQ, function ($query) use ($no_serieQ) {
            return $query->where('no_serie', 'like', '%' . $no_serieQ . '%');
        })
        ->whereHas('responsable', function ($query) use ($responsables) {
            $terminos2 = explode(' ', $responsables);
            
            foreach ($terminos2 as $termino2) {
                $query->where(function ($q) use ($termino2) {
                    $q->where('nombre', 'like', '%' . $termino2 . '%')
                      ->orWhere('paterno', 'like', '%' . $termino2 . '%')
                      ->orWhere('materno', 'like', '%' . $termino2 . '%');
                });
            }
        })
        ->paginate(3, ['*'], 'page_unit');

        $tecnicos = Personas::where('tipo_persona_id','=',1)->get();
        $tiposervs = Tipo_Servicios::all();
        $tipoestados = Tipo_Estados::all();
        $data = [
            'nombre'=>$nombre,
            'telefono'=>$telefono,
            'correo'=>$correo,
            'empresa'=>$empresa,
            'tipo' => $tipo,
            'marca' => $marca,
            'modelo' => $modelo,
            'no_serieQ' => $no_serieQ,
            'responsables' => $responsables
        ];
        return view('dashboard.servicios.create',$data, compact('personas','tecnicos','tiposervs','tipoestados','unidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateServicioRequest $request)
    {
        Servicios::create($request->validated());
        return redirect()->route('servicios.index')->with('message','Servicio exitosamente creado');
        session('message');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $servicios = Servicios::find($id);
        $serviciosAdd = Servicios_Unidades::where('servicio_id','=',$id)->get();
        return view('dashboard.servicios.show', compact('servicios','serviciosAdd'));
    }

    public function pdf($id)
    {
        $servicios = Servicios::find($id);
        $pdf = Pdf::loadview('dashboard.servicios.pdf',compact('servicios'));
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id,Request $request)
    {
        $nombre = $request->nombre;
        $telefono = $request->telefono;
        $correo = $request->correo;
        $empresa = $request->empresa;

        $servicios = Servicios::find($id);
        
        $usuario = $servicios->usuario;
        $tecnicoselect = $servicios->tecnico;
        $tiposervsselected = $servicios->tiposerv->id;
        $tipounitselected = $servicios->unidades->tipounit->id;
        $tipostateselected = $servicios->tipostate->id;
        $marcaselected = $servicios->unidades->marcas->id;
        $dueñoselected = $servicios->unidades->responsable->id;
        $es_empresaselected = $servicios->es_empresa;
        $usuarioname = $servicios->usuariodata->nombre . " " . $servicios->usuariodata->paterno . " " .
        $servicios->usuariodata->materno;
        $responsablename = $servicios->unidades->responsable->nombre . " " . $servicios->unidades->responsable->paterno . " " .
        $servicios->unidades->responsable->materno;

        $pagePersona = $request->input('page_user', 1);
        Paginator::currentPageResolver(function () use ($pagePersona) {
            return $pagePersona;
        });

        $personas = Personas::where(function ($query) use ($nombre) {
            $terminos = explode(' ', $nombre);
            
            foreach ($terminos as $termino) {
                $query->where(function ($q) use ($termino) {
                    $q->where('nombre', 'like', '%' . $termino . '%')
                      ->orWhere('paterno', 'like', '%' . $termino . '%')
                      ->orWhere('materno', 'like', '%' . $termino . '%');
                });
            }
        })
        ->when($telefono, function ($query) use ($telefono) {
            return $query->where('telefono', 'like', '%' . $telefono . '%');
        })
        ->when($correo, function ($query) use ($correo) {
            return $query->where('correo', 'like', '%' . $correo . '%');
        })
        ->whereHas('empresa', function ($query) use ($empresa) {
            return $query->where('nombre', 'like', '%' . $empresa . '%');
        })
        ->paginate(15, ['*'], 'page_user');

        $tipo = $request->tipo;
        $marca = $request->marca;
        $modelo = $request->modelo;
        $no_serieQ = $request->no_serieQ;
        $responsables = $request->responsables;

        $pageUnidad = $request->input('page_unit', 1);
        Paginator::currentPageResolver(function () use ($pageUnidad) {
            return $pageUnidad;
        });
        
        $unidades = Unidades::whereHas('tipounit', function ($query) use ($tipo) {
            return $query->where('nombre', 'like', '%' . $tipo . '%');
        })
        ->whereHas('marcas', function ($query) use ($marca) {
            return $query->where('nombre', 'like', '%' . $marca . '%');
        })
        ->when($modelo, function ($query) use ($modelo) {
            return $query->where('modelo', 'like', '%' . $modelo . '%');
        })
        ->when($no_serieQ, function ($query) use ($no_serieQ) {
            return $query->where('no_serie', 'like', '%' . $no_serieQ . '%');
        })
        ->whereHas('responsable', function ($query) use ($responsables) {
            $terminos2 = explode(' ', $responsables);
            
            foreach ($terminos2 as $termino2) {
                $query->where(function ($q) use ($termino2) {
                    $q->where('nombre', 'like', '%' . $termino2 . '%')
                      ->orWhere('paterno', 'like', '%' . $termino2 . '%')
                      ->orWhere('materno', 'like', '%' . $termino2 . '%');
                });
            }
        })
        ->paginate(3, ['*'], 'page_unit');

        $tecnicos = Personas::where('tipo_persona_id','=',1)->get();
        $tiposervs = Tipo_Servicios::all();
        $tipoestados = Tipo_Estados::all();
        $tipounidades = Tipo_Unidades::all();
        $marcas = Marcas::all();
        $data = [
            'nombre'=>$nombre,
            'telefono'=>$telefono,
            'correo'=>$correo,
            'empresa'=>$empresa,
            'tipo' => $tipo,
            'marca' => $marca,
            'modelo' => $modelo,
            'no_serieQ' => $no_serieQ,
            'responsables' => $responsables
        ];
        return view('dashboard.servicios.edit',$data, compact('servicios','personas','unidades','tecnicos','tiposervs','tipoestados','tipounidades','marcas','usuario','tecnicoselect',
        'tiposervsselected','tipounitselected','tipostateselected','marcaselected','dueñoselected','es_empresaselected','usuarioname','responsablename'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateServicioRequest $request, Servicios $servicios)
    {
        /*Notas
        Checar que al guardar la fecha de salida esta sea "mayor" a la fecha de entrada*/
        $servicios->update($request->validated());
        return redirect()->route('servicios.index')->with('message','Servicio exitosamente editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy ($id)
    {
        $servicios = Servicios::find($id);
        $servicios->oculto = 1;
        $servicios->save();
        return redirect()->route('servicios.index')->with('message','Servicio exitosamente eliminado');
    }
    public function moduser()
    {
    }
}
