@extends('base')

@section('title', 'Tous nos biens')
    
@section('contenu')
    <div class="bg-light p-5 mb-5 text-center">
      <form action="" method="get" class="container d-flex gap-2">
        <input class="form-control" type="number" placeholder="Surface minimum" name="surface" value="{{ $input['surface'] ?? '' }}">
        <input class="form-control" type="number" placeholder="Nombre de pièce mim" name="rooms" value="{{ $input['rooms'] ?? '' }}">
        <input class="form-control" type="number" placeholder="Budget max" name="price" value="{{ $input['price'] ?? '' }}">
        <input class="form-control" type="text" placeholder="Mot clef" name="title" value="{{ $input['title'] ?? '' }}">
        <button class="btn btn-primary btn-sm flex-grow-0">
          Rechercher
        </button>
      </form>
    </div>
    <div class="container">
      <div class="row">
        @forelse ($properties as $property)
          <div class="col-3 mb-4">
            @include('property.card')
          </div>
        @empty 
          <div class="text-center col mb-4">
            Aucun biens ne correspond pas à vore rechercher
          </div>
        @endforelse
      </div>
    </div>

    <div class="container my-4">
      {{ $properties->links() }}
    </div>

@endsection