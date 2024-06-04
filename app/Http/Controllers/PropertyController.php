<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use View;

class PropertyController extends Controller
{
    public function index(){
        $properties = Property::paginate();
        return View('property.index', compact('properties'));
    }

    public function show(){

    }
}
