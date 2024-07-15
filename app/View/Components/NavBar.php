<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavBar extends Component
{

    public $categories; // Public property to hold categories

    public function __construct()
    {
        $this->categories = Category::all(); // Fetch all categories
    }


    public function render()
    {


        return view('components.nav-bar');
    }
}
