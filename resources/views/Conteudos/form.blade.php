<div class="row">
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label>Título</label>
            <input id="input-title" type="text" name="title" class="form-control">
            <div class="invalid-feedback" id="invalid-title"></div>
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label>Playlist</label>
            <select  class="form-select" name="playlist_id" id="input-playlist_id">
                <option value="" selected>Selecione...</option>
                @foreach ($playlists as $playlist)
                    <option value="{{$playlist->id}}">{{$playlist->title}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback" id="invalid-playlist_id"></div>
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label>Autor</label>
            <input id="input-author" type="text" name="author" class="form-control">
            <div class="invalid-feedback" id="invalid-author"></div>
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label>Url</label>
            <input id="input-url" type="text" name="url" class="form-control">
            <div class="invalid-feedback" id="invalid-url"></div>
        </div>
    </div>


</div>
