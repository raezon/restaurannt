<?php

namespace App\Http\Controllers;

use App\Actions\StorePanelAction;
use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index(StorePanelAction $action)
    {
        $elements = $action->getPanels();
        
        return view('dashboard', [
            'panels' => $elements
        ]);
    }
}
