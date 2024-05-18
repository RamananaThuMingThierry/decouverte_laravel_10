@extends('base', ['titre' => $categorie->id ?  'Modifier une catégorie':  'Créer une catégorie'])

@section('contenu')
  <div class="container">
    <div class="row">
      <div class="col-md-8 m-auto">
        <div class="card p-3">
          <form action="{{ route('categorie.store') }}" method="POST">
            @csrf
            @include('categories.form')
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection