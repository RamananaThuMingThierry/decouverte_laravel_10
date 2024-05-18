@extends('base', ['titre' => $post->titre])

@section('contenu')
  <div class="container">
    <div class="row">
      <div class="col-md-6 m-auto">
        <div class="card">
          <div class="card-title">
            <h1 class="text-center">{{ $post->titre }}</h1>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="">Titre</label>
              <input type="text" value="{{ $post->titre }}" disabled class="form-control rounded-0 bg-white">
            <div class="form-group">
              <label for="">Slug</label>
              <input type="text" value="{{ $post->slug }}" disabled class="form-control rounded-0 bg-white">
            <div class="form-group">
              <label for="">Contenu</label>
              <textarea disabled class="form-control rounded-0 bg-white">{{ $post->contenu }}</textarea>
            </div>
            <div class="form-group mt-2">
              <a href="{{ route('post.index') }}" class="btn btn-danger rounded-0">Retour</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection