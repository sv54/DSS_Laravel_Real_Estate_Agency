<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::MAIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => ['required', 'string', 'max:255', 'alpha'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'apellido' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^.(?=.*[a-zA-Z])(?=.*[0-9]).*$/'],
            'telefono' => ['required', 'unique:users,telefono'],
            'DNI' => ['required', 'unique:users'],
            'agency_id' => ['required', 'exists:agencies,id'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     print_r($data);

    //     return User::create([
    //         'nombre' => $data['nombre'],
    //         'email' => $data['email'],
    //         'apellido' => $data['apellido'],
    //         'password' => Hash::make($data['password']),
    //         'telefono' => $data['telefono1'],
    //         'DNI' => $data['DNI'],
    //         'agency_id' => $data['agency_id'],
    //         'tipoUsuario'=>$data['tipoUsuario'],
    //     ]);
    // }

    protected function create(Request $request){
        $post = new User;

        
        $post->email =$request->email;
        $post->nombre =$request->nombre;
        $post->apellido =$request->apellido;
        $post->password =Hash::make($request->password);
        $post->telefono =$request->telefono;
        $post->DNI =$request->DNI;
        $post->tipoUsuario ='agente';
        $post->agency_id = $request->agency_id;
        $post->save();

        // return User::create([
        //     'nombre' => $request->nombre,
        //     'email' => $request->email,
        //     'apellido' => $request->apellido,
        //     'password' => Hash::make($request->password),
        //     'telefono' => $request->telefono,
        //     'DNI' => $request->DNI,
        //     'agency_id' => $request->agency_id,
        //     'tipoUsuario'=>$request->tipoUsuario,
        // ]);
        return redirect('main');
    }
}
