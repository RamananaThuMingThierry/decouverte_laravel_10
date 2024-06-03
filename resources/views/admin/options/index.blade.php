@extends('admin.admin')

@section('titre', 'Tous les options')

@section('contenu')
    <div class="d-flex justify-content-between align-items-center">
      <h1 class="text-muted">@yield('titre')</h1>
      <a href="{{ route('admin.option.create') }}" class="btn btn-primary">Ajouer une option</a>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Identifiant</th>
          <th>Nom</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($options as $option)
            <tr>
              <td>{{ $option->id }}</td>
              <td>{{ $option->name }}</td>
              <td>
                <div class="d-flex gap-2 justify-content-end w-100">
                  <a href="{{ route('admin.option.edit', $option) }}" class="btn btn-primary">Modifier</a>
                  <form action="{{ route('admin.option.destroy', $option)}}" method="POST">
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
      $options->links();
    }}
@endsection