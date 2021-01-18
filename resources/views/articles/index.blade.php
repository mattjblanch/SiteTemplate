@extends ('layout')



@section ('content')
    <div id='wrapper'>
        <div
            id='page'
            class='container'>    
            
            @forelse ($articles as $article)
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
                            <figure class="image is-128x128">
                                <img src="images/banner.jpg" 
                                    alt="image loading"
                                />
                            </figure>                       
                        </p>
                        {{!! $article->excerpt !!}}
                    </div>
                </div>
            @empty
                <p>No relevent articles yet.</p>
            @endforelse
        </div>
    </div>
@endsection 