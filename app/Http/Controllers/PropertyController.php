<?php

namespace App\Http\Controllers;

use View;
use Redirect;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Mail\PropertyContactMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SearchPropertyRequest;
use App\Http\Requests\ContactPropertyRequest;

class PropertyController extends Controller
{
    public function index(SearchPropertyRequest $request) {
        $query = Property::query()->orderBy('created_at', 'desc');
    
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

        $property->load('images');
        return view('property.show', [
            'property' => $property
        ]);
    }

    public function contact(Property $property, ContactPropertyRequest $request){
        Mail::send(new PropertyContactMail($property, $request->validated()));
        return back()->with('success', 'Votre demande de contact a bien été envoyé');
    }
}
