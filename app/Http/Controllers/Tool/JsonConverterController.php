<?php
namespace App\Http\Controllers\Tool;
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 11/14/14
 * Time: 2:57 PM
 * To change this template use File | Settings | File Templates.
 */
use App\Http\Controllers\Controller as Controller;
use Cores\JsonParser\Converter as Converter;
use Cores\JsonParser\Object\ObjectConfig as ObjectConfig;
use Models\Tool\Commands\JsonParserCommand;
use Illuminate\Container\Container as App;
use Input;
use View;

class JsonConverterController extends Controller
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



    protected  $app;

    public  function __construct(App $app)
    {
        $this->app = $app;
    }

    public function  jsonToObject()
    {

        $json_string = Input::get("json_input");
        $type = Input::get("type");
        $title = Input::get("title");
        switch ($type) {
            case "JTP":
                $language = ObjectConfig::$php;
                break;
            case "JTCS":
                $language = ObjectConfig::$csharp;
                break;
            default:
                return View::make("404");
        }
        $results = $this->dispatch(new JsonParserCommand(new Converter($language,$json_string, $this->app->tagged('ProgramLanguageInfoTag'))));
        $error = false;
        if ($error) {
            $error_message = 'a';
            return View::make('json_to_object', compact('results', 'error', 'error_message', 'old_value', 'title', 'type'));
        }

        return View::make('json_to_object', compact('results', 'error', 'old_value', 'title', 'type'));

    }

}
