@extends("shared.layout")

@section('styles')

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

            <div class="alert alert-danger"  @if(!isset($error_message)) style="display: none"  @endif role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <span class="sr-only">Error:</span>
                @if(isset($error_message))
                    {{$error_message}}
                @endif
            </div>

     <div class="form-wrapper">
         <?php
            if(isset($type))
                echo Form::hidden('type',$type);
            if(isset($title))
                 echo Form::hidden('title',$title);
         ?>
        <p><b>Option 1: </b>Copy and past your JSON string here</p>
             <textarea class="form-control my-textarea" name="json_input" id="source" rows="10">@if(isset($old_value)){{$old_value}}@endif</textarea>
         <p><b>Option 2: </b>Put your url</p>
         <input class="form-control" placeholder="http://www.example.com/yourfile.json" type="text">
         <button  id="action"  class="btn btn-default json-formatter-btn">Format</button>
         <br>
         <br>
         <textarea class="form-control my-textarea" name="json_input" id="outPut" rows="10">@if(isset($old_value)){{$old_value}}@endif</textarea>
    </div>
    </article>
</form>


@endsection

@section('scripts')
{{ HTML::script('packages/js/jquery.cookie.js') }}

{{ HTML::script('packages/js/jsbeautify/beautify.js') }}
{{ HTML::script('packages/js/jsbeautify/beautify-css.js') }}
{{ HTML::script('packages/js/jsbeautify/beautify-html.js') }}
{{ HTML::script('packages/js/jsbeautify/unpackers/javascriptobfuscator_unpacker.js') }}
{{ HTML::script('packages/js/jsbeautify/unpackers/myobfuscate_unpacker.js') }}
{{ HTML::script('packages/js/jsbeautify/unpackers/p_a_c_k_e_r_unpacker.js') }}
{{ HTML::script('packages/js/jsbeautify/unpackers/urlencode_unpacker.js') }}
{{ HTML::script('packages/js/jsbeautify/setting.js') }}
<script>
    $(function () {

        read_settings_from_cookie();


        if (the.use_codemirror && typeof CodeMirror !== 'undefined') {
            the.editor = CodeMirror.fromTextArea(out_put, {
                theme: 'default',
                lineNumbers: true
            });
            the.editor.focus();

           // the.editor.setValue(default_text);
//            $('.CodeMirror').click(function () {
//                if (the.editor.getValue() == default_text) {
//                    the.editor.setValue('');
//                }
//            });
        } else {

            $('#source').bind('click focus', function () {
//                if ($(this).val() == default_text) {
//                    $(this).val('');
//                }
            }).bind('blur', function () {
                    if (!$(this).val()) {
                        //$(this).val(default_text);

                    }
                });
        }


        $(window).bind('keydown', function (e) {
            if (e.ctrlKey && e.keyCode == 13) {
                $('#outPut').val(beautify());
            }
        });
        $('#action').click(function(e){

//                $.ajax({
//                    type: "GET",
//                    url : "client-side-formatter/ajax-get-url-data",
//                    data : {url:"http://api.jquery.com/jquery.ajax/"},
//                    success : function(data){
//                        alert(data);
//                    }
//
//                });
            e.preventDefault();
            //alert($("#source").val());
            $('#outPut').val(beautify($("#source").val()));
        });
    });
</script>
@endsection