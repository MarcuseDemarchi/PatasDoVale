{{-- filepath: resources/views/adocoes/index.blade.php --}}
@extends('layouts.app')

@section('content')
<section class="dash_pg">
    <div class="dash_header">
        <x-button class='btn_login' routePage='#' id="btn_cadastrar_adocao">
            Cadastrar Adoção
        </x-button>
    </div>

    <div class="tabs_menu">
        <a href="{{ route('dashboard') }}">Animais</a>
        <a href="{{ route('pessoas.index') }}">Pessoas</a>
    </div>

    <form method="GET" class="filtro_animais" style="margin-bottom: 20px;">
        <label for="busca">Pesquisar por pessoa:</label>
        <input type="text" name="busca" id="busca" value="{{ $busca ?? '' }}" placeholder="Digite o nome da pessoa..." />
        <button type="submit" class="btn_login">Buscar</button>
    </form>

    <div class="table_listagem">
        <table class="tables_list">
            <thead>
                <tr>
                    <th>Pessoa</th>
                    <th>Animal</th>
                    <th>Data</th>
                    <th>Observação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doacoes as $doacao)
                    <tr>
                        <td>{{ $doacao->pessoa->pesnome }}</td>
                        <td>{{ $doacao->animal->anipelido }}</td>
                        <td>{{ \Carbon\Carbon::parse($doacao->doadata)->format('d/m/Y') }}</td>
                        <td>{{ $doacao->doaobservacao }}</td>
                        <td>
                            <form action="{{ route('adocoes.destroy', $doacao->doacodigo) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn_login">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

{{-- Modal Cadastrar Adoção --}}
<x-modal id="box_modal_adocao">
    <div class="modal_header">
        <h1>Cadastrar Adoção</h1>
        <x-css-close id="close_modal_adocao"/>
    </div>
    <div class="modal_content">
        <form action="{{ route('adocoes.store') }}" method="post">
            @csrf
            <select name="pescodigo" required>
                <option value="">Selecione uma pessoa</option>
                @foreach($pessoas as $pessoa)
                    <option value="{{ $pessoa->pescodigo }}">{{ $pessoa->pesnome }}</option>
                @endforeach
            </select>

            <select name="anicodigo" required>
                <option value="">Selecione um animal</option>
                @foreach($animaisDisponiveis as $animal)
                    <option value="{{ $animal->anicodigo }}">{{ $animal->anipelido }}</option>
                @endforeach
            </select>

            <input type="text" name="doaobservacao" placeholder="Observação (opcional)" maxlength="255" />

            <x-button class='btn_fullwidth'>Cadastrar Adoção</x-button>
        </form>
    </div>
</x-modal>
@endsection

@push('scripts')
<script>
    const btnOpenModalAdocao = document.getElementById('btn_cadastrar_adocao');
    const boxModalAdocao = document.getElementById('box_modal_adocao');
    const iconCloseModalAdocao = document.getElementById('close_modal_adocao');

    btnOpenModalAdocao.addEventListener('click', (event) => {
        event.preventDefault();
        boxModalAdocao.classList.add('opened');
    });

    iconCloseModalAdocao.addEventListener('click', (event) => {
        event.preventDefault();
        boxModalAdocao.classList.remove('opened');
    });
</script>
@endpush