<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['usuarios']=Usuario::paginate(5);
        return view('usuarios.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');

        
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $valida=[
            'correo'=>'required|email'
        ];
        $mensaje=[
            'required'=>'El :attribute es obligatorio',
        ];

        $this->validate($request,$valida,$mensaje);

        $datosUsuario = request()->except('_token');
        Usuario::insert($datosUsuario);
        return redirect('usuarios');
        //return response()->json($datosUsuario);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //
        $usuario=usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $valida=[
            'correo'=>'required|email'
        ];
        $mensaje=[
            'required'=>'El :attribute es obligatorio',
        ];

        $this->validate($request,$valida,$mensaje);
        
        $datosUsuario = request()->except(['_token','_method']);
        //verifico que existe el Id que quiero actualizar
        usuario::where('id','=',$id)->update($datosUsuario);

        //busco los datos actualizado y los muestro
        $usuario=usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        usuario::destroy($id);
        return redirect('usuarios');
    }
}
