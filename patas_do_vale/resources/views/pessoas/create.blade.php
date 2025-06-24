@extends('layouts.app')

@section('content')
<section class="dash_pg">
    <div class="dash_header">
        <h1>{{ isset($pessoa) ? 'Editar Pessoa' : 'Cadastrar Pessoa' }}</h1>
    </div>

    <form action="{{ isset($pessoa) ? route('pessoas.update', $pessoa->pescodigo) : route('pessoas.store') }}" method="POST">
        @csrf
        @if(isset($pessoa))
            @method('PUT')
        @endif

        <input type="text" name="pesnome" placeholder="Nome" value="{{ $pessoa->pesnome ?? old('pesnome') }}" required />
        <input type="date" name="pesdatanascimento" value="{{ isset($pessoa) ? date('Y-m-d', strtotime($pessoa->pesdatanascimento)) : old('pesdatanascimento') }}" required />
        <input type="number" name="cidcodigo" placeholder="Código da Cidade" value="{{ $pessoa->cidcodigo ?? old('cidcodigo') }}" required />

        <x-button class='btn_fullwidth'>
            {{ isset($pessoa) ? 'Atualizar' : 'Cadastrar' }}
        </x-button>
    </form>
</section>
@endsection
