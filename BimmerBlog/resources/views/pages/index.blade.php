@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Hello, BMW fan!</h1>
        <p class="lead">This site is for drivers of ultimate driving machine.</p>
        <hr class="my-4">
        <p>Explore DIY projects and retrofits on BMW.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="/about" role="button">Learn more</a>
        </p>
    </div>
    @if($popularPosts->count()>0)
        <h2>Popular Posts</h2>
    @endif
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            @for ($i = 1; $i < $popularPosts->count(); $i++)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
            @endfor
        </ol>
        <div class="carousel-inner">
            <?php $i=0; ?>
            @foreach($popularPosts as $post)
                @if($i==0)
                <div class="carousel-item active" style="backgound:silver;">
                @else
                <div class="carousel-item" style="backgound:silver;">
                @endif
                    <img class="d-block w-100 imgBlur" src="/storage/cover_images/{{$post->cover_image}}" alt="IMG">
                    <div class="carousel-caption">
                        <h4>{{$post->title}}</h4>
                        <a class="btn btn-info" href="/posts/{{$post->id}}" role="button">Learn More</a>
                    </div>
                </div>
                <?php $i++; ?>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@endsection