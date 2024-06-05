@if($property->images)
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    @if($property->images)
      @foreach($property->images as $key => $image)
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="@if($key === 0) active @endif"></button>
      @endforeach
    @endif
  </div>
  <div class="carousel-inner">
    @if($property->images)
      @foreach($property->images as $key => $image)
        <div class="carousel-item @if($key === 0) active @endif">
          <img src="{{ asset('storage/' . $image->image_path) }}" class="d-block w-100" alt="{{ $property->title }}">
        </div>
      @endforeach
    @endif
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
@else
  <img class="card-img-top" src="..." alt="Card image cap">
@endif