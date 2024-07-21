<?php

namespace Laracore\LaravelAlgolia\Http\Controllers;
 
use Illuminate\Routing\Controller;
 
class AlgoliaController extends Controller
{
 
    public function index()
    {
        return view('laracore-algolia::index');
    }
 
}