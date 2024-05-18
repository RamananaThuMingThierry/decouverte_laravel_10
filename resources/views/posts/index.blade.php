@extends('base', ['titre' => 'Liste des posts'])

@section('contenu')
<div class="header--wrapper">
      
  <!-- Header Title -->
  <div class="header--title">
    <span>AntaTech</span>
    <h2>Solutions</h2>
  </div>

  <!-- User Info -->
  <div class="user--info">
    <img src="images/img.png" alt="Image user Profile"/>
  </div>
</div>

 <div class="card p-3">
  <div class="d-flex justify-content-between"> 
    <h3 class="main--title">AntaTech-Solutions</h3>
    <a href="{{ route('post.create') }}" class="btn btn-primary">Créer une poste</a>
   </div>
  </div>

 <!-- Tabular Wrapper -->
 <div class="tabular--wrapper">
  <h3 class="main--title">Liste des posts</h3>
  <div class="table--container">
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Titre</th>
          <th>Slug</th>
          <th>Catégories</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr>
          <td>{{ $post->id }}</td>
          <td>{{ $post->titre }}</td>
          <td>{{ $post->slug }}</td>
          <td>
            @if($post->categories_id)
              {{ $post->categorie->titre }}
            @else
              -
            @endif 
          </td>
          <td class="text-center">
            <div>
              <a href="{{ route('post.show', ['slug' => $post->slug, 'id' => $post->id]) }}"><i class="text-warning fa fa-eye"></i></a>
              &nbsp;
              &nbsp;
              &nbsp;
              <a href="{{ route('post.edit', ['id' => $post->id]) }}"><i class="fa fa-pen"></i></a>
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
      $posts->links()
    }}
   </div>
  </div>
 </div>
@endsection