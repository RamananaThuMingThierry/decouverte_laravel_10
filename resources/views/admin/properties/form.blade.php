@extends('admin.admin')

@section('titre', $property->exists ? "Modifier un bien" : "Créer un bien")

@section('contenu')
  <div class="card p-3">
    <div class="card-title">
      <h1 class="text-center">@yield('titre')</h1>
    </div>
    <div class="card-body">
      <form action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="post" class="vstack gap-2">
        @csrf
        @method($property->exists ? 'PUT' : 'POST')
        <div class="row">
          @include('shared.input', ['class' => 'col', 'label' => 'Titre', 'name' => 'title', 'valeur' => $property->title])
          <div class="col row">
            @include('shared.input', ['class' => 'col', 'label' => 'Surface', 'name' => 'surface', 'valeur' => $property->surface])
            @include('shared.input', ['class' => 'col','label' => 'Prix', 'name' => 'price', 'valeur' => $property->price])
          </div>
        </div>
        @include('shared.input', ['class' => 'col','type' => 'textarea', 'label' => 'Description', 'name' => 'description', 'valeur' => $property->description])
        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Pièces', 'name' => 'rooms', 'valeur' => $property->rooms])
            @include('shared.input', ['class' => 'col', 'label' => 'Chambres', 'name' => 'bedrooms', 'valeur' => $property->bedrooms])
            @include('shared.input', ['class' => 'col', 'label' => 'Etage', 'name' => 'floor', 'valeur' => $property->floor])
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Adresse', 'name' => 'address', 'valeur' => $property->address])
            @include('shared.input', ['class' => 'col', 'label' => 'Ville', 'name' => 'city', 'valeur' => $property->city])
            @include('shared.input', ['class' => 'col', 'label' => 'Code postal', 'name' => 'postal_code', 'valeur' => $property->postal_code])
        </div>
        @include('shared.checkbox', ['label' => 'Vendu', 'name' => 'sold', 'valeur' => $property->sold])
        <div class="form-group mt-2">
          <button class="btn btn-primary">
            @if($property->exists)
              Modifier
            @else
              Créer
            @endif
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection