<?php

namespace App\Actions;

use Illuminate\Http\Request;

class UploadAction
{

    public function storeFile(Request $request)
    {

        if ($request->hasFile('photo')) {

            $name = time() . "_" . $request->file('photo')->getClientOriginalName();
     
            $request->file('photo')->move(public_path('images'), $name);
            return $name;
        }

        return '';
    }
}
