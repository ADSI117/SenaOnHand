<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    protected function redirectTo()
    {
        return '/getlink';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        // $this->middleware('dominio');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      // echo "Validador";
        return Validator::make($data, [
            //'rol_id' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
      // echo "Creador";
      $usuario = explode("@", $data['email'])[0];
      $dominio = explode("@", $data['email'])[1];
      $rol = 0;
      switch (strtolower($dominio)) {
        case 'misena.edu.co':
          $rol = 1;
          break;
        case 'sena.edu.co':
          $rol = 2;
          break;
       default:
            dd('{"estado": "0","mensaje": "Dominio de Correo electrónico invalido"}');
            break;
      }
      if ($rol != 0) {

        // Se debe construir primero y despues pasar el parametro
        $data['nombres'] = $usuario;
        $data['rol_id'] = $rol;
        $data['estado_id'] = 1;
        $data['url_foto'] = 'soh_profile_default.png';
        $data['password'] = bcrypt($data['password']);

        return User::create($data);
      }
    }
}
