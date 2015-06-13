<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 6/6/15
 * Time: 5:03 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Modules\Message;

class ClientMessage
{

    public $status;

    public $messages;

    public $data;

    /**
     * @param $data data will return to client
     * @param array $messages message of operation
     * @param bool $status status of operation ('true' if success, 'false' if have error)
     */
    public function create($messages,$status = true,$data = null)
    {
      $this->status = $status;
      $this->messages = $messages;
      $this->data = $data;
        return $this->returnJson();
    }

     public  function  create_error($messages)
     {
         $this->status = false;
         $this->messages = $messages;
         return $this->returnJson();
     }

    public  function  create_success($messages,$data = null)
    {
        $this->status = true;
        $this->messages = $messages;
        $this->data = $data;
        return $this->returnJson();
    }


    private  function  returnJson()
    {
        return Response()->json($this);
    }


}
