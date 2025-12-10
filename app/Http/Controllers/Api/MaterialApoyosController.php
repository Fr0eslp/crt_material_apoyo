<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MaterialApoyoResource;
use App\Models\MaterialApoyo;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MaterialApoyosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $materiales = MaterialApoyo::all();    
        return response()->json($materiales);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'no_unidad' => 'required|string|max:50',
                'materia' => 'required|string|max:80',
                'grupo' => 'required|string|max:3',
                'periodo' => 'required|string|max:10',
                'rfc' => 'required|string|max:13',
                'id_material_apoyo' => 'required|string|max:22',
                'materiales_apoyo' => 'required|string|max:255',
                'materiales_apoyo1' => 'required|string|max:255',
            ], [
                'no_unidad.required' => 'Numero de control es obligatorio',
                'materia.required' => 'La materia es obligatoria',
                'grupo.required' => 'El grupo es obligatorio',
                'periodo.required' => 'El periodo es obligatorio',
                'rfc.required' => 'El RFC es obligatorio',
                'id_material_apoyo.required' => 'El ID del material de apoyo es obligatorio',
                'materiales_apoyo.required' => 'Los materiales de apoyo son obligatorios',
                'materiales_apoyo1.required' => 'Los materiales de apoyo adicionales son obligatorios',
            ]);

            $material = MaterialApoyo::create($validated);
            return response()->json($material, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        try {
            $material = MaterialApoyo::findOrFail($id);
            return response()->json(new MaterialApoyoResource($material));
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Material de apoyo no encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        try {
            $validated = $request->validate([
                'no_unidad' => 'required|string|max:50',
                'materia' => 'required|string|max:80',
                'grupo' => 'required|string|max:3',
                'periodo' => 'required|string|max:10',
                'rfc' => 'required|string|max:13',
                'id_material_apoyo' => 'required|string|max:22',
                'materiales_apoyo' => 'required|string|max:255',
                'materiales_apoyo1' => 'required|string|max:255',
            ], [
                'no_unidad.required' => 'Numero de control es obligatorio',
                'materia.required' => 'La materia es obligatoria',
                'grupo.required' => 'El grupo es obligatorio',
                'periodo.required' => 'El periodo es obligatorio',
                'rfc.required' => 'El RFC es obligatorio',
                'id_material_apoyo.required' => 'El ID del material de apoyo es obligatorio',
                'materiales_apoyo.required' => 'Los materiales de apoyo son obligatorios',
                'materiales_apoyo1.required' => 'Los materiales de apoyo adicionales son obligatorios',
            ]);

            $material = MaterialApoyo::findOrFail($id);
            $material->update($validated);
            return response()->json($material);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Material de apoyo no encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            MaterialApoyo::findOrFail($id)->delete();
            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Material de apoyo no encontrado'], 404);
        }
    }
}
