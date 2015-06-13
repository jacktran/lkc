<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*====  Laravel default routes for client side ====*/

Route::get('/', 'WelcomeController@index');

//Route::controllers([
//    'auth' => 'Auth\AuthController',
//    'password' => 'Auth\PasswordController',
//]);


/*====  Routes for client side ====*/

/*==== Method get ====*/

Route::group(['namespace' => 'Tool'], function () {
    Route::get('tools/{type}', 'ToolController@getTool');
    Route::get('tools', 'ToolController@index');
    Route::post('tools/{type}', 'JsonConverterController@jsonToObject');
    Route::get('admin/tools', 'ToolController@getAll');
    Route::post('admin/tools', 'ToolController@create');
});





Route::group(['namespace' => 'Article'], function () {
    Route::get('articles/{title_url}', 'ArticleController@getArticle');
    Route::get('articles', 'ArticleController@index');
});


Route::group(['namespace' => 'Auth\Admin'], function () {
    // route for register new user
    Route::post('admins/auth/register', 'AdminAuthController@register');

    // route for user login
    Route::post('admins/auth/login', 'AdminAuthController@login');
});

Route::group(['namespace' => 'PLanguage'],function(){
    // route for create new programing language
    Route::post('admins/programming-language/create', 'PLanguageController@create');

    // route for get programing languages
    Route::get('admins/programming-language/get', 'PLanguageController@get');

});


Route::group(['namespace' => 'Page\Client'], function () {
    Route::get('/', 'HomeController@index');
});

Route::group(['namespace' => 'Page\Admin'], function () {
    Route::get('admin', 'HomeController@showWelcome');
});




//Route::get('admin', 'Tool/ToolController@index');


Route::get('tools/client-side-formatter/ajax-get-url-data', 'ClientSideFormatterController@ajaxGetSource');

Route::get('tools/{type}', function ($type) {
    switch ($type) {
        case "json-formatter":
            return View::make("json_formatter");
            break;
        case "convert-json-to-php":
            $type = "JTP";
            $title = "JSON to PHP";
            return View::make("json_to_object", compact("type", 'title'));
            break;
        case "convert-json-to-csharp":
            $type = "JTCS";
            $title = "JSON to C#";
            return View::make("json_to_object", compact("type", 'title'));
            break;
        case "what-is-my-ip-info":
            $title = "My IP Infomation";
            $IPInfo = new IPInfomation();
            $info = $IPInfo->Get();
            $error_message = "";
            if ($info == false)
                $error_message = $IPInfo->Message;
            return View::make("my_ip", compact('title', "error_message", "info"));
        case "html-formatter":
            $title = "HTML formatter";
            return View::make("client_side_formatter", compact('title', "error_message", "info"));
            break;
        default:
            return View::make("404");
    }
});

/*==== Method post ====*/

/*=========================================================================*/


/*====  Routes for admin side ====*/






