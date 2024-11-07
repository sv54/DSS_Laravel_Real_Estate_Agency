<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Photo;
use App\Models\User;
use App\Models\Agency;
use DB;
use Auth;

class PropertyController extends Controller
{
    public function show($id) {
        $property = Property::findOrFail($id);
        $user = User::findOrFail($property->user_id);
        $agency = Agency::findOrFail($user->agency_id);
        $photos = DB::table('photos')->where('property_id', $id)->get();
        return view('property', ['property' => $property, 'photos'=>$photos,
        'user'=>$user, 'agency'=>$agency]);
    }
    
    public function showAll($by=null) {
        if($by==null){
            $properties = Property::paginate(10);
        }
        else{
            $properties = Property::orderBy($by)->paginate(10);
        }
        
        return view('properties', ['properties' => $properties]);
    }

    public function formulario() {
        $tiposPropiedad = array_keys(config('enums_Propiedad.tipoPropiedad'));
        $ciudades = array_keys(config('enums_Ciudad.ciudad'));
        $operaciones = array_keys(config('enums_Operacion.tipoOperacion'));

        return view('addproperty', ['tiposPropiedad' => $tiposPropiedad , 'operaciones' => $operaciones,'ciudades' => $ciudades]);
    }

    public function create(Request $request){
        $prop = new Property;
        

        $request->validate([
            'desc' => 'required|max:500',
            'precio' => 'required|numeric|digits_between:1,1000000000',
            'dormitorios' => 'required|numeric|digits_between:0,10',
            'banyos' => 'required|numeric|digits_between:0,10',
            'tipoPropiedad' => 'required',
            'operaciones' => 'required',
            'ciudad' => 'required',
            'm2' => 'required|numeric|digits_between:1,100000',
            'files' => 'required',
            'files.*'=>'|image|mimes:png,jpeg,jpg,PNG,JPEG,JPG|max:15000'
            //'user_id' => 'required|exists:users,id',

        ]);
        $prop->ciudad =$request->ciudad;
        $prop->precio =$request->precio;
        $prop->m2 =$request->m2;
        $prop->dormitorios =$request->dormitorios;
        $prop->banyos =$request->banyos;
        $prop->cp =$request->cp;
        $prop->tipoPropiedad = $request->tipoPropiedad;
        $prop->tipoOperacion = $request->operaciones;
        //$prop->user_id = $request->user_id;
        $prop->user_id = Auth::user()->id;
        $prop->desc=$request->desc;
        $prop->save();
        $files = $_FILES['files']['name'];
        $iter = 0;
        foreach ($files as $file){
            $foto = new Photo;
            $fileName = $_FILES['files']['name'][$iter];
            $fileTmpName = $_FILES['files']['tmp_name'][$iter];
            $fileSize = $_FILES['files']['size'][$iter];
            //$fileError = $_FILES['files']['error'][$iter];
            $fileType = $_FILES['files']['type'][$iter];
            ++$iter;
            
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));


            $fileNameNew = uniqid('',true).".".$fileActualExt;
            $fileDestination = storage_path('app/public/properties/'.$fileNameNew);
            $foto->property_id = $prop->id;
            $foto->nombre = $fileNameNew;
            $foto->save();
            move_uploaded_file($fileTmpName, $fileDestination);
            
        }
        return redirect('properties');
        
    }
    //Modificar Propiedad
    public function update(Request $request){
        $property = Property::findOrFail($request->id);

        $request->validate([
            'desc' => 'required|max:500',
            'precio' => 'required|numeric|digits_between:1,1000000000',
            'dormitorios' => 'required|numeric|digits_between:0,10',
            'banyos' => 'required|numeric|digits_between:0,10',
            'tipoPropiedad' => 'required',
            'tipoOperacion' => 'required',
            'ciudad' => 'required',
            'm2' => 'required|numeric|digits_between:1,100000'
            //'user_id' => 'required|exists:users,id',

        ]);

        $property->desc =$request->desc;
        $property->precio =$request->precio;
        $property->dormitorios =$request->dormitorios;
        $property->banyos =$request->banyos;
        $property->m2 =$request->m2;
        $property->tipoPropiedad =$request->tipoPropiedad;
        $property->tipoOperacion =$request->tipoOperacion;
        $property->ciudad=$request->ciudad;
        $property->cp=$request->cp;
        $property->update();
        
        return redirect('properties');

    }

    public function updatebyagente(Request $request){
        
        $property = Property::findOrFail($request->id);

        $request->validate([
            'desc' => 'required|max:500',
            'precio' => 'required|numeric|digits_between:1,1000000000',
            'dormitorios' => 'required|numeric|digits_between:0,10',
            'banyos' => 'required|numeric|digits_between:0,10',
            'tipoPropiedad' => 'required',
            'tipoOperacion' => 'required',
            'ciudad' => 'required',
            'm2' => 'required|numeric|digits_between:1,100000'
            //'user_id' => 'required|exists:users,id',

        ]);

        $property->desc =$request->desc;
        $property->precio =$request->precio;
        $property->dormitorios =$request->dormitorios;
        $property->banyos =$request->banyos;
        $property->m2 =$request->m2;
        $property->tipoPropiedad =$request->tipoPropiedad;
        $property->tipoOperacion =$request->tipoOperacion;
        $property->ciudad=$request->ciudad;
        $property->cp=$request->cp;
        $property->update();
        return redirect('user/'.$request->user_id);
    }

    public function showUpdate($id){
        $property= Property::findOrFail($id);

        $tiposPropiedad = array_keys(config('enums_Propiedad.tipoPropiedad'));
        $ciudades = array_keys(config('enums_Ciudad.ciudad'));
        $operaciones = array_keys(config('enums_Operacion.tipoOperacion'));
        $photos = DB::table('photos')->where('property_id', $id)->get();
        return view('updateproperty',['property'=>$property ,'tiposPropiedad' => $tiposPropiedad , 'operaciones' => $operaciones,'ciudades' => $ciudades,'photos'=>$photos]);
    }

    public function showUpdateAgent($id){
        $property= Property::findOrFail($id);

        $tiposPropiedad = array_keys(config('enums_Propiedad.tipoPropiedad'));
        $ciudades = array_keys(config('enums_Ciudad.ciudad'));
        $operaciones = array_keys(config('enums_Operacion.tipoOperacion'));
        $photos = DB::table('photos')->where('property_id', $id)->get();
        return view('updateproperty',['property'=>$property ,'tiposPropiedad' => $tiposPropiedad , 'operaciones' => $operaciones,'ciudades' => $ciudades,'photos'=>$photos]);
    }

    public function erase($id){
        $property = Property::findOrFail($id);
        $property->delete();
        return redirect('properties');
    }

    //Ordenar
}
