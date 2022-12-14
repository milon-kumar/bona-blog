<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontCategoryPostController extends Controller
{
    public function CategoryPost($slug , $id)
    {
        return $id;
    }
}
