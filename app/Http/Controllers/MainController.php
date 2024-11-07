<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Photo;
use DB;


class MainController extends Controller
{
    public function showAll() {
        
        $properties = Property::paginate(10);
        $photos = DB::table('photos')->get();
        $ciudades = array_keys(config('enums_Ciudad.ciudad'));
        $tiposPropiedad = array_keys(config('enums_Propiedad.tipoPropiedad'));
        $nombre = null;
        $encontrado = false;
        //array_push($ciudades, "-Not Selected-");
        return view('main', ['properties' => $properties,'ciudades' => $ciudades, 'tipoPropoiedad' => $tiposPropiedad,
        'photos'=> $photos, 'encontrado'=>$encontrado, 'nombre'=>$nombre]);
    }

    public function filter(Request $request){
            //agregar tipo de propiedad, m2, banyos
        $nombre = null;
        $encontrado = false;
        $photos = DB::table('photos')->get();
        $ciudades = array_keys(config('enums_Ciudad.ciudad'));
        $tiposPropiedad = array_keys(config('enums_Propiedad.tipoPropiedad'));

        $properties=DB::table('properties');

        if($request->get('tipo') != null){
            if(((in_array('venta', $request->get('tipo'))) && !(in_array('alquiler', $request->get('tipo')))) 
            || (!(in_array('venta', $request->get('tipo'))) && (in_array('alquiler', $request->get('tipo'))))){
                $properties = $properties->where('tipoOperacion' , $request->get('tipo'));
            }
        }

        if(($request->ciudadReq != 0) && ($request->ciudadReq != '-Not Selected-')){
            $properties = $properties->where('ciudad', $request->ciudadReq);
        }

        if(!empty($request->input('preciomin'))){
            $properties = $properties->where('precio', '>=' , $request->preciomin);
        }

        if(!empty($request->input('preciomax'))){
            $properties = $properties->where('precio', '<=' , $request->preciomax);
        }

        if(!empty($request->input('numHab'))){
            $properties = $properties->where('dormitorios', '>=' , $request->numHab);
        }
        
        if(($request->tipoPropiedadReq != 0)){
            $properties = $properties->where('tipoPropiedad', $request->tipoPropiedadReq);
        }

        if(!empty($request->input('m2req'))){
            $properties = $properties->where('m2', '>=' , $request->m2req);
        }
        
        $properties=$properties->paginate(10);
        
        $properties->appends(['ciudadReq' => $request->ciudadReq]);
        $properties->appends(['tipo' => $request->tipo]);
        $properties->appends(['preciomin' => $request->preciomin]);
        $properties->appends(['preciomax' => $request->preciomax]);
        $properties->appends(['numHab' => $request->numHab]);
        $properties->appends(['tipoPropiedadReq' => $request->tipoPropiedadReq]);
        $properties->appends(['m2req' => $request->m2req]);

        return view('main', ['properties' => $properties,'ciudades' => $ciudades, 'tipoPropoiedad' => $tiposPropiedad,
        'photos'=> $photos, 'encontrado'=>$encontrado, 'nombre'=>$nombre]);
    }
}
