@extends ('layout')

@section ('content')

    @foreach ($article as $article)
        <div id="wrapper">
            <div class="content">
                <div class="title">
                    <h2>
                        <a href="/articles/{{ $article->id }}">
                            {{$article->title}}
                        </a>
                    </h2>
                </div>
                <p>
                    <img src="images/banner.jpg" 
                    alt=""
                    class="image image-full"
                    
                    />
                </p>
                {{!! $article->excerpt !!}}
            </div>
        </div>
    @endforeach

@endsection