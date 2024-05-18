@extends('admin.admin')

@section('titre', 'Tous les bien')

@section('contenu')
    <div class="d-flex justify-content-between align-items-center">
      <h1 class="text-muted">@yield('titre')</h1>
      <a href="{{ route('admin.property.create') }}" class="btn btn-primary">Ajouer un bien</a>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Titre</th>
          <th>Surface</th>
          <th>Prix</th>
          <th>Ville</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($properties as $property)
            <tr>
              <td>{{ $property->title }}</td>
              <td>{{ $property->surface }} m²</td>
              <td>{{ $property->price }}</td>
              <td>{{ $property->city }}</td>
              <td>
                <div class="d-flex gap-2 justify-content-end w-100">
                  <a href="{{ route('admin.property.edit', $property) }}" class="btn btn-primary">Modifier</a>
                  <form action="{{ route('admin.property.destroy', $property)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">
                      Supprimer
                    </button>
                  </form>
                </div>
              </td>
            </tr>
        @endforeach
      </tbody>
    </table>
    {{
      $properties->links();
    }}
@endsection