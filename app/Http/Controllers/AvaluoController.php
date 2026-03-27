<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avaluo;

class AvaluoController extends Controller
{
    // Obtener todos los avalúos
    public function index()
    {
        return response()->json(Avaluo::all());
    }

    // Guardar avalúo
    public function store(Request $request)
    {
        $avaluo = Avaluo::create($request->all());

        return response()->json([
            'mensaje' => 'Avalúo creado correctamente',
            'data' => $avaluo
        ], 201);
    }

    // Mostrar avalúo
    public function show($id)
    {
        $avaluo = Avaluo::find($id);

        return response()->json($avaluo);
    }

    // Actualizar avalúo
    public function update(Request $request, $id)
    {
        $avaluo = Avaluo::find($id);
        $avaluo->update($request->all());

        return response()->json([
            'mensaje' => 'Avalúo actualizado'
        ]);
    }

    // Eliminar avalúo
    public function destroy($id)
    {
        Avaluo::destroy($id);

        return response()->json([
            'mensaje' => 'Avalúo eliminado'
        ]);
    }
}