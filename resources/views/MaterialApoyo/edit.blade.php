@extends('layouts.app')

@section('title', 'Editar Material de Apoyo')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Editar Material de Apoyo</h4>
                </div>
                <div class="card-body">
                    
                    <!-- Mostrar errores de validación -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>¡Error!</strong> Por favor corrija los siguientes errores:
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Formulario -->
                    <form action="{{ route('MaterialApoyo.update', $materialapoyo->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- ID (Solo lectura) -->
                        <div class="mb-3">
                            <label for="id" class="form-label">
                                ID
                            </label>
                            <input 
                                type="text" 
                                class="form-control bg-light" 
                                id="id" 
                                value="{{ $materialapoyo->id }}"
                                readonly
                                disabled>
                            <small class="text-muted">El ID no se puede modificar</small>
                        </div>

                        <!-- NO de  Unidad -->
                        <div class="mb-3">
                            <label for="no_unidad" class="form-label">
                                No. Unidad <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('no_unidad') is-invalid @enderror" 
                                id="no_unidad" 
                                name="no_unidad" 
                                value="{{ old('no_unidad', $materialapoyo->no_unidad) }}"
                                maxlength="50"
                                required>
                            @error('no_unidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Materia -->
                        <div class="mb-3">
                            <label for="materia" class="form-label">
                                Materia <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('materia') is-invalid @enderror" 
                                id="materia" 
                                name="materia" 
                                value="{{ old('materia', $materialapoyo->materia) }}"
                                maxlength="80"
                                required>
                            @error('materia')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Grupo -->
                        <div class="mb-3">
                            <label for="grupo" class="form-label">
                                Grupo <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('grupo') is-invalid @enderror" 
                                id="grupo" 
                                name="grupo" 
                                value="{{ old('grupo', $materialapoyo->grupo) }}"
                                maxlength="3"
                                required>
                            @error('grupo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Periodo -->
                        <div class="mb-3">
                            <label for="periodo" class="form-label">
                                Periodo <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="date" 
                                class="form-control @error('periodo') is-invalid @enderror" 
                                id="periodo" 
                                name="periodo" 
                                value="{{ old('periodo', $materialapoyo->periodo) }}"
                                required>
                            @error('periodo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- RFC -->
                        <div class="mb-3">
                            <label for="rfc" class="form-label">
                                RFC <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('rfc') is-invalid @enderror" 
                                id="rfc" 
                                name="rfc" 
                                value="{{ old('rfc', $materialapoyo->rfc) }}"
                                maxlength="13"
                                required>
                            @error('rfc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- ID Material de Apoyo -->
                        <div class="mb-3">
                            <label for="id_material_apoyo" class="form-label">
                                ID del material <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('id_material_apoyo') is-invalid @enderror" 
                                id="id_material_apoyo" 
                                name="id_material_apoyo" 
                                value="{{ old('id_material_apoyo', $materialapoyo->id_material_apoyo) }}"
                                maxlength="22"
                                required>
                            @error('id_material_apoyo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Materiales de Apoyo -->
                        <div class="mb-3">
                            <label for="materiales_apoyo" class="form-label">
                                Materiales de Apoyo <span class="text-danger">*</span>
                            </label>
                            <textarea 
                                class="form-control @error('materiales_apoyo') is-invalid @enderror" 
                                id="materiales_apoyo" 
                                name="materiales_apoyo" 
                                rows="3"
                                maxlength="255"
                                required>{{ old('materiales_apoyo', $materialapoyo->materiales_apoyo) }}</textarea>
                            @error('materiales_apoyo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Materiales de Apoyo complementarios -->
                        <div class="mb-3">
                            <label for="materiales_apoyo1" class="form-label">
                                Materiales de apoyo complementarios <span class="text-danger">*</span>
                            </label>
                            <textarea 
                                class="form-control @error('materiales_apoyo1') is-invalid @enderror" 
                                id="materiales_apoyo1" 
                                name="materiales_apoyo1" 
                                rows="3"
                                required>{{ old('materiales_apoyo1', $materialapoyo->materiales_apoyo1) }}</textarea>
                            @error('materiales_apoyo1')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Información adicional -->
                        <div class="alert alert-info">
                            <small>
                                <strong>Fecha de creación:</strong> {{ $materialapoyo->created_at->format('d/m/Y H:i') }}<br>
                                <strong>Última actualización:</strong> {{ $materialapoyo->updated_at->format('d/m/Y H:i') }}
                            </small>
                        </div>

                        <!-- Botones -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('MaterialApoyo.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-save"></i> Actualizar Material de Apoyo
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection