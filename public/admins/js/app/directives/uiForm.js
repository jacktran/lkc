/**
 * Created with JetBrains PhpStorm.
 * User: PhucTran
 * Date: 4/4/15
 * Time: 5:23 PM
 * To change this template use File | Settings | File Templates.
 */
toolApp.directive("uiForm",function($compile){
    return{
        scope:{
            elements : "="
        },
        link: function(scope,element){
            scope.$watch("elements",function(value){
                if(angular.isUndefined(value))
                    return;
                if(!angular.isArray(value))
                    return;

                var outputElements = [];
                htmlGenerator(value, outputElements);
                var outputTemplate = "";
                for(var index =0; index < outputElements.length;index++)
                {
                    var outputElement = outputElements[index];
                    outputTemplate += outputElement.prop("outerHTML");
                }
                element.html(outputTemplate);
                $compile(element.contents())(scope);
            });
        }
    }
});


function htmlGenerator(elementObj,outputElements,parentElement)
{
    var parsedElement = null;
    for(var prop in elementObj)
    {
        if(elementObj.hasOwnProperty(prop))
        {
           var data = elementObj[prop];
           if(typeof (data) == "object")
           {
               htmlGenerator(data,outputElements,parsedElement);
           }
            else
            {
               var template = "";
               switch (prop)
               {
                   case "type":
                       switch (data)
                       {
                           case "textbox":
                           case "button":
                           case "submit":
                           case "hidden":
                               template += "<input/>";
                               break;
                           default :
                               template += "<"+ data +"></" + data + ">";
                               break;
                       }
                       break;
               }
               if(parsedElement == null)
                   parsedElement =  $(template);

                parsedElement = appendAttribute(parsedElement,prop,data);
           }
        }
    }
    if(typeof parentElement != "undefined" && parentElement != null)
    {
        parentElement.append(parsedElement);
    }
    else
    {
        if(parsedElement != null)
        {
            outputElements.push(parsedElement);
            parentElement = null;
        }

    }
}

function appendAttribute(element,attr,value)
{
    element  = element.attr(attr,value);
    if(attr.startsWith("__"))
    {
        var flagAttr =   attr + "=\"" + value + "\"";
        var elementString = element.prop("outerHTML");
        elementString = elementString.replace(flagAttr,value);
        element  = $(elementString);
    }
    return element;
}





