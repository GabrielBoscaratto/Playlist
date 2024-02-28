@extends('app')
@section('content')
    <h1>Criar Playlist</h1>

    <form id="formPlaylist" method="POST" action="{{ route('playlists.store') }}">
        @csrf
        @include("Playlists.form")
        <div class="row">
            <div class="col-12 mt-3">
                <a href="{{route("playlists.index")}}" class="btn btn-light me-2">Voltar</a>
                <button type="submit" class="btn btn-success">Criar</button>
            </div>
        </div>
    </form>
@endsection

@push('js')
    <script>
            FormSubmit("#formPlaylist")
    </script>
@endpush
