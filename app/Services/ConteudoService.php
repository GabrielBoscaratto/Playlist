<?php

namespace App\Services;

use App\Models\Conteudo;
use Exception;

class ConteudoService
{
    public function save(array $data)
    {
        try {
            Conteudo::create($data);

            session()->flash('success', 'Conteudo criada com sucesso!');
            return response()->json(["url" => route("conteudos.index")]);
        } catch (Exception $e) {
            session()->flash('error', 'Ocorreu um erro interno, tente novamente mais tarde');
            return response()->json(["url" => route("conteudos.index")], 500);
        }
    }
    public function update (array $data, int $id)
    {
        try {
            Conteudo::find($id)->update($data);

            session()->flash('success', 'Conteudo atualizada com sucesso!');
            return response()->json(["url" => route("conteudos.index")]);
        } catch (Exception $e) {
            session()->flash('error', 'Ocorreu um erro interno, tente novamente mais tarde');
            return response()->json(["url" => route("conteudos.index")], 500);
        }
    }
    public function delete(int $id)
    {
        try {
            Conteudo::destroy($id);

            session()->flash('success', 'Conteudo Excluida com sucesso!');
            return redirect()->back();
        } catch (Exception $e) {
            session()->flash('error', 'Ocorreu um erro interno, tente novamente mais tarde');
            return response()->json(["url" => route("conteudos.index")], 500);
        }
    }
}
