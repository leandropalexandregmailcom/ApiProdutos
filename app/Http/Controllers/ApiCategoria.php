<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProdutoRequest;
use App\Http\Requests\CreateCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;

class ApiCategoria extends Controller
{
    public function index()
    {
        return Categoria::with('produto')->get();
    }

    public function store(Request $request)
    {
        return Categoria::create($request->all());
    }

    public function show($id)
    {
        return Categoria::findOrFail($id);
    }

    public function update(UpdateCategoriaRequest $request, $id)
    {
        return Categoria::where(['id_categoria' => $id])->update($request);
    }

    public function destroy($id)
    {
        return Categoria::where(['id_categoria' => $id])->delete();
    }
}
