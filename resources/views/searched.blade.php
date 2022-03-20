<x-layout title="Risultati per {{$q}}"> 
    
    <div class="container">
        <div class="row py-3">
            <div class="col-10 col-md-8 offset-1 offset-md-2 text-center">
                <h1>I risultati di ricerca per: "{{$q}}"</h1>
            </div>
        </div>
        @foreach ($research as $announcement)
        <div class="row justify-content-center mb-5">
            <div class="col-md-6 col-10">
                <div class="card mb-3">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                          <div class="carousel-inner">
                                @foreach ($announcement->images as $image)
                                <div class="carousel-item active">
                                    <img src="https://via.placeholder.com/300x150" alt="" class="card-img-top">
                                </div>
                                @endforeach
                          </div>
                    </div>
                    <div class="card-body">
                          <h5 class="card-title">{{$announcement->title}}</h5>
                          <p class="card-text">{{$announcement->body}}</p>
                          <div class="btn-group pb-3">
                            <a href="{{route('announcement.detail', compact('announcement'))}} " class="btn btn-sm btn-outline-primary">Vai al Dettaglio
                            </a>
                            @auth
                            @if (Auth::user()->is_revisor)
                            <form action="{{route('revisor.back', $announcement->id)}}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-sm btn-outline-danger">Edit</button>
                            </form>
                            @endif
                            @endauth
                          </div>
                          <p class="card-text text-end text-primary fs-5 me-2">{{$announcement->price}}€</p>
                          <p class="card-text text-muted"><em>- {{$announcement->user->name}} -</em> at {{$announcement->created_at->format('h:m')}} {{$announcement->created_at->format('d/m/Y')}}</small></p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-layout>