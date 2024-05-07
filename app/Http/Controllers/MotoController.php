<?php

namespace App\Http\Controllers;

use App\Models\moto;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dadosMotos = moto::All();
        $contador = $dadosMotos->count();

        return 'Motos: '.$contador.$dadosMotos.Response()->json([],Response::HTTP_NO_CONTENT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dadosMotos = $request->ALL();
        $validarDados = Validator::make($dadosMotos, [
            'marca' => 'required',
            'modelo' => 'required',
            'cor' => 'required',
            'ano' => 'required',
        ]);

        if($validarDados->fails()){
            return 'Dados Invalidos.'.$validarDados->error(true). 500;
        }

        $motosCadastrar = moto::create($dadosMotos);

        if($motosCadastrar){
            return 'Dados Cadastrados com Sucesso.'.Response()->json([],Response::HTTP_NO_CONTENT);
        }
        else{
            return 'Dados não cadastrados.'.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(moto $moto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, moto $moto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(moto $moto)
    {
        //
    }
}
