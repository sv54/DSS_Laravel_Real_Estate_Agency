<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agency;
use App\Models\User;

use DB;

class AgencyController extends Controller
{
    public function show($id) {
        $agency = Agency::findOrFail($id);
        $agents=DB::table('users');
        $agents = $agents->where('agency_id', $id);
        $agents=$agents->paginate(3,['*'],'agents');

        $properties=DB::table('properties');
        $properties = $properties->whereIn('user_id',function($ids) use($id){
            $ids->select('id')->from('users')->where('agency_id',$id);
        });
        $properties=$properties->paginate(5,['*'],'properties');
        $nombre = null;
        $encontrado = false;
        $photos = DB::table('photos')->get();

        return view('agency', ['agency' => $agency,'agents'=>$agents,'properties'=>$properties,'nombre'=>$nombre,'encontrado'=>$encontrado,'photos'=>$photos]);
    }

    public function showAll($by=null) {
        if($by==null){
            $agencies = Agency::paginate(5);
        }
        else{
            $agencies = Agency::orderBy($by)->paginate(5);
        }
        return view('agencies', ['agencies' => $agencies]);
    }

    public function showAllPublic($by=null) {
        $ciudades = array_keys(config('enums_Ciudad.ciudad'));
        if($by==null){
            $agencies = Agency::paginate(5);
        }
        else{
            $agencies = Agency::orderBy($by)->paginate(5);
        }
        return view('agencies_public', ['agencies' => $agencies],['ciudades'=>$ciudades]);
    }

    public function formulario() {
        $ciudades = array_keys(config('enums_Ciudad.ciudad'));

        return view('addagency', ['ciudades' => $ciudades]);
    }

    public function update(Request $request){
        $post = Agency::findOrFail($request->id);
        
        $request->validate([
            'nombre' => 'required',
            'CIF' => 'required|unique:agencies,CIF,'.$request->id,
            'telefono' => 'required|unique:agencies,telefono,'.$request->id,
            'ciudad' => 'required',
            'direccion' => 'required',
            'logo' => 'required',
        ]);

        $post->nombre =$request->nombre;
        $post->CIF =$request->CIF;
        $post->telefono =$request->telefono;
        $post->ciudad =$request->ciudad;
        $post->direccion =$request->direccion;
        $post->logo=$request->logo;


        $post->update();
        return redirect('agencies');
    }

    public function showUpdate($id){
        $agency= Agency::findOrFail($id);
        $ciudades = array_keys(config('enums_Ciudad.ciudad'));

        return view('updateagency', ['agency' => $agency],['ciudades'=>$ciudades]);
    }


    public function create(Request $request){
        $post = new Agency;

        $request->validate([
            'nombre' => 'required',
            'CIF' => 'required',
            'telefono' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'logofile' => 'required',
        ]);

        $post->nombre =$request->nombre;
        $post->CIF =$request->CIF;
        $post->telefono =$request->telefono;
        $post->ciudad =$request->ciudad;
        $post->direccion =$request->direccion;
        

        $fileName = $_FILES['logofile']['name'];
        $fileTmpName = $_FILES['logofile']['tmp_name'];
            
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));


        $fileNameNew = uniqid('',true).".".$fileActualExt;
        $fileDestination = storage_path('app/public/agencies/'.$fileNameNew);
        move_uploaded_file($fileTmpName, $fileDestination);
        
        $post->logo =$fileNameNew;
        $post->save();

        return redirect('agencies');
    }

    public function erase($id){
        $agency = Agency::findOrFail($id);
        $agency->delete();
        return redirect('agencies');
    }


    public function filter(Request $request){
        //agregar tipo de propiedad, m2, banyos
    
    $ciudades = array_keys(config('enums_Ciudad.ciudad'));

    $agencies=DB::table('agencies');

    if(($request->ciudadReq != 0) && ($request->ciudadReq != '-Not Selected-')){
        $agencies = $agencies->where('ciudad', $request->ciudadReq);
    }
    
    $agencies=$agencies->paginate(5);
    
    $agencies->appends(['ciudadReq' => $request->ciudadReq]);

    return view('agencies_public', ['agencies' => $agencies,'ciudades' => $ciudades]);
}
}
