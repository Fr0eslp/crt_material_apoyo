<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MaterialApoyoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'no_unidad' => $this->no_unidad,
            'materia' => $this->materia,
            'grupo' => $this->grupo,
            'periodo' => $this->periodo,
            'rfc' => $this->rfc,
            'id_material_apoyo' => $this->id_material_apoyo,
            'materiales_apoyo' => $this->materiales_apoyo,
            'materiales_apoyo1' => $this->materiales_apoyo1,
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),
        ];
    }
}
