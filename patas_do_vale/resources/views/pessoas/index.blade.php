@extends('layouts.app')

@section('content')

<section class="dash_pg">
    <div class="dash_header">
        <x-button class='btn_login' routePage='#' id="btn_cadastrar_pessoa">
            Cadastrar Pessoa           
        </x-button>
    </div>

    <div class="tabs_menu">
        <a href="{{ route('dashboard') }}">Animais</a>
        <a href="{{ route('adocoes.index') }}" class="active">Adoções</a>
    </div>

    <form method="GET" class="filtro_animais" style="margin-bottom: 20px;">
        <label for="busca">Pesquisar pessoa:</label>
        <input type="text" name="busca" id="busca" value="{{ $busca ?? '' }}" placeholder="Digite o nome..." />
        <button type="submit" class="btn_login">Buscar</button>
    </form>

    <div class="list_animais">
        <table class="tables_list">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>Nome Cidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pessoas as $pessoa)
                <tr>
                    <td>{{ $pessoa->pesnome }}</td>
                    <td>{{ date('d/m/Y', strtotime($pessoa->pesdatanascimento)) }}</td>
                    <td>{{ $pessoa->cidade->cidnome }}</td>
                    <td>
                        <button class="btn_login"
                            onclick="abrirModalEditPessoa(
                                {{ $pessoa->pescodigo }},
                                '{{ $pessoa->pesnome }}',
                                '{{ $pessoa->pesdatanascimento }}',
                                {{ $pessoa->cidade->estcodigo ?? 0 }},
                                {{ $pessoa->cidcodigo }})"
                            type="button">
                            Editar
                        </button>

                        <form action="{{ route('pessoas.destroy', $pessoa->pescodigo) }}" method="POST" style="display:inline;">
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

{{--Modal cadastrar pessoa --}}
<x-modal id="box_modal">
    <div class="modal_header">
        <h1>Cadastrar Pessoa</h1>
        <x-css-close id="close_classe_modal"/>
    </div>

    <div class="modal_content">
        <form action="{{ route('pessoas.store') }}" method="post">
            @csrf

            <input type="text" name="pesnome" placeholder="Nome pessoa" required />

            <input type="date" name="pesdatanascimento" placeholder="Data de nascimento" required />

            <select name="estado" id="estado_select" class="input_select" required>
                <option value="">Selecione um estado</option>
                @foreach($estados as $estado)
                    <option value="{{ $estado->estcodigo }}">{{ $estado->estnome }}</option>
                @endforeach
            </select>

            <select name="cidcodigo" id="cidade_select" class="input_select" required>
                <option value="">Selecione uma cidade</option>
            </select>

            <x-button class='btn_fullwidth'>Cadastrar Pessoa</x-button> 
        </form>
    </div>
</x-modal>

<x-modal id="box_modal_edit">
    <div class="modal_header">
        <h1>Editar Pessoa</h1>
        <x-css-close id="close_classe_modal_edit"/>
    </div>
    <div class="modal_content">
        <form id="form_edit" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="pesnome" id="edit_nome" placeholder="Nome pessoa" required />
            <input type="date" name="pesdatanascimento" id="edit_data" required />

            <select name="estado" id="edit_estado" class="input_select" required>
                <option value="">Selecione um estado</option>
                @foreach($estados as $estado)
                    <option value="{{ $estado->estcodigo }}">{{ $estado->estnome }}</option>
                @endforeach
            </select>

            <select name="cidcodigo" id="edit_cidade" class="input_select" required>
                <option value="">Selecione uma cidade</option>
            </select>

            <x-button class='btn_fullwidth'>Salvar Alterações</x-button>
        </form>
    </div>
</x-modal>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {

    // Abrir modal de cadastro
    const btnOpenModal = document.getElementById('btn_cadastrar_pessoa');
    const boxModal = document.getElementById('box_modal');
    const iconCloseModal = document.getElementById('close_classe_modal');

    btnOpenModal.addEventListener('click', (event) => {
        event.preventDefault();
        boxModal.classList.add('opened');
    });

    iconCloseModal.addEventListener('click', (event) => {
        event.preventDefault();
        boxModal.classList.remove('opened');
    });

    function abrirModalEditPessoa(codigo, nome, data, estado, cidade) {
        const rotaEditar = "{{ route('pessoas.update', ['pessoa' => 'PESSOACODIGO']) }}";
        const form = document.getElementById('form_edit');
        form.action = rotaEditar.replace('PESSOACODIGO', codigo);

        document.getElementById('edit_nome').value = nome;
        document.getElementById('edit_data').value = data;
        document.getElementById('edit_estado').value = estado;

        carregarCidades(estado, cidade, 'edit_cidade');

        document.getElementById('box_modal_edit').classList.add('opened');
    }
    window.abrirModalEditPessoa = abrirModalEditPessoa;

    document.getElementById('close_classe_modal_edit').addEventListener('click', () => {
        document.getElementById('box_modal_edit').classList.remove('opened');
    });

    // Carregar cidades no cadastro
    document.getElementById('estado_select').addEventListener('change', function() {
        const estadoId = this.value;
        carregarCidades(estadoId, null, 'cidade_select');
    });

    // Carregar cidades no modal de edição ao trocar o estado
    document.getElementById('edit_estado').addEventListener('change', function() {
        const estadoId = this.value;
        carregarCidades(estadoId, null, 'edit_cidade');
    });

    function carregarCidades(estadoId, cidadeSelecionada = null, campoSelectId) {
        const cidadeSelect = document.getElementById(campoSelectId);

        if (!estadoId) {
            cidadeSelect.innerHTML = '<option value="">Selecione uma cidade</option>';
            return;
        }

        cidadeSelect.innerHTML = '<option value="">Carregando...</option>';

        fetch(`/api/cidades/${estadoId}`)
            .then(response => response.json())
            .then(data => {
                cidadeSelect.innerHTML = '<option value="">Selecione uma cidade</option>';
                data.forEach(cidade => {
                    const option = document.createElement('option');
                    option.value = cidade.cidcodigo;
                    option.textContent = cidade.cidnome;
                    if (cidadeSelecionada && cidadeSelecionada == cidade.cidcodigo) {
                        option.selected = true;
                    }
                    cidadeSelect.appendChild(option);
                });
            });
    }
});
</script>
@endpush