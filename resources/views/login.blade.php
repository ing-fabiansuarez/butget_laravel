@extends('layout')

@section('tailwind', true)

@section('title', 'Log in')

@section('body')
    <div class="max-w-sm mx-auto my-12">
        <img class="h-12 mx-auto mb-8" src="/logo.svg" />
        @if (session('alert_type') && session('alert_message'))
            @include('partials.alerts.' . session('alert_type'), ['payload' => ['classes' => 'mb-4', 'message' => session('alert_message')]])
        @endif
        <div class="p-5 bg-white border rounded-md">
            <form method="POST">
                {{ csrf_field() }}
                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700">E-mail</label>
                    <input class="w-full px-3 py-2 text-sm border rounded-md" type="email" name="email" value="{{ old('email') }}" autofocus />
                </div>
                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700">Contraseña</label>
                    <input class="w-full px-3 py-2 text-sm border rounded-md" type="password" name="password" />
                    <div class="mt-1 text-right">
                        <a href="{{ route('reset_password') }}" class="text-sm transition text-primary-regular hover:text-primary-dark">Olvidaste contraseña?</a>
                    </div>
                </div>
                <button class="w-full py-2.5 hover:bg-primary-dark transition text-sm bg-primary-regular text-white rounded-md">Iniciar Sesión</button>
            </form>
        </div>
        <div class="mt-4 text-center">
            <a class="text-sm transition text-primary-regular hover:text-primary-dark" href="{{ route('register') }}">Primera Vez? Registrarse.</a>
        </div>
    </div>
@endsection
