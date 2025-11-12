@extends('layouts.app')
 
@section('title', 'Detalle de Material de Apoyo')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Detalle de Material de Apoyo</h4>
                    <div>
                        <a href="{{ route('MaterialApoyo.edit', $materialapoyo->id) }}"
                           class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <a href="{{ route('MaterialApoyo.index') }}"
                           class="btn btn-sm btn-secondary">
                            <i class="bi bi-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th width="30%" class="bg-light">ID</th>
                                <td>{{ $materialapoyo->id }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">NO de Unidad</th>
                                <td>{{ $materialapoyo->no_unidad }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Materia</th>
                                <td>{{ $materialapoyo->materia }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Grupo</th>
                                <td>{{ $materialapoyo->grupo }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Periodo</th>
                                <td>{{ $materialapoyo->periodo }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">RFC</th>
                                <td>{{ $materialapoyo->rfc }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">ID  del material</th>
                                <td>{{ $materialapoyo->id_material_apoyo }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Materiales de Apoyo</th>
                                <td>{{ $materialapoyo->materiales_apoyo }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Materiales de apoyo complementarios</th>
                                <td>{{ $materialapoyo->materiales_apoyo1 }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Creado</th>
                                <td>{{ $materialapoyo->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Última Actualización</th>
                                <td>{{ $materialapoyo->updated_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        </tbody>
                    </table>
 
                    <!-- Botón de eliminar -->
                    <div class="mt-3">
                        <form action="{{ route('MaterialApoyo.destroy', $materialapoyo->id) }}"
                              method="POST"
                              onsubmit="return confirm('¿Está seguro de eliminar este material de apoyo?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Eliminar Material de Apoyo
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection