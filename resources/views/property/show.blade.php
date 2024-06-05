@extends('base')

@section('title', $property->title)

@section('contenu')
    <div class="container mt-5">
      <div class="row">
        <div class="col-7">
          @include('property.slide')
        </div>
        <div class="col-5">
          <h1>{{ $property->title }}</h1>
          <h2>{{ $property->rooms }} pièces - {{ $property->surface }} m²</h2>
  
          <div class="text-primary fw-bold" style="font-size:4rem">
            {{ number_format($property->price, thousands_separator: ' ') }} €
          </div>
  
          <hr>
  
          <div class="mt-4">
            <h4>Intéressé par ce bien ?</h4>
  
            @include('shared.flash')
  
            <form action="{{ route('property.contact', ['property' => $property]) }}" method="post" class="vstack gap-3">
              @csrf
              @method('POST')
              <div class="row">
                @include('shared.input', ['class' => 'col', 'name' => 'firstname', 'label' => 'Prénom', 'valeur' => 'RAMANANA Thu Ming'])
                @include('shared.input', ['class' => 'col', 'name' => 'lastname', 'label' => 'Nom', 'valeur' => 'Thierry'])
              </div>
              <div class="row">
                @include('shared.input', ['type' => 'number', 'class' => 'col', 'name' => 'phone', 'label' => 'Téléphone', 'valeur' => '0327563770'])
                @include('shared.input', ['type' => 'email', 'class' => 'col', 'name' => 'email', 'label' => 'Email', 'valeur' => 'ramananathumingthierry@gmail.com'])
              </div>
              @include('shared.input', ['type' => 'textarea', 'class' => 'col', 'name' => 'message', 'label' => 'Votre message', 'valeur' => 'Mon petit message'])
              <button type="submit" class="btn btn-primary mt-2">
                Nous contacter
              </button>
            </form>
          </div>
        </div>
      </div>
      <div class="mt-4">
        <p>{!! nl2br($property->description) !!}</p>
        <div class="row">
          <div class="col-8">
            <h2>Caractéristique</h2>
            <table class="table table-striped">
              <tr>
                <td>Surface habitable</td>
                <td>{{ $property->surface }}</td>
              </tr>
              <tr>
                <td>Pièces</td>
                <td>{{ $property->rooms }}</td>
              </tr>
              <tr>
                <td>Chambres</td>
                <td>{{ $property->bedrooms }}</td>
              </tr>
              <tr>
                <td>Etage</td>
                <td>{{ $property->floor?: 'Rez de chaussé' }}</td>
              </tr>
              <tr>
                <td>Localistation</td>
                <td>
                  {{ $property->address }} <br>
                  {{ $property->city }} - {{ $property->postal_code }}
                </td>
              </tr>
            </table>
          </div>

          <div class="col-4">
            <h2>Spécificités</h2>
            <ul class="list-group">
              @foreach ($property->options as $option)
                  <li class="list-group-item">{{ $option->name }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
@endsection