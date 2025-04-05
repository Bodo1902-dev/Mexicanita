@extends('layout.main_template')
@section('section_Main')
    <h1>Login</h1>

    @dump($errors->all())

    <form action="{{route('login')}}" method="post">
        @csrf
        {{--email  --}}
        <label for="email">Correo Electronico</label>
        <input type="email" name="email">

        {{--  password  --}}
        <label for="password">Contraseña</label>
        <input type="password" name="password">

        <button type="submit">Iniciar</button>
    </form>    
    @endsection