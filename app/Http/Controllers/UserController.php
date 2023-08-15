<?php

namespace App\Http\Controllers;

use App\Helpers\JsonResponseHelper;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['store']]);
    }

    public function store(UserRegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        if ($user) {
            return JsonResponseHelper::respondSuccess([
                "addedUser" => [
                    "id" => $user->id,
                    "email" => $user->email
                ]
            ], 201);
        } else {
            return JsonResponseHelper::respondFail("user gagal ditambahkan", 400);
        }
    }
}
