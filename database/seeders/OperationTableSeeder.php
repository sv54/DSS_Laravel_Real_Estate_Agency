<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Operation;
use App\Models\Property;
class OperationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $operation = new Operation
        ([
            'property_id' => 1, 
            'tipoOperacion' => 'Venta',
            'fecha'=>'2022-04-09'
        ]);
        $operation->save();
        
        $operation = new Operation
        ([
            'property_id' => 2, 
            'tipoOperacion' => 'Alquiler',
            'fecha'=>'2022-04-09'
        ]);
        $operation->save();

        $operation = new Operation
        ([
            'property_id' => 2, 
            'tipoOperacion' => 'Alquiler',
            'fecha'=>'2020-04-09'
        ]);
        $operation->save();

        $operation = new Operation
        ([
            'property_id' => 2, 
            'tipoOperacion' => 'Alquiler',
            'fecha'=>'2021-04-09'
        ]);
        $operation->save();

        $operation = new Operation
        ([
            'property_id' => 2, 
            'tipoOperacion' => 'Alquiler',
            'fecha'=>'2018-04-09'
        ]);
        $operation->save();

        $operation = new Operation
        ([
            'property_id' => 3, 
            'tipoOperacion' => 'Alquiler',
            'fecha'=>'2017-04-09'
        ]);
        $operation->save();

        $operation = new Operation
        ([
            'property_id' => 2, 
            'tipoOperacion' => 'Alquiler',
            'fecha'=>'2016-04-09'
        ]);
        $operation->save();

        $operation = new Operation
        ([
            'property_id' => 3, 
            'tipoOperacion' => 'Alquiler',
            'fecha'=>'2015-04-09'
        ]);
        $operation->save();

        $operation = new Operation
        ([
            'property_id' => 2, 
            'tipoOperacion' => 'Venta',
            'fecha'=>'2014-04-09'
        ]);
        $operation->save();

        $operation = new Operation
        ([
            'property_id' => 2, 
            'tipoOperacion' => 'Venta',
            'fecha'=>'2013-04-09'
        ]);
        $operation->save();

        $operation = new Operation
        ([
            'property_id' => 3, 
            'tipoOperacion' => 'Alquiler',
            'fecha'=>'2013-04-09'
        ]);
        $operation->save();

    }
}
