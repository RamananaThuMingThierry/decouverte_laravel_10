@extends('base')

@section('contenu')
    <div class="bg-light p-5 mb-5 text-center">
      <div class="container">
        <h1>AntaTech Solutions</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates ducimus ut ipsam, illum quis inventore a optio consequuntur ex, doloribus enim, fugiat nemo veritatis vel animi non accusamus numquam repellat.</p>
      </div>
    </div>

    <div class="container">
      <h2>Nos derniers biens</h2>
      <div class="row">
        @foreach($properties as $property)
          <div class="col">
            @include('property.card')
          </div>
        @endforeach
      </div>
    </div>
@endsection