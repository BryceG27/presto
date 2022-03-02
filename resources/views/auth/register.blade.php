<x-layout title="Registrati - presto.it">
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 py-2">
                <h3>Registrati</h3>
            </div>
        </div>
        <div class="row">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 py-2">
                <form action="{{route('register')}} " method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingPassword" placeholder="Password" name="name">
                        <label for="floatingPassword">Nome utente</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                        <label for="floatingInput">Indirizzo email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password_confirmation">
                        <label for="floatingPassword">Conferma password</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Registrati</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>

