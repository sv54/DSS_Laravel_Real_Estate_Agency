<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User
        ([
            'email'=>'admin@gmail.com',
            'password' => Hash::make('admin'),
            'nombre' => 'Administrador', 
            'apellido' => 'admin', 
            'DNI' => '12341234A', 
            'telefono' => '642 642 642', 
            'tipoUsuario'=>'admin',
            'agency_id'=>1
        ]);
        $user->save();

        $user = new User
        ([
            'email'=>'lucas2@gmail.com',
            'password' => Hash::make('12345'),
            'nombre' => 'Lucas', 
            'apellido' => '12345', 
            'DNI' => '123451678A', 
            'telefono' => 633532566, 
            'tipoUsuario'=>'agente',
            'agency_id'=>1
        ]);
        $user->save();

        $user = new User
        ([
            'email'=>'juanq@gmail.com',
            'password' => Hash::make('12345'),
            'nombre' => 'Juan', 
            'apellido' => 'Torres García', 
            'DNI' => '144446278A', 
            'telefono' => 6335325641, 
            'tipoUsuario'=>'agente',
            'agency_id'=>2
        ]);
        $user->save();

        $user = new User
        ([
            'email'=>'martina@gmail.com',
            'password' => Hash::make('12345'),
            'nombre' => 'Juan', 
            'apellido' => 'Torres García', 
            'DNI' => '999953678A', 
            'telefono' => 6335325612, 
            'tipoUsuario'=>'agente',
            'agency_id'=>1
                    
        ]);
        $user->save();

        $user = new User
        ([
            'email'=>'pedros@gmail.com',
            'password' => Hash::make('12345'),
            'nombre' => 'pedro', 
            'apellido' => 'Torres García', 
            'DNI' => '9349956478A', 
            'telefono' => 6335325613, 
            'tipoUsuario'=>'cliente',
            'agency_id'=>3
                    
        ]);
        $user->save();

        $user = new User
        ([
            'email'=>'martin3@gmail.com',
            'password' => Hash::make('12345'),
            'nombre' => 'Martin', 
            'apellido' => 'Torres García', 
            'DNI' => '9999567853A', 
            'telefono' => 36335325614, 
            'tipoUsuario'=>'cliente',
            'agency_id'=>4
                    
        ]);
        $user->save();

        $user = new User
        ([
            'email'=>'jones@gmail.com',
            'password' => Hash::make('12345'),
            'nombre' => 'Jone', 
            'apellido' => 'Navarro', 
            'DNI' => '999956768A', 
            'telefono' => 6335325615, 
            'tipoUsuario'=>'cliente',
            'agency_id'=>5
                    
        ]);
        $user->save();

        $user = new User
        ([
            'email'=>'jorge@gmail.com',
            'password' => Hash::make('12345'),
            'nombre' => 'Jorge Gomez', 
            'apellido' => 'Lopez', 
            'DNI' => '943956787A', 
            'telefono' => 63353243616, 
            'tipoUsuario'=>'cliente',
            'agency_id'=>6
                    
        ]);
        $user->save();

        $user = new User
        ([
            'email'=>'yuta45@gmail.com',
            'password' => Hash::make('12345'),
            'nombre' => 'Jorge', 
            'apellido' => 'Popon', 
            'DNI' => '995456788A', 
            'telefono' => 63355425617, 
            'tipoUsuario'=>'cliente',
            'agency_id'=>6
                    
        ]);
        $user->save();

        $user = new User
        ([
            'email'=>'retan@gmail.com',
            'password' => Hash::make('12345'),
            'nombre' => 'Lucas', 
            'apellido' => 'Kelvos', 
            'DNI' => '123456789A', 
            'telefono' => 6335325668, 
            'tipoUsuario'=>'agente',
            'agency_id'=>3
        ]);
        $user->save();

        $user = new User
        ([
            'email'=>'hash@gmail.com',
            'password' => Hash::make('12345'),
            'nombre' => 'Lee', 
            'apellido' => 'Lee', 
            'DNI' => '123456780A', 
            'telefono' => 6335325669, 
            'tipoUsuario'=>'agente',
            'agency_id'=>3
        ]);
        $user->save();

        $user = new User
        ([
            'email'=>'lnik@gmail.com',
            'password' => Hash::make('12345'),
            'nombre' => 'Nik', 
            'apellido' => 'P', 
            'DNI' => 'y12312312003', 
            'telefono' => 12312312310, 
            'tipoUsuario'=>'admin',
            'agency_id'=>1
        ]);
        $user->save();

    }
}
