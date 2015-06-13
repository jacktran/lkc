<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 6/7/15
 * Time: 5:00 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Models\User\Commands;

use App\Commands\Command;

class UserLoginCommand extends  Command
{

    // user's email
    private  $email;

    //user's password
    private  $password;

    /**
     * @param String $email user's email
     * @param String $password user's password
     */
    function __construct($email,$password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Get user's email
     *
     */
    public  function getEmail()
    {
        return $this->email;
    }

    /**
     * Get user's password
     *
     */
    public  function  getPassword()
    {
        return $this->password;
    }


}
