@extends('layouts.app')

@section('title', 'MaterialApoyo')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2>Material de apoyo</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('MaterialApoyo.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Nuevo material
            </a>
        </div>
    </div>

    <!-- Mensajes de éxito/error -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Tabla de materiales -->
    <div class="card">
        <div class="card-body">
            @if(isset($materialapoyo) && $materialapoyo->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No de unidad</th>
                                <th>Materia</th>
                                <th>Grupo</th>
                                <th>Periodo</th>
                                <th>RFC</th>
                                <th>ID del material</th>
                                <th>Materiales de apoyo</th>
                                <th>Materiales de apoyo complementarios</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($materialapoyo as $materialapoyo)
                                <tr>
                                    <td>{{ $materialapoyo->no_unidad }}</td>
                                    <td>{{ $materialapoyo->materia }}</td>
                                    <td>{{ $materialapoyo->grupo}}</td>
                                    <td>{{ $materialapoyo->periodo                                                                                   }}</td>
                                    <td>{{ $materialapoyo->rfc}}</td>
                                    <td>{{ $materialapoyo->id_material_apoyo }}</td>
                                    <td>{{ $materialapoyo->materiales_apoyo }}</td>
                                    <td>{{ $materialapoyo->materiales_apoyo1 }}</td>


                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('MaterialApoyo.show', $materialapoyo->id) }}" class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="{{ route('MaterialApoyo.edit', $materialapoyo->id) }}" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <form action="{{ route('MaterialApoyo.destroy', $materialapoyo->id) }}"  
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                class="btn btn-sm btn-danger" 
                                                title="Eliminar"
                                                    onclick="return confirm('¿Está seguro de eliminar este material {{$materialapoyo->id}}?')">
                                                    <i class="bi bi-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i> No hay materiales creados.
                    <a href="{{ route('MaterialApoyo.create') }}">Crear la primera</a>
            @endif
        </div>
    </div>
</div>
@endsection
