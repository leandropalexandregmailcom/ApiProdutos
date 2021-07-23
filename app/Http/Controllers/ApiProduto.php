<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProdutoRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateProdutoRequest;
use App\Models\HistoricoProduto;
use App\Models\Imagem;

class ApiProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Produto::with('imagem')->get();
    }

    public function store(CreateProdutoRequest $request)
    {
        $produto = Produto::create($request->all());
        HistoricoProduto::create(['id_produto' => $produto->id_produto, 'nome' => $produto->nome]);

        if($request->hasfile('imagem'))
        {
            foreach($request->file('imagem') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);
                Imagem::create(['nome' => $name, 'id_produto' => $produto->id_produto]);
                $data[] = $name;
            }
        }
    }

    public function show($id)
    {
        return Produto::findOrFail($id);
    }

    public function update(UpdateProdutoRequest $request, $id)
    {
        if($request->hasfile('imagem'))
        {
            foreach($request->file('imagem') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);
                Imagem::where(['id_produto' => $id])->delete();
                Imagem::create(['nome' => $name, 'id_produto' => $id]);
                $data[] = $name;
            }
        }

        HistoricoProduto::create(['id_produto' => $id, 'nome' => $request->nome]);
        return  Produto::where(['id_produto' => $id])->update($request);
    }

    public function destroy($id)
    {
        Imagem::where(['id_produto' => $id])->delete();
        return Produto::where(['id_produto' => $id])->delete()->historico()->create(['id_produto' => $id]);
    }
}
