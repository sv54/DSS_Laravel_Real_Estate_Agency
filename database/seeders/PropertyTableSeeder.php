<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\User;
class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $property = new Property
        ([
            'precio' => 300000.00,
            'dormitorios' => 4,
            'banyos' => 3,
            'm2' => 240.00,
            'tipoPropiedad'=>'Chalet',
            'tipoOperacion'=>'Venta',
            'ciudad'=>'Alicante',
            'desc' => 'Bonito chalet en Alicante con 4 dormitorios y 240m2, oportunidad unica!',
            'cp' => '04567',
            'user_id'=>1
        ]);
        $property->save();

        $property = new Property
        ([
            'precio' => 1000000.00,
            'dormitorios' => 5,
            'banyos' => 4,
            'm2' => 420.00,
            'tipoPropiedad'=>'Chalet',
            'tipoOperacion'=>'Venta',
            'ciudad'=>'Barcelona',
            'desc' => 'Unico chalet en Barcelona con 5 dormitorios y 420m2, no te lo pierdas!!',
            'cp' => '05567',
            'user_id'=>1
        ]);
        $property->save();

        $property = new Property
        ([
            'precio' => 1200.00,
            'dormitorios' => 2,
            'banyos' => 2,
            'm2' => 150.00,
            'tipoPropiedad'=>'Apartamento',
            'tipoOperacion'=>'Alquiler',
            'ciudad'=>'Madrid',
            'desc' => 'Lujoso Apartamento en Madrid para larga temporada con 2 dormitorios y 150m2.',
            'cp' => '04967',
            'user_id'=>1
        ]);
        $property->save();

        $property = new Property
        ([
            'precio' => 13200.00,
            'dormitorios' => 2,
            'banyos' => 2,
            'm2' => 100.00,
            'tipoPropiedad'=>'Apartamento',
            'tipoOperacion'=>'Alquiler',
            'ciudad'=>'Madrid',
            'desc' => 'Apartamento en centro de Madrid para larga temporada con 2 dormitorios y 100m2.',
            'cp' => '04967',
            'user_id'=>1
        ]);
        $property->save();


        $property = new Property
        ([
            'precio' => 500.00,
            'dormitorios' => 2,
            'banyos' => 1,
            'm2' => 70.00,
            'tipoPropiedad'=>'Apartamento',
            'tipoOperacion'=>'Alquiler',
            'ciudad'=>'Barcelona',
            'desc' => 'Apartamento barato en Barcelona para larga temporada con 2 dormitorios y 70m2.',
            'cp' => '04967',
            'user_id'=>2
        ]);
        $property->save();


        $property = new Property
        ([
            'precio' => 1200000.00,
            'dormitorios' => 4,
            'banyos' => 2,
            'm2' => 150.00,
            'tipoPropiedad'=>'Chalet',
            'tipoOperacion'=>'Venta',
            'ciudad'=>'Madrid',
            'desc' => 'Lujoso Chalet en Alicante para venta de 4 dormitorios, entra para más detalle.',
            'cp' => '04967',
            'user_id'=>3
        ]);
        $property->save();

        $property = new Property
        ([
            'precio' => 1200.00,
            'dormitorios' => 3,
            'banyos' => 3,
            'm2' => 150.00,
            'tipoPropiedad'=>'Apartamento',
            'tipoOperacion'=>'Alquiler',
            'ciudad'=>'Madrid',
            'desc' => 'Apartamento en Madrid para larga temporada con espacio de sobra y en pleno centro de la ciudad;',
            'cp' => '04967',
            'user_id'=>1
        ]);
        $property->save();

        $property = new Property
        ([
            'precio' => 800000.00,
            'dormitorios' => 5,
            'banyos' => 2,
            'm2' => 150.00,
            'tipoPropiedad'=>'Chalet',
            'tipoOperacion'=>'Venta',
            'ciudad'=>'Alicante',
            'desc' => 'Lujoso Chalet en alicante para vender, un poco lejos pero recien hechas las obras.',
            'cp' => '03000',
            'user_id'=>2
        ]);
        $property->save();

        $property = new Property
        ([
            'precio' => 850000.00,
            'dormitorios' => 5,
            'banyos' => 5,
            'm2' => 250.00,
            'tipoPropiedad'=>'Chalet',
            'tipoOperacion'=>'Venta',
            'ciudad'=>'Alicante',
            'desc' => 'Chalet en alicante con vistas al mar!.',
            'cp' => '03000',
            'user_id'=>3
        ]);
        $property->save();

        $property = new Property
        ([
            'precio' => 860000.00,
            'dormitorios' => 6,
            'banyos' => 5,
            'm2' => 260.00,
            'tipoPropiedad'=>'Chalet',
            'tipoOperacion'=>'Venta',
            'ciudad'=>'Alicante',
            'desc' => 'Chalet con vistas al bosque, piscina y supermercado cerca! Unete con naturaleza.',
            'cp' => '03000',
            'user_id'=>3
        ]);
        $property->save();

        $property = new Property
        ([
            'precio' => 870000.00,
            'dormitorios' => 4,
            'banyos' => 3,
            'm2' => 180.00,
            'tipoPropiedad'=>'Chalet',
            'tipoOperacion'=>'Venta',
            'ciudad'=>'Barcelona',
            'desc' => 'Chalet en Barcelona con vistas y a 20 minutos de la ciudad para vender.',
            'cp' => '03000',
            'user_id'=>3
        ]);
        $property->save();

    }
}
