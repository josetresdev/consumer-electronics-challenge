@extends('layouts.app')

@section('content')

<div class="mb-4">
    <h2>Crear producto</h2>
    <small class="text-muted">Registra un nuevo producto en el sistema</small>
</div>

<form method="POST" action="{{ route('products.store') }}" class="row g-3">
    @csrf

    <div class="col-md-6">
        <label class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="col-md-6">
        <label class="form-label">Descripción</label>
        <input type="text" name="description" class="form-control" value="{{ old('description') }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">Marca</label>
        <input type="text" name="brand" class="form-control" value="{{ old('brand') }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">Categoría</label>
        <input type="text" name="category" class="form-control" value="{{ old('category') }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">Modelo</label>
        <input type="text" name="model" class="form-control" value="{{ old('model') }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">Lote</label>
        <input type="text" name="batch" class="form-control" value="{{ old('batch') }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">Fecha de fabricación</label>
        <input type="date" name="manufactured_at" class="form-control" value="{{ old('manufactured_at') }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">Precio</label>
        <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">Stock</label>
        <input type="number" name="stock" class="form-control" value="{{ old('stock') }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">Estado</label>
        <select name="status" class="form-select">
            <option value="available">Disponible</option>
            <option value="reserved">Reservado</option>
            <option value="disposed">Disposición</option>
        </select>
    </div>

    <div class="col-12">
        <label class="form-label">Observaciones</label>
        <textarea name="notes" class="form-control" rows="3">{{ old('notes') }}</textarea>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">
            Guardar producto
        </button>
    </div>

</form>

@endsection