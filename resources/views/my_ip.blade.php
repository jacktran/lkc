@extends("shared.layout")

@section('styles')
{{ HTML::style('packages/css/pretty-json.css') }}


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

            <div class="alert alert-danger"  @if(!isset($error_message) ||  empty($error_message))  style="display: none"  @endif role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <span class="sr-only">Error:</span>

                @if(isset($error_message) && !empty($error_message))
                    {{$error_message}}
                @endif
            </div>

     <div class="form-wrapper">
         @if(isset($info))
            <table class="table">
                @foreach($info as $key => $value)
                    <tr>
                        <td >
                            @if($key == "Currency Converter")
                                @if(isset($info['Currency Code']))
                                    @if($info['Currency Code'] != 'USD')
                                        <b>100 USD to {{$info['Currency Code']}}</b>
                                    @endif
                                @else
                                    <b>{{$key}}</b>
                                @endif
                            @else
                                <b>{{$key}}</b>
                            @endif
                        </td>
                        <td>
                            @if($key == "Currency Converter")
                                @if(isset($info['Currency Code']))
                                    @if($info['Currency Code'] != 'USD')
                                        {{$value}} {{$info['Currency Code']}}
                                    @endif
                                 @endif
                            @else
                                {{$value}}
                            @endif


                        </td>
                    </tr>
<!--                    <p><b>{{$key}}</b> {{$value}}</p>-->
                @endforeach
            </table>

         @endif

    </div>
    </article>
</form>


@endsection

@section('scripts')
