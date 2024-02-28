@extends('app')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="row mt-3">
        <div class="col-12">
            <a href="{{ route('playlists.create') }}" class="btn btn-primary">Criar Playlist</a>
        </div>
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Descrição</th>
                    <th>Criado em</th>
                    <th>Alterado em</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @foreach ($playlists as $playlist)
                        <tr>
                            <td>{{ $playlist->title }}</td>
                            <td>{{ $playlist->author }}</td>
                            <td>{{ $playlist->description }}</td>
                            <td>{{ date('d/m/Y H:i', strtotime($playlist->created_at)) }}</td>
                            <td>{{ date('d/m/Y H:i', strtotime($playlist->updated_at)) }}</td>
                            <td>
                                <a href="{{ route('playlists.edit', ['playlist' => $playlist->id]) }}"
                                    class="btn btn-sm btn-outline-success btn-editar">editar</a>
                                <form method="POST" action="{{ route('playlists.destroy', ['playlist' => $playlist->id]) }}"
                                    onsubmit="return confirm('Tem certeza que deseja excluir este registro?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-12">
            {{ $playlists->links() }}
        </div>
    </div>
    @include('Playlists.edit-modal')
@endsection

@push('js')
    <script>
        FormSubmit("#formPlaylist");

        $(".btn-editar").click(async function(e) {
            e.preventDefault()
            $("#editModal").modal('show');

            let playlist = await $.ajax({
                url: $(this).attr("href")
            })
            playlist = JSON.parse(playlist);

            $("#formPlaylist").attr("action", `/playlists/${playlist.id}`)

            for (let [key, value] of Object.entries(playlist)) {
                $(`#input-${key}`).val(value);
            }
        })
    </script>
@endpush
