<form action="{{route('locale', ['locale' => $lang])}}" method="POST">
    @csrf
    <button type="submit" class="nav-link"
      style='background-color:transparent; border:none;'>
      <span class="text-uppercase text-dark"><i class="flag-icon flag-icon-{{$nation}} px-3"></i><strong>{{$nation}}</strong></span>
  </button>
</form>