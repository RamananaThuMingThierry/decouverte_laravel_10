@extends('base', ['titre' => $post->exists ?  'Modifier une post':  'Créer une post'])

@section('contenu')
  <div class="container">
    <div class="row">
      <div class="col-md-8 m-auto">
        <div class="card p-3">
          <div class="card-title">
            <h1 class="text-center text-muted">
              @if($post->id)
                Modifier
              @else
                Créer                
              @endif
                une post
            </h1>
          </div>
            <form action="{{ route($post->exists ? 'post.update', ['id' => $post->id] : 'post.store') }}" method="POST">
            @csrf
            @method($post->exists ? 'PUT' : 'POST')
            <div class="form-group mt-2">
              <label for="titre">Titre</label>
              <input type="text" class="form-control" name="titre" id="titre" value="{{ old('titre', $post->titre) }}" />
              @error('titre')
                <span class="text-danger">{{ $message }}</span>    
              @enderror
            </div>
            
            <div class="form-group mt-2">
              <label for="slug">Slug</label>
              <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug', $post->slug) }}" />
              @error('slug')
                <span class="text-danger">{{ $message }}</span>    
              @enderror
            </div>
            <div class="form-group mt-2">
              <label for="contenu">Contenu</label>
              <textarea rows="4" cols="10" class="form-control" name="contenu" id="contenu">{{ old('contenu', $post->contenu) }}</textarea>
              @error('contenu')
                <span class="text-danger">{{ $message }}</span>    
              @enderror
            </div>
            <div class="form-group">
              <label for="categories_id">Catégorie</label>
              <select name="categories_id" id="categories_id" class="form-control">
                <option value="">Sélectionner une catégorie</option> 
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->titre }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group mt-2">
              <a href="{{ route('post.index') }}" class="btn btn-danger rounded-0">Retour</a>
              <button type="submit" class="btn btn-primary rounded-0">
                @if($post->id)
                  Modifier 
                @else
                  Enregistre
                @endif
              </button>
            </div>
          </form> 
        </div>
      </div>
    </div>
  </div>
@endsection