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
            <a href="{{ route('conteudos.create') }}" class="btn btn-primary">Criar Conteudo</a>
        </div>
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>URL</th>
                    <th>Playlist</th>
                    <th>Criado em</th>
                    <th>Alterado em</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @foreach ($conteudos as $conteudo)
                        <tr>
                            <td>{{ $conteudo->title }}</td>
                            <td>{{ $conteudo->author }}</td>
                            <td>{{ $conteudo->url }}</td>
                            <td>{{$playlists->first(function($item) use($conteudo) {
                                return $item->id == $conteudo->playlist_id;
                            })->title}}</td>
                            <td>{{ date("d/m/Y H:i", strtotime($conteudo->created_at ))}}</td>
                            <td>{{ date("d/m/Y H:i", strtotime($conteudo->updated_at ))}}</td>
                            <td>
                                <a href="{{route("conteudos.edit", ["conteudo"=>$conteudo->id])}}" class="btn btn-sm btn-outline-success btn-editar">editar</a>
                                <form method="POST" action="{{route("conteudos.destroy", ["conteudo"=>$conteudo->id])}}" onsubmit="return confirm('Tem certeza que deseja excluir este registro?');">
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
            {{ $conteudos->links() }}
        </div>
    </div>
    @include("Conteudos.edit-modal", compact("playlists"))
@endsection

@push("js")
    <script>
        FormSubmit("#formConteudo");

        $(".btn-editar").click(async function (e){
            e.preventDefault()
            $("#editModal").modal('show');

            let conteudo = await $.ajax({url: $(this).attr("href")})
            conteudo = JSON.parse(conteudo);

            $("#formConteudo").attr("action", `/conteudos/${conteudo.id}`)

            for (let [key,value] of Object.entries(conteudo)){
                $(`#input-${key}`).val(value);
            }
        })
    </script>
@endpush