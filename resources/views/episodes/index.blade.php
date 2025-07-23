<x-layout title="Episódios" :mensagem-sucesso="$mensagemSucesso">
    <form action="{{ route('episodes.update', $season) }}" method="post">
        @csrf
        <ul class="list-group">
            @foreach ($season->episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Temporada {{ $episode->number }}
                    <input type="checkbox" name="episodes[]" value="{{ $episode->id }}"
                        @if ($episode->watched === 1) checked @endif>
                </li>
            @endforeach
        </ul>
        <button class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>
</x-layout>
