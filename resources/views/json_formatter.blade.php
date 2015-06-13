@extends("shared.layout")

@section('styles')
{{ HTML::style('packages/css/pretty-json.css') }}


@endsection


@section('body')

    <div class="blog-header"><h1>Tools</h1></div>
    <article id="ccr-article">

        <h1>Json Formatter</h1>
     <div class="form-wrapper">
        <p><b>Option 1: </b>Copy and past your JSON string here</p>
         <div class="alert alert-danger hidden-me" id="json-input-error" role="alert">
             <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
             <span class="sr-only">Error:</span>
             Invalid Json Format
         </div>
         <textarea class="form-control my-textarea" id="json-input" rows="10"></textarea>
         <br>
         <p><b>Option 2: </b>Put your JSON url</p>
         <div class="alert alert-danger hidden-me" id="json-url-error" role="alert">
             <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
             <span class="sr-only">Error:</span>
             Invalid Json Format
         </div>
         <input class="form-control" id="json-url" placeholder="http://www.example.com/json" type="text">
         <button type="submit" id="action" class="btn btn-default json-formatter-btn">FORMAT JSON</button>
    </div>
     <hr>
     <div id="result-wrapper" class="hidden-me">
         <div class="hidden-me" id="json-input-result-wrapper">
             <p><b>#1:</b> Formatted JSON</p>
             <pre id="json-input-result" class="json-formatter-result">

             </pre>
             <hr>
         </div>
         <div class="hidden-me" id="json-url-result-wrapper">
             <p><b>#2:</b> Formatted JSON From url</p>
             <pre id="json-url-result" class="json-formatter-result">

             </pre>
         </div>
     </div>
    </article>


@endsection

@section('scripts')

{{ HTML::script('packages/js/underscore-min.js') }}
{{ HTML::script('packages/js/backbone-min.js') }}
{{ HTML::script('packages/js/pretty-json-min.js') }}
<script>
    $(document).ready(function() {

        var el = {
            btnAction: $('#action'),
            jsonInputResultWrapper: $('#json-input-result-wrapper'),
            jsonUrlResultWrapper: $('#json-url-result-wrapper'),
            jsonInputResult:$('#json-input-result'),
            jsonUrlResult: $('#json-url-result'),
            jsonUrlError: $('#json-url-error'),
            jsonInputError: $('#json-input-error'),
            resultWrapper: $("#result-wrapper"),
            jsonInput: $('#json-input'),
            jsonUrl: $("#json-url")
        };

        el.btnAction.on('click', function(){
            el.jsonUrlError.hide();
            el.jsonInputError.hide();
            el.jsonInputResult.empty();
            el.jsonUrlResult.empty();
            el.jsonInputResultWrapper.hide();
            el.jsonUrlResultWrapper.hide();

            var url = el.jsonUrl.val();
            if(url.length > 0)
            {
                $.getJSON(url, function(response) {
                    var jsonUrlString =  JSON.stringify(response);
                    var jsonUrlData  = parseJsonFromString(jsonUrlString,el.jsonUrlError);
                    if(jsonUrlData != false)
                    {
                        el.jsonUrlResultWrapper.show();
                        var jsonUrlNode = new PrettyJSON.view.Node({
                            el:el.jsonUrlResult,
                            data: jsonUrlData,
                            dateFormat:"DD/MM/YYYY - HH24:MI:SS"
                        });
                        jsonUrlNode.expandAll();
                    }
                })
                .fail(function() {
                       el.jsonUrlError.show();
                 });

            }
            var jsonInputString = el.jsonInput.val();
            if(jsonInputString.length > 0)
            {
                var jsonInputData =  parseJsonFromString(jsonInputString,el.jsonInputError);
                if(jsonInputData  != false)
                {
                    el.jsonInputResultWrapper.show();
                    var jsonInputNode = new PrettyJSON.view.Node({
                        el:el.jsonInputResult,
                        data: jsonInputData,
                        dateFormat:"DD/MM/YYYY - HH24:MI:SS"
                    });
                    jsonInputNode.expandAll();
                }
            }

            el.resultWrapper.show();
        });
    });
</script>
@endsection