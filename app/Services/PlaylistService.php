<?php

namespace App\Services;

use App\Models\Playlist;
use Exception;

class PlaylistService
{
    public function save(array $data)
    {
        try {
            Playlist::create($data);

            session()->flash('success', 'Playlist criada com sucesso!');
            return response()->json(["url" => route("playlists.index")]);
        } catch (Exception $e) {
            session()->flash('error', 'Ocorreu um erro interno, tente novamente mais tarde');
            return response()->json(["url" => route("playlists.index")], 500);
        }
    }
    public function update (array $data, int $id)
    {
        try {
            Playlist::find($id)->update($data);

            session()->flash('success', 'Playlist atualizada com sucesso!');
            return response()->json(["url" => route("playlists.index")]);
        } catch (Exception $e) {
            session()->flash('error', 'Ocorreu um erro interno, tente novamente mais tarde');
            return response()->json(["url" => route("playlists.index")], 500);
        }
    }
    public function delete(int $id)
    {
        try {
            Playlist::destroy($id);

            session()->flash('success', 'Playlist Excluida com sucesso!');
            return redirect()->back();
        } catch (Exception $e) {
            session()->flash('error', 'Ocorreu um erro interno, tente novamente mais tarde');
            return response()->json(["url" => route("playlists.index")], 500);
        }
    }
}
