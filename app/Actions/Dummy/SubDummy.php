<?php

namespace App\Actions\Dummy;

use Illuminate\Http\Request;

class SubDummy
{
    public static $action_name = "sub_dummy";
    private $request = null;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle()
    {

        return [
            'message' => 'something'
        ];
    }
}
