@extends('layouts.app')

@section('content') 
    <section class="form_pg">
        <div class="form_left">
            <h1 class="title">Crie sua conta!</h1>
            <p class="subtitle">Cria sua conta para acessar a plataforma de Patas do Vale para gerenciar de forma eficiente as doaçoes de animais(O texto em questao ainda deve ser mudado, atualmente nao sei o que seria interessante colocar)</p>
        </div>
        <div class="form_right">
            <img src="{{asset('images/logo.png')}}" alt="logo" title="logo"/>
            <form action="{{route('insert_account')}}" method="post">
                @csrf
                <input type="text" name='name' placeholder="Seu Nome" value="{{old('name')}}" class="@error('name') field_error @enderror"/>
                @error('name')
                    <p>{{ $message }}</p>
                @enderror

                <input type="email" name='email' placeholder="Seu Email" value="{{old('email')}}"/>
                @error('email')
                    <p>{{ $message }}</p>
                @enderror

                <input type="password" name='password' placeholder="Sua senha" value="{{old('password')}}"/>
                @error('password')
                    <p>{{ $message }}</p>
                @enderror

                <span>Já tem conta? <a href="{{route('login')}}">Entrar</a></span>

                <x-button class='btn_fullwidth' routePage='insert_account'>Criar conta</x-button>
            </form>
        </div>
    </section>
@endsection
