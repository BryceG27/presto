<x-layout title="presto.it">


    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center py-3 align-content-center">  
                @if (session('message'))
                <div class="alert alert-success">
                  Annuncio inserito, in attesa di revisione.
                </div>
                @endif
                @if (session('access.denied.revisor.only'))
                <div class="alert alert-danger">
                  Accesso non consentito
                </div>
                @endif
                <h1 class="text-center py-3">{{__('ui.welcome')}}</h1>
                <div class="card bg-dark text-white text-md-end">
                  <img src="" class="card-img-fluid" alt="" height="300px" style="opacity: 0.75">
                  <div class="card-img-overlay mt-5 pt-5 typewriter">
                    <h5 class="card-title">{{$finalText}} <i class="bi bi-front fs-2"></i> Presto!</h5>
                    <h6 class="card-text fs-3" id="homeHeader"> L'idea che cercavi a portata di click.</h6>
                  </div>
                </div>
              </div>
        </div>

        @foreach ($announcements as $announcement)
            <div class="row justify-content-center mb-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{$announcement->title}}</div>
                        <div class="card-body">
                            <p><img src="https://via.placeholder.com/300x150" alt="" class="rounded">
                            {{$announcement->body}}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <strong>Category: <a href="">{{$announcement->category->name}}</a></strong>
                            <i>{{$announcement->created_at->format('d/m/Y')}} - {{$announcement->user->name}}</i>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


</x-layout>