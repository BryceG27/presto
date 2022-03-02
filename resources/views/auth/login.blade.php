<x-layout title="Login - presto.it">

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 py-3">
                <h3>Login</h3>
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
                <form action="{{route('login')}} " method="POST">
                    @csrf
                    <div class="form-floating mb-3 my-2">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                        <label for="floatingInput">Indirizzo email</label>
                      </div>
                      <div class="form-floating my-2">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">Password</label>
                      </div>
                    
                    <button type="submit" class="btn btn-primary mt-3">LOGIN</button>
                </form>
                <div class="pt-3">
                    <p>Non sei registrato? <a href="{{route('register')}}">Clicca qui</a></p>
                </div>
            </div>
        </div>
    </div>
</x-layout>