<?php

namespace App\Http\Response;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class PresenterView  implements Presenter
{
    public function display($options)
    {

       
        return view($options['name'], [
            'data' => $options['data']
        ]);
    }
}
