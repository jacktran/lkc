<?php

include_once(app_path() . '/mycore/SuperGlobal.php');
include_once(app_path() . '/mycore/UrlGetter.php');

/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 11/14/14
 * Time: 2:57 PM
 * To change this template use File | Settings | File Templates.
 */
class ClientSideFormatterController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */
    public function  ajaxGetSource()
    {
        $is_error = false;
        $error_message = "";
        $data = "";
        $url = Input::get('url');

        if (Request::ajax()) {
            if (!empty($url) && SuperGlobal::is_valid_url($url)) {
                $url_getter = new UrlGetter();
                $data = $url_getter->source($url);
                if (empty($data) || $url_getter->is_error) {
                    $is_error = true;
                    $error_message = "Cannot get data from this url";
                }
            } else {
                $is_error = true;
                $error_message = "Invalid url";
            }
        } else {
            $error_message = "Invalid method";
            $is_error = true;
        }
        $return_data = array("is_error" => $is_error, "error_message" => $error_message, "data" => $data);
        return json_encode($return_data);


    }

}
