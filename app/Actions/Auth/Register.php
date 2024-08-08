<?php
namespace App\Actions\Auth;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register {
    public static $action_name = "register";
    private $request = null;

    public function __construct(RegisterRequest $request) {
        $this->request = $request;
    }

    public function handle(){

        $user = User::create([
            'name' => $this->request->name,
            'email' => $this->request->email,
            'password' => Hash::make($this->request->password),
        ]);

        return response()->json([
            'success' => 'true',
            'message' => 'User registered successfully',
            'user' => $user
        ]);
    }
}