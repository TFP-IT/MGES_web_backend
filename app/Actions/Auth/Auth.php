<?php
namespace App\Actions\Auth;

use App\Http\Requests\LoginRequest;

class Auth {
    public static $resource_name = "auth";

    public function __construct()
    {

    }

    public function handle()
    {
        return match (request('action')) {
            Login::$action_name => (new Login(action_request()))->handle(),
            Register::$action_name => (new Register(action_request()))->handle(),
            Logout::$action_name => (new Logout(action_request()))->handle()
        };
    }
}