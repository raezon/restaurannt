<?php

namespace App\Http\Response;

class PresenterDispatcher
{

    public $type;

    public function handle($options)
    {
        $type = config('app.presenterType');
        $instanceName = "App\\Http\\Response\\Presenter{$type}";
        $instance = new $instanceName();
        return $instance->display($options);
    }
}
