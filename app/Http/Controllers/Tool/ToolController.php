<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 11/14/14
 * Time: 2:57 PM
 * To change this template use File | Settings | File Templates.
 */
namespace App\Http\Controllers\Tool;

use App\Http\Controllers\Controller as Controller;

use Models\Tool\ToolRepository as ToolRepository;

use Illuminate\Http\Response as Response;

use Request;

class ToolController extends Controller
{

    /*
    |--------------------------------------------------------   ------------------
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

    /**
     * @var Tool
     */
    private $tool;


    public function __construct(ToolRepository $tool)
    {
        $this->tool = $tool;
    }

    /**
     * Get the all tool.
     *
     * @return array
     */
    public function  getAll()
    {
        // get all tool from database
        // call from repository
        $tools = $this->tool->getAll();
        //return object to client in json format
        return Response()->json($tools);
    }


    /**
     * create new tool.
     *
     * @param
     * Request
     * @return array
     */
    public  function  create(Request $request)
    {
        try
        {
            // parse object to array
            // insert new tool
            $tool = $this->tool->create((array)$request::all());
            // return object to client in json format
            return Response()->json($tool);
        }
        catch(\Exception $ex)
        {
            // return error info to client in json format
            return Response()->json($ex);
        }


    }

}
