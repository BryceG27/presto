<x-layout title="{{$announcement->title}}">
  
  <div class="row justify-content-center mb-5 my-3">
    <div class="col-md-6 col-8">
      <div class="card my-5 border-0" style="height: 500px">
        <div class="card-header ">
          <strong><a class="text-decoration-none text-primary" href="{{route('announcement.category', [$announcement->category->name, $announcement->category->id])}}">{{$announcement->category->name}}</a></strong>
        </div>
        {{-- https://via.placeholder.com/300x150 --}}
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner text-center">
            @foreach ($announcement->images as $image)
            
            <div class="carousel-item @if($loop->first) active @endif"  data-bs-interval="10000">
              
              <img src="{{ $image->getUrl(300, 150) }}" class="rounded float-right" width="100%" alt="">
              
              
              
            </div>
            @endforeach
            
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

        
      </div>
      <div class="card-body bg-light text-center">
        <h5 class="card-title">{{$announcement->title}}</h5>
        <p class="card-text">{{$announcement->body}}</p>
        <p class="card-text text-end text-primary fs-5 me-2">{{$announcement->price}}€</p>
        <p class="card-text text-end"><small class="text-muted"> <em>- {{$announcement->user->name}} -</em> {{$announcement->created_at->format('d/m/Y')}}</small></p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group mx-auto">
            <a href="{{route('home')}} " class="btn btn-sm btn-outline-primary">Torna indietro</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</x-layout>