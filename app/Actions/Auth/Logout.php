<?php
namespace App\Actions\Auth;

use Illuminate\Http\Request;

class Logout {
    public static $action_name = "logout";
    private $request = null;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function handle(){

        $this->request
             ->user()
             ->currentAccessToken()
             ->delete();

        return response()->json([
            'success' => 'true',
            'message' => 'Logged out successfully',
        ]);
    }
}