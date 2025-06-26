@extends('layouts.bootstrap')

@section('title', 'Connexion')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card shadow-sm p-4" style="width: 320px;">
        <h2 class="mb-4 text-center">Connexion</h2>
        <form action="{{ route('auth.login') }}" method="POST" novalidate>
            @csrf
            <div class="mb-3">
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    placeholder="Email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus
                >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    placeholder="Mot de passe" 
                    class="form-control @error('password') is-invalid @enderror" 
                    required
                >
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
        </form>
    </div>
</div>
@endsection
