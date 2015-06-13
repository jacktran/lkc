<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 6/7/15
 * Time: 5:00 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Models\User\CommandHandlers;
use Models\User\Commands\UserLoginCommand;
use ClientMessage;
use Auth;
use Lang;
class UserLoginCommandHandler
{
    public  function handle(UserLoginCommand $command)
    {
        $is_login = Auth::attempt(['email' => $command->getEmail(), 'password' => $command->getPassword()]);
        // get error message if login fail or success message if login success
        return  $is_login ? ClientMessage::create_success(array(Lang::get('auth.login_success')), array('email' => $command->getEmail(), 'password' => $command->getPassword()))
            : ClientMessage::create_error(array(Lang::get('auth.register_login_fail')));

    }

}
