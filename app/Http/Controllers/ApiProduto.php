<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;

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

    public function store(Request $request)
    {
        return Produto::create($request->all());
    }

    public function show($id)
    {
        return Produto::findOrFail($id);
    }


    public function update(UpdateProdutoRequest $request, $id)
    {
        return Produto::where(['id_produto' => $id])->update($request);
    }

    public function destroy($id)
    {
        return Produto::where(['id_produto' => $id])->delete();
    }
}
