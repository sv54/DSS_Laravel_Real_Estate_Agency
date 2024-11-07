<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agency;

class AgencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $agency = new Agency
        ([
            'nombre' => 'Real Estate Company', 
            'CIF'=>'12584CF',
            'telefono' => 633532566, 
            'ciudad' => 'Alicante',
            'direccion' => 'Av Juan Carlos 24', 
            'logo'=>'1.jpg'
        ]);
        $agency->save();

        $agency = new Agency
        ([
            'nombre' => 'The Property Agency', 
            'CIF'=>'1212eCF1',
            'telefono' => 63321316, 
            'ciudad' => 'Barcelona',
            'direccion' => 'C san juan 2', 
            'logo'=>'2.png'
        ]);
        $agency->save();

        $agency = new Agency
        ([
            'nombre' => 'Real Estate Pro', 
            'CIF'=>'223422CF2',
            'telefono' => 363332366, 
            'ciudad' => 'Alicante',
            'direccion' => 'Calle bolivia 25', 
            'logo'=>'3.jpg'
        ]);
        $agency->save();

        $agency = new Agency
        ([
            'nombre' => 'C&W', 
            'CIF'=>'44435245f',
            'telefono' => 433532566, 
            'ciudad' => 'Madrid',
            'direccion' => 'Av Alicante 2', 
            'logo'=>'4.png'
        ]);
        $agency->save();
        $agency = new Agency
        ([
            'nombre' => 'The Agency Group', 
            'CIF'=>'55555555G',
            'telefono' => 686219477, 
            'ciudad' => 'Madrid',
            'direccion' => 'Av Mar 2', 
            'logo'=>'5.jpg'
        ]);
        $agency->save();

        $agency = new Agency
        ([
            'nombre' => 'Alexis Carlson', 
            'CIF'=>'B12083975',
            'telefono' => 965726594, 
            'ciudad' => 'Madrid',
            'direccion' => 'Carretera 2', 
            'logo'=>'6.jpg'
        ]);
        $agency->save();
    }
}
