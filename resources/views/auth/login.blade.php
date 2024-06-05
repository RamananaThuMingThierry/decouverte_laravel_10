@extends('base')

@section('title', 'Se connecter')

@section('contenu')
    <div class="mt-4 container">
      <h1>@yield('title')</h1>

      @include('shared.flash')

      <form action="{{ route('dologin') }}" method="POST" class="vstack gap-2">
        @csrf
        @method('POST')
        @include('shared.input', ['type' => 'email', 'class' => 'col', 'name' => 'email', 'label' => 'Email'])
        @include('shared.input', ['type' => 'password', 'class' => 'col', 'name' => 'password', 'label' => 'Mot de passe'])
        <div>
          <button class="btn btn-primary" type="submit">Se connecter</button>
        </div>
      </form>
    </div>
@endsection