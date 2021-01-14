@extends ('layout')

@section('head')
    <link rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.css" 
    />
@endsection

@section ('content')
    @foreach ($article as $article)
        <div id="wrapper">
            <div class="content">
                <div class="title">
                    <h1 style="color: #2C383B">
                        <a href="/articles/{{ $article->id }}">
                            {{$article->title}}
                        </a>
                    </h1>
                </div>
                <p>
                    <figure class="image is-128x128">
                        <img src="images/banner.jpg" 
                            alt="image loading"
                        />
                    </figure>                       
                </p>
                {{!! $article->excerpt !!}}
            </div>
        </div>
    @endforeach
@endsection