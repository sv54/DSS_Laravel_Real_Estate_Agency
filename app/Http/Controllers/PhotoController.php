<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function showAll($by=null) {
        if($by==null){
            $photos = Photo::paginate(10);
        }
        else{
            $photos = Photo::orderBy($by)->paginate(10);
        }
        return view('photos', ['photos' => $photos]);
    }

    public function show($id) {
        $photo = Photo::findOrFail($id);
        return view('photo', ['photo' => $photo]);
    }

    public function erase($id){
        $photo = Photo::findOrFail($id);
        
        if(file_exists(storage_path('app/public/properties/'.$photo->nombre))){
            unlink(storage_path('app/public/properties/'.$photo->nombre));
          }else{
            dd('File does not exists.');
          }
          $photo->delete();
          
          return redirect(('photos'));
    }

    public function eraseAgent(Request $request){
        $photo = Photo::findOrFail($request->photo_id);
        
        if(file_exists(storage_path('app/public/properties/'.$photo->nombre))){
            unlink(storage_path('app/public/properties/'.$photo->nombre));
          }else{
            dd('File does not exists.');
          }
          $photo->delete();
          
          return redirect('properties/updatebyagente/'.$request->prop_id);
    }

    public function addphotos(Request $request){

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
            $foto->property_id = $request->prop_id;
            $foto->nombre = $fileNameNew;
            $foto->save();
            move_uploaded_file($fileTmpName, $fileDestination);
        }
        return redirect('properties/updatebyagente/'.$request->prop_id);

    }
}
