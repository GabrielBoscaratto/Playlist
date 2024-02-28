<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaylistRequest;
use App\Models\Playlist;
use App\Services\PlaylistService;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function __construct(public PlaylistService $playlistService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playlists = Playlist::paginate(10);

        return view("Playlists.index", compact("playlists"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Playlists.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlaylistRequest $request)
    {
        return $this->playlistService->save($request->except("_token"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $playlist = Playlist::whereId($id)->first();

        return response()->json(json_encode($playlist));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlaylistRequest $request, int $id)
    {
        return $this->playlistService->update($request->except("_token"), $id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->playlistService->delete($id);
    }
}
