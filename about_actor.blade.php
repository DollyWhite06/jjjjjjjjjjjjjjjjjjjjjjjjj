<!--Alguien haga mono este diseño, esto es puro html pelon help, y q llame a la ruta de put de actors-->
@if(isset($actor))
    <h1>{{ $actor->first_name }}</h1>
    <h1>{{ $actor->last_name }}</h1>
    @else
    <p>Actor not found.</p>
@endif


@extends('layouts.admin')

@section('title', 'Editar Actor')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Editar Actor</h3>
                </div>
                <div class="card-body">
                    @if(isset($actor))
                        <form method="POST" action="{{ route('actors.update', $actor->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <!--  nombre -->
                                    <div class="form-group">
                                        <label for="first_name">Primer Nombre</label>
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name', $actor->first_name) }}" required placeholder="Ingresa el primer nombre">
                                        @error('first_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Apellido -->
                                    <div class="form-group">
                                        <label for="last_name">Apellido</label>
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name', $actor->last_name) }}" required placeholder="Ingresa el apellido">
                                        @error('last_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Fecha de nacimiento -->
                                    <div class="form-group">
                                        <label for="birth_date">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control @error('birth_date') is-invalid @enderror" id="birth_date" name="birth_date" value="{{ old('birth_date', $actor->birth_date) }}" required placeholder="Ingresa la fecha de nacimiento">
                                        @error('birth_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Estado -->
                                    <div class="form-group">
                                        <label for="status">Estado</label>
                                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                            <option value="active" {{ old('status', $actor->status) == 'active' ? 'selected' : '' }}>Activo</option>
                                            <option value="inactive" {{ old('status', $actor->status) == 'inactive' ? 'selected' : '' }}>Inactivo</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- Botones de guardar y cancelar -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Actualizar Actor</button>
                                <a href="{{ route('actors.index') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    @else
                        <p>Actor no encontrado.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
