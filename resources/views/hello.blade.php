@extends("shared.layout")

@section('left_menu')
@include('partials.left_menu')
@endsection
@section('body')
<section id="ccr-blog">
    <div class="blog-header"><h1>Home</h1></div>
    <div class="blog-body">
            <section id="ccr-blog">
                @foreach($articles as $article)
                    <article>

                        <div class="blog-text">
                            <figure class="blog-thumbnails">
                                <img src="https://avatars.githubusercontent.com/u/864168?v=3&size=50" class="small-icon">
                            </figure>

                            <a href="/articles/{{$article->title_url}}">{{$article->title}}</a>

                            <p class="article-info">posted by {{$article->posted_by}}</p>

                        </div> <!-- /.blog-text -->

                    </article>
                @endforeach
            <hr>
            <section id="ccr-latest-post-gallery">
                <ul class="ccr-latest-post">

                </ul> <!-- /.ccr-latest-post -->

            </section>
    </section>
       </div>    <!-- /#ccr-blog -->


@endsection