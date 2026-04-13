@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">

    <div class="card border-0 shadow-sm w-100" style="max-width: 420px;">

        <div class="card-body p-4">

            <div class="text-center mb-4">
                <h3 class="mb-1">Iniciar sesión</h3>
                <small class="text-muted">Accede a tu panel de administración</small>
            </div>

            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                {{-- EMAIL --}}
                <div class="mb-3">
                    <label class="form-label">Correo electrónico</label>
                    <input 
                        type="email" 
                        name="email" 
                        class="form-control" 
                        placeholder="correo@ejemplo.com"
                        required
                        autofocus
                    >
                </div>

                {{-- PASSWORD --}}
                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input 
                        type="password" 
                        name="password" 
                        class="form-control" 
                        placeholder="••••••••"
                        required
                    >
                </div>

                {{-- REMEMBER (opcional pro UX) --}}
                <div class="d-flex justify-content-between align-items-center mb-3">

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">
                            Recordarme
                        </label>
                    </div>

                </div>

                {{-- BUTTON --}}
                <button type="submit" class="btn btn-primary w-100">
                    Ingresar
                </button>

            </form>

        </div>

    </div>

</div>

@endsection