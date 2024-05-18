@extends('base', ['titre' => 'Liste des Catégories'])

@section('contenu')
<div class="header--wrapper">
      
  <!-- Header Title -->
  <div class="header--title">
    <span>AntaTech</span>
    <h2>Solutions</h2>
  </div>

  <!-- User Info -->
  <div class="user--info">
    <div class="search--box">
      <i class="fa-solid fa-search"></i>
      <input type="text" placeholder="Search" />
    </div>
    <img src="images/img.png" alt="Image user Profile"/>
  </div>
</div>

 <div class="card p-3">
  <div class="d-flex justify-content-between"> 
    <h3 class="main--title">Today's data</h3>
    <a href="{{ route('categorie.create') }}" class="btn btn-primary">Créer un categorie</a>
   </div>
  </div>

 <!-- Tabular Wrapper -->
 <div class="tabular--wrapper">
  <h3 class="main--title">Liste des catégories</h3>
  <div class="table--container">
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Titre</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $categorie)
        <tr>
          <td>{{ $categorie->id }}</td>
          <td>{{ $categorie->titre }}</td>
          <td class="text-center">
            <div>
              <a href="{{ route('categorie.edit', ['id' => $categorie->id]) }}"><i class="fa fa-pen"></i></a>
              &nbsp;
              &nbsp;
              &nbsp;
              &nbsp;
              &nbsp;
            <i class="fa fa-remove icon-remove"></i>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
   <div class="d-flex justify-content-center mt-3">
    {{
      $categories->links()
    }}
   </div>
  </div>
 </div>
@endsection