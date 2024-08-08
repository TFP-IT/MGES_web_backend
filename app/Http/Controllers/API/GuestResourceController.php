<?php

namespace App\Http\Controllers\API;

use App\Actions\Auth\Auth;
use App\Actions\Dummy\Dummy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceRequest;

class GuestResourceController extends Controller
{
    public function __invoke(ResourceRequest $request)
    {
        
        return match ($request->resource) {
            Auth::$resource_name => (new Auth())->handle(),
            Dummy::$resource_name => (new Dummy())->handle(),
            default => [
                'success' => false,
                'message' => 'Something went wrong!'
            ],
        };
    }
}
