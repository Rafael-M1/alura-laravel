<form action="{{ $action }}" method="POST">
    @csrf
    @if ($update)
        @method('PUT')
    @endif
    <div class="row mb-3">
        <div class="col-8">
            <label for="nome" class="form-label">Nome:</label>
            <input autofocus type="text" id="nome" name="nome" class="form-control"
                @isset($nome)
                    value="{{ $nome }}"
                @endisset
            >
        </div>
        <div class="col-2">
            <label for="seasonsQty" class="form-label">N° Temporadas:</label>
            <input type="seasonsQty" id="seasonsQty" name="seasonsQty" class="form-control"
                value="{{ old('seasonsQty') }}"
            {{-- @isset($nome)
                    value="{{ $nome }}"
                @endisset --}}
            >
        </div>
        <div class="col-2">
            <label for="episodesPerSeason" class="form-label">Episódios por Temporada:</label>
            <input type="text" id="episodesPerSeason" name="episodesPerSeason" class="form-control"
                value="{{ old('episodesPerSeason') }}"
            {{-- @isset($nome)
                    value="{{ $nome }}"
                @endisset --}}
            >
        </div>
    </div>
    <button type="submit" class="btn btn-primary">
        @if (!isset($nome))
            Adicionar
        @else
            Editar
        @endif
    </button>
</form>
