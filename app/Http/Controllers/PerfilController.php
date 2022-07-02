<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use Illuminate\Support\Facades\Validator;



class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfiles=Perfil::all();
        return $perfiles;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validar=Validator::make($request->all(),
        ["usuario"=>"required"]
    );
    if(!$validar->fails()){
        $perfil = new Perfil();
        $perfil->usuario=$request->usuario;
        $perfil->descripcion=$request->descripcion;
        $perfil->hobby=$request->hobby;
        $perfil->gustos=$request->gustos;
        $perfil->save();
        return response()->json([
            'mensaje'=> "corectamente guardado"
        ]);


    }
    
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perfil=Perfil::where("id",$id)->get();
        return $perfil;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validacion=Validator::make($request->all(),[
            "usuario"=>'required'
        ]);
        if(!$validacion->fails()){

       
        $perfil=Perfil::find($id);
        if(isset($perfil)){
            $perfil->usuario=$request->usuario;
            $perfil->descripcion=$request->descripcion;
            $perfil->hobby=$request->descripcion;
            $perfil->save();
            return response()->json([
                "mensaje"=>" el articulo fue actualizado exitosamente"
            ]);
        }else{
            return response()->json([
                "mensaje"=>"error no fue actualizado correctamente"
            ]);
        }
    }else{
        return response()->json([
            "mensaje"=>"error validacion incorrecta"
        ]);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $perfil=Perfil::find($id);
        if(isset($perfil)){
         $perfilo->delete();   
         return response()->json([
            "mensaje"=>"registro borrado exitosamente"
         ]);
        }else{
            return response()->json([
                "mensaje"=>"registro ño encontrado"
            ]);
            
        }
        return response()->json([
           "mensaje"=>"estoy en el destroy",
           "id"=>$id,
           "producto"=>$perfil
        ]);
    }
}

