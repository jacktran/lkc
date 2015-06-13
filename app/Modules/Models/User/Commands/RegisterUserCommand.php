<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 6/5/15
 * Time: 5:32 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Models\User\Commands;

use App\Commands\Command;


class RegisterUserCommand extends Command
{

    // user's email
    private $email;

    // user's password;
    private $password;

    // user's name
    private $name;

    private   $userRepository;

    /**
     * @param Request $request current http request to
     * @param UserRepositoryInterface $userRepository to interace with database
     */
    function __construct($request,$userRepository)
    {
        $this->email = $request->get('email');
        $this->name = $request->get('name');
        $this->password = $request->get('password');
        $this->userRepository = $userRepository;
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

    /**
     * Get user's name
     */
    public  function  getName()
    {
        return $this->name;
    }

    /**
     * Get userRepository to interact with database
     */
    public  function  getUserRepository()
    {
        return $this->userRepository;
    }







}