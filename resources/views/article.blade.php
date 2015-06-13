@extends("shared.layout")
@section('body')
<div class="blog-header"><h1>Article</h1></div>
<article id="ccr-article">
  <h1>{{$article['title']}}</h1>
  <p>{{$article['body']}}</p>
  <br>
  <span class="article-info">  Posted on <time datetime="{{$article['created_on']}}">{{$article['created_on']}}</time> by {{$article['posted_by']}} </span>

</article> <!-- /#ccr-single-post -->



@endsection