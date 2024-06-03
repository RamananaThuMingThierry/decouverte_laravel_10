@extends('admin.admin')

@section('titre', $option->exists ? "Modifier une option" : "Créer une option")

@section('contenu')
  <div class="card p-3">
    <div class="card-title">
      <h1 class="text-center">@yield('titre')</h1>
    </div>
    <div class="card-body">
      <form action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}" method="post" class="vstack gap-2">
        @csrf
        @method($option->exists ? 'PUT' : 'POST')
       
        @include('shared.input', ['class' => 'col','label' => 'Nom', 'name' => 'name', 'valeur' => $option->name])
          
        <div class="form-group mt-2">
          <button class="btn btn-primary">
            @if($option->exists)
              Modifier
            @else
              Créer
            @endif
          </button>
        </div>
        </div>
      </form>
    </div>
  </div>
@endsection