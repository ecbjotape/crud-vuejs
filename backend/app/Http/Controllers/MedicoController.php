<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Exception;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index()
    {
        try {
            $response = Medico::with('especialidade', 'tipoDeConsulta')->get();

            return response()->json([
                'message' => '',
                'data' => $response,
                'result' => true,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'data' => '',
                'result' => false,
            ], 500);
        }
        return [];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {

            $dados = $request->all();
            $response = Medico::create($dados)::with('especialidade', 'tiposDeConsulta')->get();

            return response()->json([
                'message' => '',
                'data' => $response,
                'result' => true,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'data' => '',
                'result' => false,
            ], 500);
        }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try {

            $tipo = Medico::findOrfail($id);

            $response = $tipo->update([
                'name' => $request->name,
                'crm' => $request->crm,
                'horarios' => $request->horarios,
                'especialidades' => $request->especialidades,
                'tipo_de_consultas' => $request->tipo_de_consultas
            ]);

            return response()->json([
                'message' => '',
                'data' => $response,
                'result' => true,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'data' => '',
                'result' => false,
            ], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $medico = Medico::findOrfail($request->id);
        $medico->delete();
    }
}
