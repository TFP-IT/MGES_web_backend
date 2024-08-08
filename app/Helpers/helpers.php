<?php

if(!function_exists('action_request')){
    function action_request(){
        $action = request('action');
        $request =  "\App\Http\Requests\\".ucfirst($action)."Request";
        if(!class_exists($request)){
            return request();
        }
        return new $request(request()->all());
    }
}