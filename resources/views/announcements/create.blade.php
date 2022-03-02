<x-layout title="Crea un annuncio">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-8 offset-md-2 py-3">
          <h3>Inserisci un annuncio</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-8 offset-md-2 py-3">
          <form method="POST" action="{{route('announcements.create')}}">
            @csrf
            <div class="mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingText" placeholder="Titolo annuncio" name="title">
                <label for="floatingText">Dai un titolo all'annuncio</label>
              </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="mb-3">
              <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px" name="body"></textarea>
                <label for="floatingTextarea">Descrizione articolo</label>
              </div>
            </div>
            <div class="mb-3">
              <select name="category" class="form-select" aria-label="Default select example">
                @foreach ($categories as $category)
                  <option value="{{$category->id}}
                    {{old('category') == $category->id ? 'selected' : ' '}}">{{$category->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingText" placeholder="Prezzo" name="price">
                <label for="floatingText">Inserisci il prezzo</label>
              </div>
            </div>
            
              {{-- <div class="form-group row">
                <label for="images" class="col-md-12 col-form-label text-md-right">Immagini</label>
                <div class="col-md-12">
                  <div class="dropzone" id="drophere"></div>
                  @error('images')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                      </span>
                  @enderror
                </div>
              </div> --}}
              <button type="submit" class="btn btn-primary my-4">Invia</button>
            
          </form>
        </div>
      </div>
    </div>
        
    
    </x-layout>
    