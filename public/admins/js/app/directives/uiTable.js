/**
 * Created with JetBrains PhpStorm.
 * User: PhucTran
 * Date: 4/9/15
 * Time: 11:02 PM
 * To change this template use File | Settings | File Templates.
 */
toolApp.directive("uiTable", function ($compile) {
    return{
        scope:{
            options:"=",
            data:"="
        },
        link:function (scope, element, attrs) {
            scope.$watchGroup(["options", "data"], function (value) {
                var options = value[0];
                var bindingData = value[1];
                if (typeof bindingData === 'undefined' || typeof options === 'undefined')
                    return;
                var isOpenRow = false;
                var isOpenHeader = false;
                var currentColumnPosition = 0;
                var tableElement = $("<table class='table'><table>");
                var headElement = $("<thead></thead>");
                var bodyElement = $("<tbody></tbody>");
                var trElement = $("<tr ng-repeat='item in data'></tr>");
                var isAdvanceColumn = false;
                var thElements = [];
                var tdElements = [];
                var tdElement , thElement = null;
                for (var i = 0; i < bindingData.length; i++) {

                    var data = bindingData[i];
                    for (var key in data) {
                        var columnName = key;
                        if (options.exceptColumns) {
                            // remove all except columns
                            if (options.exceptColumns.indexOf(columnName) != -1)
                                continue;
                        }
                        // add table's header
                        if (i == 0) {
                            // remove default property of angular js
                            if (key.startsWith("$"))
                                continue;
                            if (options.alias) {
                                // change columns name to alias
                                for (var aliasKey in options.alias) {
                                    if (aliasKey == key) {
                                        var alias = options.alias[aliasKey];
                                        columnName = alias;
                                    }
                                }
                            }
                            tdElement = $("<td>{{item." + key + "}}</td>");
                            thElement = $("<th>" + columnName + "</th>");
                            tdElements.push(tdElement);
                            thElements.push(thElement);
                        }

                    }


                    if (options.advanceColumns) {
                        // add advance columns
                        for (var j = 0; j < options.advanceColumns.length; j++) {
                            var advanceColumn = options.advanceColumns[j];
                            var position = advanceColumn.position;
                            thElement = $("<th>" + advanceColumn.name + "</th>");
                            tdElement = $("<td>" + advanceColumn.expression + "</td>");

                            thElements.splice(position, 0, thElement);
                            tdElements.splice(position, 0, tdElement);

                        }
                    }
                    headElement.append(thElements);
                    trElement = trElement.append(tdElements);
                    bodyElement.append(trElement);
                    tableElement = tableElement.append([headElement,bodyElement]);
                    break;
                }
                var html = tableElement.prop("outerHTML");
                element.html(html);
                $compile(element.contents())(scope);
            });

        }
    }
});