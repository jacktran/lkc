<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 6/5/15
 * Time: 5:56 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Models\User\CommandHandlers;

use Models\User\Commands\RegisterUserCommand;

use ClientMessage;

use Auth;

use Lang;


class RegisterUserCommandHandler
{
    /**
     * @param \Models\User\Commands\RegisterUserCommand $command
     * @return ClientMessage object which will return to client
     */
    public function  handle(RegisterUserCommand $command)
    {
        // insert new user into database
        $user = $command->getUserRepository()->create(array(
            'name' => $command->getName(),
            'email' => $command->getEmail(),
            // encode user's password
            'password' => bcrypt($command->getPassword())
        ));
        // login new user to our system
        $is_login = Auth::attempt(['email' => $user['email'], 'password' => $command->getPassword()]);
        // get error message if login fail or success message if login success
        $clientMessage = $is_login ? ClientMessage::create(array(Lang::get('auth.register_success')), $is_login, array('name' => $user['name'], 'email' => $user['email']))
            : ClientMessage::create(array(Lang::get('auth.register_login_fail')), $is_login);
        return $clientMessage;
    }
}
