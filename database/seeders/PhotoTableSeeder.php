<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Photo;
class PhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photo=new Photo(['nombre'=>'chalet1.jpeg','property_id'=>1]);
        $photo->save();
        $photo=new Photo(['nombre'=>'chalet2.jpeg','property_id'=>1]);
        $photo->save();
        $photo=new Photo(['nombre'=>'chalet3.jpeg','property_id'=>1]);
        $photo->save();
        $photo=new Photo(['nombre'=>'chalet4.jpeg','property_id'=>2]);
        $photo->save();
        $photo=new Photo(['nombre'=>'chalet5.jpeg','property_id'=>2]);
        $photo->save();
        $photo=new Photo(['nombre'=>'apartamento1.jpeg','property_id'=>3]);
        $photo->save();
        $photo=new Photo(['nombre'=>'apartamento2.jpeg','property_id'=>4]);
        $photo->save();
        $photo=new Photo(['nombre'=>'apartamento3.jpeg','property_id'=>3]);
        $photo->save();
        $photo=new Photo(['nombre'=>'apartamento4.jpeg','property_id'=>5]);
        $photo->save();
        $photo=new Photo(['nombre'=>'apartamento5.jpeg','property_id'=>5]);
        $photo->save();
        $photo=new Photo(['nombre'=>'chalet7.jpeg','property_id'=>6]);
        $photo->save();
        $photo=new Photo(['nombre'=>'chalet6.jpeg','property_id'=>4]);
        $photo->save();
        //
    }
}
