<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use View;

class HomeController extends Controller
{
    public function index(){
        $properties = Property::with('images')->recent()->available(true)->limit(4)->get();
        dd($properties->first()->sold);
        return View('home', compact('properties'));
    }
}
