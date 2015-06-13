@extends("shared.layout")
@section('body')


<div class="blog-header"><h1>Tools</h1></div>
<div class="blog-body">
    <section id="ccr-blog">

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