<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConteudoRequest;
use App\Models\Conteudo;
use App\Models\Playlist;
use App\Services\ConteudoService;
use Illuminate\Http\Request;

class ConteudoController extends Controller
{
    public function __construct(public ConteudoService $conteudoService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conteudos = Conteudo::paginate(10);
        
        $playlists = Playlist::all();
       
        return view("Conteudos.index", compact("conteudos", "playlists"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $playlists = Playlist::all();
        return view("Conteudos.create", compact("playlists"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConteudoRequest $request)
    {
        return $this->conteudoService->save($request->except("_token"));
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
        $conteudo = Conteudo::whereId($id)->first();

        return response()->json(json_encode($conteudo));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConteudoRequest $request, int $id)
    {
        return $this->conteudoService->update($request->except("_token"), $id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->conteudoService->delete($id);
    }
}
