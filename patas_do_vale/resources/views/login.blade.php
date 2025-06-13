@extends('layouts.app')

@section('content') 
    <section class="form_pg">
        <div class="form_left">
            <h1 class="title">Fazer Login!</h1>
            <p class="subtitle">Acesse a plataforma de Patas do Vale para gerenciar de forma eficiente as doaçoes de animais(O texto em questao ainda deve ser mudado, atualmente nao sei o que seria interessante colocar)</p>
        </div>
        <div class="form_right">
            <img src="{{asset('images/logo.png')}}" alt="logo" title="logo"/>
            <form action="{{route('auth')}}" method="post">
                @csrf
                <input type="email" name='email' placeholder="Email"/>
                <input type="password" name='name' placeholder="senha"/>

                <span><a href="{{route('forgot_password')}}">Esqueceu sua senha?</a></span>

                <x-button class='btn_fullwidth' routePage='auth'>                                        
                    Login
                    <x-simpleline-login />
                </x-button>

                @if (session('status'))
                    <span class="txt_error">{{ session('status') }}</span>
                @endif
            </form>
        </div>
    </section>
@endsection