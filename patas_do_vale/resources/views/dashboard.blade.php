@extends('layouts.app')

@section('content')
<section class="dash_pg">
    <div class="dash_header">
        <x-button class='btn_login' routePage='#' id="btn_cadastrar_animal">
            Cadastrar animal
            <x-fluentui-animal-dog-24-o />
        </x-button>
    </div>

    <div class="tabs_menu">
        <a href="{{ route('pessoas.index') }}" class="{{ request()->is('dashboard/pessoas*') ? 'active' : '' }}">Pessoas</a>
        <a href="{{ route('adocoes.index') }}" class="active">Adoções</a>
    </div>

    <form method="GET" class="filtro_animais" style="margin-bottom: 20px;">
        <label for="adotado">Filtrar:</label>
        <select name="adotado" id="adotado" onchange="this.form.submit()">
            <option value="todos" {{ $filtro == 'todos' ? 'selected' : '' }}>Todos</option>
            <option value="adotados" {{ $filtro == 'adotados' ? 'selected' : '' }}>Apenas Adotados</option>
            <option value="nao_adotados" {{ $filtro == 'nao_adotados' ? 'selected' : '' }}>Apenas Não Adotados</option>
        </select>
    </form>

    {{-- Listagem de Animais --}}
    <div class="table_listagem">
        <table class="tables_list">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Peso (kg)</th>
                    <th>Porte</th>
                    <th>Espécie</th>
                    <th>Adotado?</th> 
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($animais as $animal)
                    <tr>
                        <td>{{ $animal->anipelido }}</td>
                        <td>{{ $animal->anipeso }}</td>
                        <td>
                            @if($animal->aniporte == 1) Pequeno
                            @elseif($animal->aniporte == 2) Médio
                            @else Grande
                            @endif
                        </td>
                        <td>{{ $animal->aniespecie }}</td>
                        <td>                            
                            @if(in_array($animal->anicodigo, $animaisAdotados))
                                <span style="color: #4caf50; font-weight:bold;">Sim</span>
                            @else
                                <span style="color: #f44336; font-weight:bold;">Não</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('animais.destroy', $animal->anicodigo) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn_login">Excluir</button>                                
                            </form>

                            <button class="btn_login" 
                                onclick="abrirModalEdit({{ $animal->anicodigo }}, 
                                    '{{ $animal->anipelido }}', 
                                    '{{ $animal->anipeso }}', 
                                    '{{ $animal->aniporte }}', 
                                    '{{ $animal->aniespecie }}')">
                                Editar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

{{-- Modal Cadastrar Animal --}}
<x-modal id="box_modal">
    <div class="modal_header">
        <h1>Cadastrar animal</h1>
        <x-css-close id="close_classe_modal"/>
    </div>

    <div class="modal_content">
        <form action="{{ route('animais.store') }}" method="post">
            @csrf

            <input type="text" name="aninome" placeholder="Nome animal" value="{{ old('aninome') }}" />
            <input type="number" step="0.01" name="anipeso" placeholder="Peso em kg" />

            <select name="aniespecie" class="dropdown_especie">
                <option value="">Selecione uma espécie</option>
                @foreach($especies as $especie)
                    <option value="{{ $especie->espcodigo }}">{{ $especie->espnome }}</option>
                @endforeach
            </select>

            <select name="aniporte">
                <option value="1">Pequeno</option>
                <option value="2">Médio</option>
                <option value="3">Grande</option>
            </select>

            <x-button class='btn_fullwidth' routePage=''>Cadastrar animal</x-button> 
        </form>
    </div>
</x-modal>

{{-- Modal para editar--}}
<x-modal id="box_modal_edit">
    <div class="modal_header">
        <h1>Editar Animal</h1>
        <x-css-close id="close_classe_modal_edit"/>
    </div>
    <div class="modal_content">
        <form id="form_edit" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="aninome" id="edit_nome" placeholder="Nome animal" />
            <input type="number" step="0.01" name="anipeso" id="edit_peso" placeholder="Peso em kg" />

            <select name="aniporte" id="edit_porte">
                <option value="1">Pequeno</option>
                <option value="2">Médio</option>
                <option value="3">Grande</option>
            </select>

            <select name="aniespecie" id="edit_especie" class="dropdown_especie">
                @foreach($especies as $especie)
                    <option value="{{ $especie->espcodigo }}">{{ $especie->espnome }}</option>
                @endforeach
            </select>

            <x-button class='btn_fullwidth'>Salvar Alterações</x-button>
        </form>
    </div>
</x-modal>


@endsection

@push('scripts')
<script>
    function abrirModalEdit(codigo, nome, peso, porte, especie) {
        const rotaEditar = "{{ route('animais.update', ['id' => 'ANICODIGO']) }}";
        const form = document.getElementById('form_edit');
        form.action = rotaEditar.replace('ANICODIGO', codigo);

        document.getElementById('edit_nome').value = nome;
        document.getElementById('edit_peso').value = peso;
        document.getElementById('edit_porte').value = porte;
        document.getElementById('edit_especie').value = especie;

        document.getElementById('box_modal_edit').classList.add('opened');
    }

    const btnOpenModal = document.getElementById('btn_cadastrar_animal');
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

    document.getElementById('close_classe_modal_edit').addEventListener('click', () => {
    document.getElementById('box_modal_edit').classList.remove('opened');
});

</script>
@endpush
