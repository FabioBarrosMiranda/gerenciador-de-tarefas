@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">
        <h2 class="mb-4">Cadastro</h2>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nome</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label>Senha</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label>Confirmar Senha</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <button type="submit" class="btn btn-success w-100">Cadastrar</button>

            <p class="mt-3 text-center">
                Já tem conta? <a href="{{ route('login') }}">Entrar</a>
            </p>
        </form>
    </div>
</div>

@endsection