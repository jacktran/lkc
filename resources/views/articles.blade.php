@extends("shared.layout")
@section('body')


<div class="blog-header"><h1>Articles</h1></div>
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
                @foreach($tools as $tool)
                <li>
                    <a href="/tools/{{$tool->name_url}}" title="{{$tool->description}}">
                        <div class="ccr-thumbnail">
                            <div class="medium-square">{{ Str::upper($tool->name)}}</div>
                        </div>
                    </a>
                </li>
                @endforeach

            </ul> <!-- /.ccr-latest-post -->

        </section>
    </section>
</div>    <!-- /#ccr-blog -->


@endsection