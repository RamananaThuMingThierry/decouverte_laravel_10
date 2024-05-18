<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorieRequest;
use App\Models\Categories;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriesController extends Controller
{
    public function index(){

        $categories = Categories::paginate(1);
        return View('categories.index', compact('categories'));
    }

    public function create(){
        $categorie = new Categories(); 
        return View('categories.create', compact('categorie'));
    }

    public function store(CategorieRequest $request){
       $titre = $request->titre;
       $description = $request->description;

       $categories = Categories::create([
        'titre' => $titre,
        'description' => $description
       ]);

       return redirect()->route('categorie.index', compact('categories'))->with('message', 'Enregistrement avec succès');
    }

    public function edit($id){
        $categories_existe = Categories::where('id', $id)->exists();
        if($categories_existe){
            $categorie = Categories::where('id', $id)->first();
            return View('categories.form', compact('categorie'));
        }else{
            return back()->with('warning', 'Cette catégorie n\'existe pas dans la base de données!');
        }
    }
}
