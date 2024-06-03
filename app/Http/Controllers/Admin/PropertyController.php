<?php

namespace App\Http\Controllers\Admin;

use View;
use Redirect;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('admin.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate(1)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $property = new Property();
        $property->fill([
            'surface' => 40,
            'rooms' => 3,
            'bedrooms' => 1,
            'floor' => 0,
            'city' => 'Antalaha',
            'postal_code' => 206,
            'sold' => false
        ]);
        return View('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        $property = Property::create($request->validated());
        $property->options()->sync($request->validated('options'));
        return Redirect()->route('admin.property.index')->with('success', 'Le bien a été créé');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        return View('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(PropertyRequest $request, Property $property)
    {
        if($property->exists){
            $property->update($request->validated());
            $property->options()->sync($request->validated('options'));
            return redirect()->route('admin.property.index')->with('success', 'Le bien a été modifié');
        }else{
            return redirect()->route('admin.property.index')->with('warning', 'Le bien n\'existe pas dans la base de données');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        if($property->exists){
            $property->delete();
            return redirect()->route('admin.property.index')->with('success', 'Le bien a été supprimé');
        }else{
            return redirect()->route('admin.property.index')->with('warning', 'Le bien n\'existe pas dans la base de données');
        }
    }
}
