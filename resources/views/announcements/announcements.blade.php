<x-layout title="Annunci"> 
      <div class="container">
            <div class="row justify-content-center py-3">
                  <div class="col-12 text-center">
                        <h1>{{$category->name}}</h1>
                  </div>
            </div>
            <div class="row">
                  @foreach ($announcements as $announcement)
                  <div class="col-md-8 offset-md-2">
                        <div class="card mb-3">
                              <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                          @foreach ($announcement->images as $image)
                                          <div class="carousel-item active">
                                                <img src="" class="card-img-top" alt="...">
                                          </div>
                                          @endforeach
                                    </div>
                              </div>
                              <div class="card-body">
                                    <h5 class="card-title">{{$announcement->title}}</h5>
                                    <p class="card-text">{{$announcement->body}}.</p>
                                    <p class="card-text text-end text-primary fs-5 me-2">{{$announcement->price}}€</p>
                                    
                                    <p class="card-text text-muted"><em>- {{$announcement->user->name}} -</em> at {{$announcement->created_at->format('h:m')}} {{$announcement->created_at->format('d/m/Y')}}</small></p>
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
                              </div>
                        </div>
                  </div>
                  @endforeach
            </div>
            
            <div class="row justify-content-center">
                  <div class="col-md-8">
                        {{$announcements->links()}}
                  </div>
            </div>
      </div>
</x-layout>

