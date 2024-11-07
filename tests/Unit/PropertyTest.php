<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Property;

class PropertyTest extends TestCase
{
    /**
     * A test of query.
     *
     * @return void
     */
    public function testQuery()
    {
        $tipos = [];
        $esperado = ['chalet', 'chalet', 'apartamento'];
        $properties = Property::all();

        foreach($properties as $property)
        {
            $tipos[] = $property->tipoPropiedad;
        }
        
        $this->assertEquals($esperado, $tipos);
    }

    /**
     * A test of Insert.
     *
     * @return void
     */
    public function testInsert()
    {   
        $property = new Property;

        $property->precio = 250;
        $property->dormitorios = 5;
        $property->banyos = 8;
        $property->m2 = 1596.88;
        $property->tipoPropiedad = 'estudio';
        $property->tipoOperacion = 'venta';
        $property->ciudad = 'Alicante';
        $property->cp = '04567';
        $property->user_id = 1;
        
        $property->save();

        $idBorrar = $property->id;
        
        $this->assertDatabaseHas('properties', [ 'id' => $idBorrar, ]);

        $affectedRows = Property::where('id','=',$idBorrar)->delete();
    }

    /**
     * A test of Delete.
     *
     * @return void
     */
    public function testDelete()
    {   
        $property = new Property;

        $property->precio = 250;
        $property->dormitorios = 5;
        $property->banyos = 8;
        $property->m2 = 1596.88;
        $property->tipoPropiedad = 'estudio';
        $property->tipoOperacion = 'venta';
        $property->ciudad = 'Alicante';
        $property->cp = '04567';
        $property->user_id = 1;
        
        $property->save();

        $idBorrar = $property->id;

        $affectedRows = Property::where('id','=', $idBorrar)->delete();

        $this->assertDatabaseMissing('properties', [ 'id' => $idBorrar, ]);
    }

    /**
     * A test of Update.
     *
     * @return void
     */
    public function testUpdate()
    {   
        $property = Property::find(1);
        
        $property->tipoPropiedad = 'casa de campo';
        $property->save();

        $tipoPropiedadReal = $property->tipoPropiedad;
        $tipoPropiedadEsperado = 'casa de campo';

        $this->assertEquals($tipoPropiedadEsperado, $tipoPropiedadReal);

        $property->tipoPropiedad = 'chalet';
        $property->save();
    }

    /**
     * A test of Relation with Users.
     *
     * @return void
     */
    public function testRelacionUsers()
    {   
        $propiedad_UserReal = Property::find(1)->user->email;
        $propiedad_UserEsperado = 'lucas@gmail.com';

        $this->assertEquals($propiedad_UserEsperado, $propiedad_UserReal);
    }
}
