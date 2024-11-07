<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Property;
use App\Models\Operation;

class OperationTest extends TestCase
{
    /**
     * A test of query.
     *
     * @return void
     */
    public function testQuery()
    {
        $tipos = [];
        $esperado = ['venta', 'alquiler'];
        $operations = Operation::all();

        foreach($operations as $operation)
        {
            $tipos[] = $operation->tipoOperacion;
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
        $operation = new Operation;

        $operation->property_id = 2;
        $operation->tipoOperacion = 'alquiler';
        $operation->fecha = '2022-03-08';
        
        $operation->save();

        $idBorrar = $operation->id;
        
        $this->assertDatabaseHas('operations', [ 'id' => $idBorrar, ]);

        $affectedRows = Operation::where('id','=',$idBorrar)->delete();
    }

    /**
     * A test of Delete.
     *
     * @return void
     */
    public function testDelete()
    {   
        $operation = new Operation;

        $operation->property_id = 2;
        $operation->tipoOperacion = 'alquiler';
        $operation->fecha = '2022-03-08';
        
        $operation->save();

        $idBorrar = $operation->id;

        $affectedRows = operation::where('id','=', $idBorrar)->delete();

        $this->assertDatabaseMissing('operations', [ 'id' => $idBorrar, ]);
    }

    /**
     * A test of Update.
     *
     * @return void
     */
    public function testUpdate()
    {   
        $operation = Operation::find(1);
        
        $operation->tipoOperacion = 'alquiler';
        $operation->save();

        $tipoOperacionReal = $operation->tipoOperacion;
        $tipoOperacionEsperado = 'alquiler';

        $this->assertEquals($tipoOperacionEsperado, $tipoOperacionReal);

        $operation->tipoOperacion = 'venta';
        $operation->save();
    }

    /**
     * A test of Relation with Properties.
     *
     * @return void
     */
    public function testRelacionProperties()
    {   
        $operacion_propiedadReal = Operation::find(1)->property->tipoPropiedad;
        $operacion_propiedadEsperado = 'chalet';

        $this->assertEquals($operacion_propiedadEsperado, $operacion_propiedadReal);
        
        $operacion_propiedadReal2 = Operation::find(1)->property->ciudad;
        $operacion_propiedadEsperado2 = 'alicante';
        
        $this->assertEquals($operacion_propiedadEsperado2, $operacion_propiedadReal2);
    }

    /**
     * A test of Relations of three entities.
     *
     * @return void
     */
    public function testRelacionPropertiesUsers()
    {   
        $operacion_userReal = Operation::find(1)->property->user->email;
        $operacion_userEsperado = 'lucas@gmail.com';

        $this->assertEquals($operacion_userEsperado, $operacion_userReal);
        
        $operacion_userReal2 = Operation::find(1)->property->user->DNI;
        $operacion_userEsperado2 = '12345678A';
        
        $this->assertEquals($operacion_userEsperado2, $operacion_userReal2);
    }
}