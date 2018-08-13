<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UserRequest;
use App\Models\User;
use Cache;

class UsersController extends Controller
{
    public function store(UserRequest $request)
    {
        $verification_data = Cache::get($request->verification_key);

        if (!$verification_data) {
            return $this->response->error('验证码失效',422);
        }

        if (!hash_equals($verification_data['code'],$request->verification_code)) {
            return $this->response->errorUnauthorized('验证码错误');
        }

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => bcrypt($request->password)
        ]);

        // 清楚验证码缓存
        Cache::forget($request->verification_key);

        return $this->response->created();
    }
}
