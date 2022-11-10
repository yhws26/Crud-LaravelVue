<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Consultar datos enviados en el formulario
        $datos['perfil']=Perfil::paginate(8);
        return view('perfil.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('perfil.create');
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
        //$datosPerfil = request()->all();
        $datosPerfil = request()->except('_token');

        if($request->hasFile('fotoPerfil')){
            $datosPerfil['fotoPerfil']=$request->file('fotoPerfil')->store('uploads','public');
        }
        if($request->hasFile('fotoLicencia')){
            $datosPerfil['fotoLicencia']=$request->file('fotoLicencia')->store('uploads','public');
        }


        Perfil::insert($datosPerfil);
        //return response()->json($datosPerfil);
        return redirect('perfil')->with('mensaje','Perfil agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $perfil=Perfil::findOrFail($id);

        return view('perfil.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosPerfil = request()->except('_token','_method');

        if($request->hasFile('fotoPerfil')){
            $perfil=Perfil::findOrFail($id);

            Storage::delete('public/'.$perfil->fotoPerfil);

            $datosPerfil['fotoPerfil']=$request->file('fotoPerfil')->store('uploads','public');
        }
        
        if($request->hasFile('fotoLicencia')){
            $datosPerfil['fotoLicencia']=$request->file('fotoLicencia')->store('uploads','public');
        }

        Perfil::where('id','=',$id)->update($datosPerfil);

        $perfil=Perfil::findOrFail($id);
        return view('perfil.edit', compact('perfil'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $perfil=Perfil::findOrFail($id);

        if(Storage::delete('public/'.$perfil->fotoPerfil)){

            Perfil::destroy($id);

        }

        return redirect('perfil')->with('mensaje','Perfil Borrado');
    }
}
