@extends('layout.main_template')
@section('section_Main')
    <h1>Registro</h1>

    @dump($errors->all())

    <form action="{{route('register.handle')}}" method="post">
        @csrf
        {{-- name  --}}
        <label for="name">Nombre</label>
        <input type="text" name="name">
        {{-- email  --}}
        <label for="email">Correo Electronico</label>
        <input type="email" name="email">
        {{--  password  --}}
        <label for="password">Contraseña</label>
        <input type="password" name="password">
        {{--  //confirm Password  --}}
        <label for="conPassword">Confirmar Contraseña</label>
        <input type="password" name="password_confirmation">

        <button type="submit">Registrate </button>
    </form>    
    @endsection