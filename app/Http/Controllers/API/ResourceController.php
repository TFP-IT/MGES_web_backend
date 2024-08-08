<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Auth\Auth;
use App\Http\Requests\ResourceRequest;

class ResourceController extends Controller
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
