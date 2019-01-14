<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Recipes;
use App\Votes;
use Illuminate\Http\Request;
use App\Articles;

class WelcomeController extends Controller {

    public function index()  {
        return view('welcome');
    }
}
