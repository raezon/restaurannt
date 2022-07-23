<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Ingrediants extends Component
{

    public $ingrediants=[]; // new property
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($ingrediants)
    {
        $this->ingrediants=$ingrediants;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ingrediants');
    }
}
