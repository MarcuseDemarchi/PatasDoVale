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
                @error('name')
                    <p class="field_error">{{ $message }}</p>
                @enderror
                <input type="text" name="name" placeholder="Seu nome" value="{{old('name')}}" class="@error('name') field_error @enderror"/>

                @error('email')
                    <p class="field_error">{{ $message }}</p>
                 @enderror
                <input type="text" name="email" placeholder="Seu email" value="{{old('email')}}" class="@error('email') field_error @enderror" />

                @error('password')
                    <p class="field_error">{{ $message }}</p>
                @enderror
                <input type="password" name="password" placeholder="Sua senha" value="{{old('password')}}" class="@error('password') field_error @enderror" />

                <span>Já tem conta? <a href="{{route('login')}}">Entrar</a></span>

                <x-button class='btn_fullwidth' routePage='insert_account'>Criar conta</x-button>
                @if(@session('status'))
                    <span class="txt_sucess">{{session('status')}}</span>
                @endif                
            </form>
        </div>
    </section>
@endsection
