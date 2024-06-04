<?php

namespace App\Http\Controllers;

use View;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Requests\SearchPropertyRequest;
use Redirect;

class PropertyController extends Controller
{
    public function index(SearchPropertyRequest $request) {
        $query = Property::query();
    
        $validated = $request->validated();
    
        if(isset($validated['price'])) {
            $query->where('price', '<=', $validated['price']);
        }
        
        if(isset($validated['surface'])) {
            $query->where('surface', '>=', $validated['surface']);
        }
    
        if(isset($validated['rooms'])) {
            $query->where('rooms', '>=', $validated['rooms']);
        }
    
        if(isset($validated['title'])) {
            $query->where('title', 'like', "%{$validated['title']}%");
        }
    
        return view('property.index', [
            'properties' => $query->paginate(6),
            'input' => $validated
        ]);
    }
    

    public function show(string $slug, Property $property){
        $expectedSlug = $property->getSlug();

        if($slug !== $expectedSlug){
            return Redirect()->route('property.show', ['slug', $expectedSlug, 'property' => $property]);
        }

        return view('property.show', [
            'propery' => $property
        ]);
    }
}
