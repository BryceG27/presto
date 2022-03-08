<x-layout title="Home - Revisor Only">
    
    @if ($announcement)
        
    {{-- Parte descrittiva dell'articolo --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> Annuncio #{{$announcement->id}}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <h3>Utente</h3>
                            </div>
                            <div class="col-md-10">
                                #{{$announcement->user->id}},
                                {{$announcement->user->name}},
                                {{$announcement->user->email}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <h3> Titolo </h3>
                            </div>
                            <div class="col-md-10">
                                {{$announcement->title}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <h3> Descrizione </h3>
                            </div>
                            <div class="col-md-10">
                                {{$announcement->body}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h3> Prezzo </h3>
                            </div>
                            <div class="col-md-10">
                                {{$announcement->price}}€
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h3> Immagini </h3>
                            </div>
                            <div class="col-md-10">
                                @foreach ($announcement->images as $image)
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <img src="{{Storage::url($image->file)}}" alt="..." class="rounded">
                                    </div>
                                    <div class="col-md-8">
                                        Adult: {{$image->adult}} <br> 
                                        Medical: {{$image->medical}} <br>
                                        Spoof: {{$image->spoof}} <br>
                                        Violence: {{$image->violence}} <br>
                                        Racy: {{$image->racy}} <br>

                                        <b>Labels</b><br>
                                        <ul>
                                            @if($image->labels)
                                                @foreach($image->labels as $label)
                                                    <li>{{$label}}</li>
                                                @endforeach
                                            @endif
                                        </ul>
                                        
                                        {{$image->id}} <br>
                                        {{$image->file}} <br>
                                        {{Storage::url($image->file)}} <br>
                                    </div> 
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottoni per accettazione o per rifiuto --}}
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form action="{{route('revisor.accept', $announcement->id)}}" method="POST">
                    @csrf
                    <button class="btn btn-success" type="submit">Accept</button>
                </form>
            </div>
            <div class="col-md-6 text-right">
                <form action="{{route('revisor.reject', $announcement->id)}}" method="POST">
                    @csrf
                    <button class="btn btn-danger" type="submit">Reject</button>
                </form>
            </div>
        </div>
    </div>
    
    @else

    <div class="container text-center py-3">
        <h1>Nulla da revisionare.</h1>
    </div>

    @endif

</x-layout>