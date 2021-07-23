<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    private $model;

    function __construct(User $user)
    {
        $this->model = $user;
    }

    public function show()
    {
        return Auth::user();
    }

    public function create(CreateUserRequest $request)
    {
        return $this->model->create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
        ]);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        return $this->model->where(['id' => $id])->update($request->all());
    }

    public function delete($id)
    {
        $this->model->where($id)->delete();
    }
}

