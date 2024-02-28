@extends('app')
@section('content')
    <h1>Criar Conteudo</h1>

    <form id="formConteudo" method="POST" action="{{ route('conteudos.store') }}">
        @csrf
        @include("Conteudos.form", compact("playlists"))
        <div class="row">
            <div class="col-12 mt-3">
                <a href="{{route("conteudos.index")}}" class="btn btn-light me-2">Voltar</a>
                <button type="submit" class="btn btn-success">Criar</button>
            </div>
        </div>
    </form>
@endsection

@push('js')
    <script>
            FormSubmit("#formConteudo")
    </script>
@endpush
