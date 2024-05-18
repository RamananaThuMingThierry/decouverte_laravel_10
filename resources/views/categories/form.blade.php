<div class="form-group mt-2">
  <label for="titre">Titre</label>
  <input type="text" class="form-control" name="titre" id="titre" value="{{ old('titre', $categorie->titre) }}" />
  @error('titre')
    <span class="text-danger">{{ $message }}</span>    
  @enderror
</div>
<div class="form-group mt-2">
  <a href="{{ route('categorie.index') }}" class="btn btn-danger rounded-0">Retour</a>
  <button type="submit" class="btn btn-primary rounded-0">
    @if($categorie->id)
      Modifier 
    @else
      Enregistre
    @endif
  </button>
</div>