<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vivienda;

class ViviendaController extends Controller
{
    // Obtener todas las viviendas
    public function index()
    {
        return response()->json(Vivienda::all());
    }

    // Guardar vivienda
    public function store(Request $request)
    {
        $vivienda = Vivienda::create($request->all());

        return response()->json([
            'mensaje' => 'Vivienda creada correctamente',
            'data' => $vivienda
        ], 201);
    }

    // Mostrar vivienda
    public function show($id)
    {
        $vivienda = Vivienda::find($id);

        return response()->json($vivienda);
    }

    // Actualizar vivienda
    public function update(Request $request, $id)
    {
        $vivienda = Vivienda::find($id);
        $vivienda->update($request->all());

        return response()->json([
            'mensaje' => 'Vivienda actualizada'
        ]);
    }

    // Eliminar vivienda
    public function destroy($id)
    {
        Vivienda::destroy($id);

        return response()->json([
            'mensaje' => 'Vivienda eliminada'
        ]);
        $request->validate([
        'direccion' => 'required',
        'ciudad' => 'required'
        ]);
    }
}