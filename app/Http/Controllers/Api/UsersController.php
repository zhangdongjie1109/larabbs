<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UsersController extends Controller
{
    public function store(UserRequest $request)
    {
        $verifyData = Cache::get($request->verification_key);

        if (!$verifyData){
            abort(403,'验证码已失效');
        }

        if (!hash_equals($verifyData['code'], $request->verification_code)){
            // 返回401
            throw new AuthenticationException('验证码错误');
        }

        $user = User::query()->create([
            'name'  => $request->name,
            'phone'  => $verifyData['phone'],
            'password'  => $request->password,
        ]);

        // 清楚验证码缓存
        Cache::forget($request->verification_key);

        return (new UserResource($user))->showSensitiveFields();
    }

    public function list()
    {
        //dd(User::all());
        //return UserResource::collection(User::all());
        $user = User::query()->create([
            'name'  => 'ccc',
            'phone'  => '12345678912',
            'password'  => '123qwe',
        ]);
        //dd($user);

        return new UserResource($user);
    }

    public function show(User $user, Request $request)
    {
        return new UserResource($user);
    }

    public function me(Request $request)
    {
        return (new UserResource($request->user()))->showSensitiveFields();
    }
}
