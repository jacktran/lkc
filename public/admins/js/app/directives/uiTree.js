toolApp.directive("myTree", function ($compile) {
    return{
        scope:{
            data:'=',
            options:"="
        },
        link:function (scope, element) {
            var template = "<ul><li ng-repeat='item in data'>@href_flag</li></ul>";
            scope.$watch("options", function (value) {
                if (angular.isUndefined(value))
                    return;
                for(var key in value) {
                    var optionField = value[key];
                    if (optionField === "")
                        continue;
                    switch (key) {
                        case "href":
                            var startWith = "";
                            var middle = "";
                            var endWith = "";
                            if(angular.isObject(optionField))
                            {
                                for(var subKey in optionField)
                                {
                                    var subOptionField = optionField[subKey];
                                    switch (subKey)
                                    {
                                        case "startWith":
                                            startWith = subOptionField;
                                            break;
                                        case "middle":
                                            middle = "{{item." + subOptionField + "}}";
                                            break;
                                        case "endWith":
                                            endWith = subOptionField;
                                            break;
                                    }
                                }
                            }
                            else
                            {
                                middle = "{{item." + optionField + "}}";
                            }
                            var fullAttr =  startWith + middle + endWith;
                            var href = "<a href='"+ fullAttr +"' >@text</a>";
                            template = template.replace("@href_flag", href);
                            break;
                        case "text":
                            template = template.replace("@text", "{{item." + optionField  +"}}");
                            break;
                    }

                }
                element.html(template);
                $compile(element.contents())(scope);
            });
        }
    };
});



