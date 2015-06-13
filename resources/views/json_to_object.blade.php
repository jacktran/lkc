@extends("shared.layout")
@section('styles')
<link rel="stylesheet" href="{{URL::asset('css/pretty-json.css')}}">
@endsection
@section('body')
<form method="post">
    <div class="blog-header"><h1>Tools</h1></div>

    <article id="ccr-article">
        <h1>
            @if(isset($title))
            {{$title}}
            @endif
        </h1>

        <div class="alert alert-danger"
        @if(!isset($error_message)) style="display: none" @endif role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span
                class="sr-only">Close</span></button>
        <span class="sr-only">Error:</span>
        @if(isset($error_message))
        {{$error_message}}
        @endif
        </div>

        <div class="form-wrapper">
            <?php
            if (isset($type))
                echo "<input name='type' type='hidden' value='$type'>";
            if (isset($title))
                echo "<input name='title' type='hidden' value='$title'>";
            ?>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p><b>Option 1: </b>Copy and past your JSON string here</p>
            <textarea class="form-control my-textarea" name="json_input" id="input" rows="10">
                @if(isset($old_value))
                    {{$old_value}}
                @endif
            </textarea>

            <p><b>Option 2: </b>Put your JSON url</p>
            <input class="form-control" name="json_url" placeholder="http://www.example.com/yourfile.json" type="text">
            <button type="submit" id="action" class="btn btn-default json-formatter-btn">Generate</button>
        </div>
        @if(isset($results))
        @if(isset($error))
        @if(!$error)
                <pre id="result" class="json-formatter-result prettyprint">
                    @foreach($results as $result)
                        <div>{{$result}}</div>
                    @endforeach
                </pre>
        @endif
        @endif
        @endif

    </article>
</form>
@endsection
