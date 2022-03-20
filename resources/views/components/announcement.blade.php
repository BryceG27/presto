<div class="row justify-content-center mb-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"> {{$announcement->title}} </div>
            <div class="card-body">
                <p>
                    @foreach ($announcement->images as $image)
                        <img src=" {{$image->getUrl(300, 150)}} " alt="" class="rounded float-right">
                    @endforeach
                    {{$announcement->body}}
                </p>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <strong>Category: <a href=" {{route('announcement.category', [
                    $announcement->category->name, 
                    $announcement->category->id
                    ])}} ">{{$announcement->category->name}}</a></strong>
                    <i> {{$announcement->created_at->format('d/m/Y')}} - {{$announcement->user->name}}</i>
            </div>
        </div>
    </div>
</div>