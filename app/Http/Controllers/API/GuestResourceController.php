<?php

namespace App\Http\Controllers\API;

use App\Actions\Auth\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceRequest;
use Illuminate\Http\Request;

class GuestResourceController extends Controller
{
    public function __invoke(ResourceRequest $request)
    {
        
        return match ($request->resource) {
            Auth::$resource_name => (new Auth())->handle(),
            default => [
                'success' => false,
                'message' => 'Something went wrong!'
            ],
        };
    }
}
