<?php

namespace App\Actions\Dummy;

class Dummy
{
    public static $resource_name = "dummy";

    public function __construct()
    {
    }

    public function handle()
    {
        return match (request('action')) {
            SubDummy::$action_name => (new SubDummy(action_request()))->handle(),
        };
    }
}
