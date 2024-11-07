<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operation;
use App\Models\Property;

class OperationController extends Controller
{
    public function show($id) {
        $operation = Operation::findOrFail($id);
        return view('operation', ['operation' => $operation]);
    }
    
    public function showAll($by=null) {
        if($by==null){
            $operations = Operation::paginate(10);
        }
        else{
            $operations = Operation::orderBy($by)->paginate(10);
        }
        
        return view('operations', ['operations' => $operations]);
    }

    public function formulario() {
        $tipos = array_keys(config('enums_Operacion.tipoOperacion'));
        $properties = Property::paginate(10);

        return view('addoperation',['tipos' => $tipos, 'properties' => $properties]);
    }

    public function create(Request $request){
        //No funciona
        $post = new Operation;

        $request->validate([
            'tipoOperacion' => 'required',
            'property_id' => 'required|exists:properties,id',
            'fecha' => 'required|date',
        ]);

        $post->tipoOperacion =$request->tipoOperacion;
        $post->property_id =$request->property_id;
        $post->fecha =$request->fecha;
        $post->save();
        
        return redirect('operations');
    }

    public function erase($id){
        $operation = Operation::findOrFail($id);
        $operation->delete();

        return redirect('operations');
    }

    public function modificar_formulario($id) {
        $operation = Operation::findOrFail($id);
        $properties = Property::paginate(10);

        $tipos = array_keys(config('enums_Operacion.tipoOperacion'));
        return view('modoperation', ['operation' => $operation, 'tipos' => $tipos, 'properties' => $properties]);
    }

    public function modificar(Request $request){
        
        $post = Operation::findOrFail($request->id);
        
        $request->validate([
            'tipoOperacion' => 'required',
            'property_id' => 'required|exists:properties,id',
            'fecha' => 'required|date',
        ]);

        $post->tipoOperacion =$request->tipoOperacion;
        $post->property_id =$request->property_id;
        $post->fecha =$request->fecha;
        $post->update();
        return redirect('operations');
    }
}
