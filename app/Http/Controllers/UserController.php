<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use App\Models\Agency;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;

class UserController extends Controller
{
    public function show($id) {
        $user = User::findOrFail($id);
        return view('user', ['user' => $user]);
    }

    public function showBueno($id) {
        $user = User::findOrFail($id);
        $userProperties = Property::where('user_id', '=', $id)->paginate(5);
        $agencia = Agency::findOrFail($user->agency_id);
        $photos = DB::table('photos')->get();
        $nombre = null;
        $encontrado = false;
        return view('userBueno', ['user' => $user,'properties' => $userProperties,'agency' => $agencia,
        'photos'=> $photos, 'encontrado'=>$encontrado, 'nombre'=>$nombre]);
    }
    
    public function showAll($by=null) {
        if($by==null){
            $users = User::paginate(10);
        }
        else{
            $users = User::orderBy($by)->paginate(10);
        }
        return view('users', ['users' => $users]);
    }

    public function formulario() {
        $tipos = array_keys(config('enums_Usuario.usuario'));

        return view('adduser',['tipos' => $tipos]);
    }

    public function showUpdate($id){
        $user= User::findOrFail($id);
        $tipos = array_keys(config('enums_Usuario.usuario'));
        return view('updateuser', ['user' => $user, 'tipos' => $tipos]);
    }

    public function showUpdateBueno($id){
        $user= User::findOrFail($id);
        $tipos = array_keys(config('enums_Usuario.usuario'));
        return view('updateuserBueno', ['user' => $user, 'tipos' => $tipos]);
    }

    public function update(Request $request){
        $post = User::findOrFail($request->id);

        $request->validate([
            'nombre' => 'required|alpha',
            'email' => 'required|email|unique:users,email,'.$request->id,
            'apellido' => 'required',
            'password' => 'required|regex:/^.(?=.*[a-zA-Z])(?=.*[0-9]).*$/',
            'telefono' => 'required|unique:users,telefono,'.$request->id,
            'DNI' => 'required|unique:users,DNI,'.$request->id,
            'tipoUsuario' => 'required',
            'agency_id' => 'required|exists:agencies,id',

        ]);

        $post->email =$request->email;
        $post->nombre =$request->nombre;
        $post->apellido =$request->apellido;
        $post->password = Hash::make($request->password);
        $post->telefono =$request->telefono;
        $post->DNI =$request->DNI;
        $post->tipoUsuario =$request->tipoUsuario;
        $post->agency_id =$request->agency_id;
        $post->update();
        return redirect('users');
    }

    public function updateBueno(Request $request){
        $post = User::findOrFail($request->id);

        $request->validate([
            'nombre' => 'required|alpha',
            'email' => 'required|email|unique:users,email,'.$request->id,
            'apellido' => 'required',
            'password' => 'required|regex:/^.(?=.*[a-zA-Z])(?=.*[0-9]).*$/',
            'telefono' => 'required|unique:users,telefono,'.$request->id,
            'DNI' => 'required|unique:users,DNI,'.$request->id,
        ]);

        $post->email =$request->email;
        $post->nombre =$request->nombre;
        $post->apellido =$request->apellido;
        $post->password = Hash::make($request->password);
        $post->telefono =$request->telefono;
        $post->DNI =$request->DNI;
        $post->tipoUsuario =$post->tipoUsuario;
        $post->agency_id =$post->agency_id;
        $post->update();
        return redirect()->route('user.showBueno', ['id' => Auth::user()->id]);
    }


    public function create(Request $request){
        $post = new User;

        $request->validate([
            'nombre' => 'required|alpha',
            'email' => 'required|email|unique:users,email',
            'apellido' => 'required',
            'password' => 'required|regex:/^.(?=.*[a-zA-Z])(?=.*[0-9]).*$/',
            'telefono' => 'required|unique:users,telefono',
            'DNI' => 'required|unique:users,DNI',
            'tipoUsuario' => 'required',
            'agency_id' => 'required|exists:agencies,id',

        ]);
        $post->email =$request->email;
        $post->nombre =$request->nombre;
        $post->apellido =$request->apellido;
        $post->password =Hash::make($request->password);
        $post->telefono =$request->telefono;
        $post->DNI =$request->DNI;
        $post->tipoUsuario =$request->tipoUsuario;
        $post->agency_id = $request->agency_id;
        $post->save();
        return redirect('users');
    }

    public function erase($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('users');
    }
}
