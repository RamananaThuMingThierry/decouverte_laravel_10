@extends('base')

@section('title', 'Tous nos biens')
    
@section('contenu')
    <div class="bg-light p-5 mb-5 text-center">
      <form action="" method="get" class="container d-flex gap-2">
        @include('shared.input', ['type' => 'number', 'placeholder' => 'Budget Max', 'name' => 'price', 'valeur' => ])
      </form>
    </div>
    <div class="container">
      <div class="row">
        @foreach ($properties as $property)
          <div class="col-3 mb-4">
            @include('property.card')
          </div>
        @endforeach
      </div>
    </div>

    <div class="container my-4">
      {{ $properties->links() }}
    </div>
@endsection