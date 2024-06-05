<?php

namespace App\Http\Controllers\Admin;

use View;
use Redirect;
use App\Models\Option;
use App\Models\Picture;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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
            'properties' => Property::orderBy('created_at', 'desc')->paginate(5)
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
            'title' => 'Spark 10 Pro',
            'description' => 'Mon premier teste',
            'surface' => 40,
            'rooms' => 3,
            'bedrooms' => 1,
            'floor' => 2,
            'city' => 'Antalaha',
            'address' => 'VT 29 RAI bis Ampahateza',
            'price' => '100000',
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
        // Validation des données de la requête
        $validatedData = $request->validated();
    
        // Création de la propriété
        $property = Property::create($validatedData);
    
        // Assurez-vous que 'options' est un tableau
        if (isset($validatedData['options']) && is_array($validatedData['options'])) {
            // Validation et transformation des options en entier
            $options = array_map('intval', $validatedData['options']);
    
            // Synchronisation des options avec la propriété
            $property->options()->sync($options);
        } else {
            // Gérer l'erreur ou les cas où 'options' n'est pas un tableau
            return Redirect()->back()->withErrors(['options' => 'Les options doivent être un tableau d\'entiers.']);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if (is_array($image)) {
                    foreach ($image as $img) {
                        $path = $img->store('images', 'public');
                        Picture::create([
                            'property_id' => $property->id,
                            'image_path' => $path
                        ]);
                    }
                } else {
                    $path = $image->store('images', 'public');
                    Picture::create([
                        'property_id' => $property->id,
                        'image_path' => $path
                    ]);
                }
            }
        }
    
        // Redirection avec message de succès
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

            // Validation des données de la requête
            $validatedData = $request->validated();

            // Modifier de la propriété
            $property->update($validatedData);

            // Validation et transformation des options en entier
            $options = array_map('intval', $validatedData['options']);

            // Synchronisation des options avec la propriété
            $property->options()->sync($options);

              // Suppression des images sélectionnées
            if (isset($validatedData['delete_images'])) {
                foreach ($validatedData['delete_images'] as $imageId) {
                    $image = Picture::find($imageId);
                    if ($image) {
                        // Supprimer le fichier physique de l'image
                        Storage::disk('public')->delete($image->image_path);
                        // Supprimer l'entrée de la base de données
                        $image->delete();
                    }
                }
            }

            // Ajout des nouvelles images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('images', 'public');
                    Picture::create([
                        'property_id' => $property->id,
                        'image_path' => $path
                    ]);
                }
            }
            
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
