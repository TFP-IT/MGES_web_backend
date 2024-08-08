<?php

namespace App\Actions\Auth;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Login
{
    public static $action_name = "login";
    private $request = null;

    public function __construct(LoginRequest $request)
    {
        $this->request = $request;
    }

    public function handle()
    {

        $user = User::where('email', $this->request->email)->first();

        if (!$user || !Hash::check($this->request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'incorrect credentials'
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Successfully Logged In',
            'data' => [
                'access_token' => $token,
                'token_type' => 'Bearer'
            ]
        ]);
    }
}
