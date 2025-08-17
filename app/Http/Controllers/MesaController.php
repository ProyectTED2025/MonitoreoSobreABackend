<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesa;
use Illuminate\Support\Facades\Auth;

class MesaController extends Controller
{
    /**
     * Lista todas las mesas
     */
    public function index()
    {
        $mesas = Mesa::all();

        return response()->json([
            'res' => true,
            'msg' => 'Listado de mesas',
            'status' => 200,
            'data' => $mesas
        ], 200);
    }

    /**
     * Actualiza solo los campos: listado_indice, copias_actas, observaciones
     * y registra el usuario que realiza el cambio
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'listado_indice' => 'nullable|boolean',
            'copias_actas' => 'nullable|boolean',
            'observaciones' => 'nullable|string|max:500',
        ]);

        $mesa = Mesa::find($id);

        if (!$mesa) {
            return response()->json([
                'res' => false,
                'msg' => 'Mesa no encontrada',
                'status' => 404
            ], 404);
        }

        $mesa->update(array_merge(
            $request->only(['listado_indice', 'copias_actas', 'observaciones']),
            ['id_user' => Auth::id()] // registra el usuario
        ));

        return response()->json([
            'res' => true,
            'msg' => 'Mesa actualizada correctamente',
            'status' => 200,
            'data' => $mesa
        ], 200);
    }
}
