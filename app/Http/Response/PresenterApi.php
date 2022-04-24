<?php

namespace App\Http\Response;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class PresenterApi  implements Presenter 
{
    public function display($options)
    {
     
        return response()->json([
            'data' => $options['data']
        ]);
    }
}
