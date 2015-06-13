<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 6/4/15
 * Time: 12:16 PM
 * To change this template use File | Settings | File Templates.
 */
namespace App\Http\Controllers\Auth\Admin;


use App\Http\Controllers\Controller as Controller;

use Models\User\Commands\RegisterUserCommand as RegisterUserCommand;

use Models\User\Commands\UserLoginCommand as UserLoginCommand;

use Models\User\UserRepositoryInterface as UserRepositoryInterface;

use App\Http\Requests\Admin\RegisterPostRequest;

use App\Http\Requests\Admin\LoginPostRequest;

use Illuminate\Http\Request as Request;

use Auth;

use ClientMessage;

use Lang;


class AdminAuthController extends Controller
{
    public function  register(RegisterPostRequest $registerPostRequest, UserRepositoryInterface $userRepository)
    {
        try {
            return Response()->json($this->dispatch(new RegisterUserCommand($registerPostRequest, $userRepository)));
        } catch (\Exception $ex) {
            return Response()->json(ClientMessage::create(array(
                Lang::get('auth.register_unexpected_problem'),
                $ex->getMessage()
            ), false));
        }

    }

    public function  login(LoginPostRequest $loginPostRequest)
    {
        try {
            return Response()->json($this->dispatchFrom(UserLoginCommand::class,$loginPostRequest));
        } catch (\Exception $ex) {
            return Response()->json(ClientMessage::create(array(
                Lang::get('auth.register_unexpected_problem'),
                $ex->getMessage()
            ), false));
        }
    }
}