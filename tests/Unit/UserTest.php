<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A test of query.
     *
     * @return void
     */
    public function testQuery()
    {
        $nombres = [];
        $esperado = ['Lucas', 'Juan', 'Juan'];
        $users = User::all();

        foreach($users as $user)
        {
            $nombres[] = $user->nombre;
        }
        
        $this->assertEquals($esperado, $nombres);
    }

    /**
     * A test of Insert.
     *
     * @return void
     */
    public function testInsert()
    {   
        $user = new User;
        
        $user->email = 'in@gmail.com';
        $user->password = '12345';
        $user->nombre = 'Pedro';
        $user->apellido = 'Torres García';
        $user->DNI = '99995578A';
        $user->telefono = 633732561;
        $user->tipoUsuario = 'cliente';
        
        $user->save();
        
        $this->assertDatabaseHas('users', [ 'email' => 'in@gmail.com', ]);

        $affectedRows = User::where('email','=','in@gmail.com')->delete();
    }

    /**
     * A test of Delete.
     *
     * @return void
     */
    public function testDelete()
    {   
        $user = new User;
        
        $user->email = 'on@gmail.com';
        $user->password = '12345';
        $user->nombre = 'Pedro';
        $user->apellido = 'Torres García';
        $user->DNI = '99935578A';
        $user->telefono = 633232561;
        $user->tipoUsuario = 'cliente';
        
        $user->save();
        
        $affectedRows = User::where('email','=','on@gmail.com')->delete();

        $this->assertDatabaseMissing('users', [ 'email' => 'on@gmail.com', ]);
    }

    /**
     * A test of Update.
     *
     * @return void
     */
    public function testUpdate()
    {   
        $user = User::find(1);
        
        $user->tipoUsuario = 'cliente';
        $user->save();

        $tipoUsuarioReal = $user->tipoUsuario;
        $tipoUsuarioEsperado = 'cliente';

        $this->assertEquals($tipoUsuarioEsperado, $tipoUsuarioReal);

        $user->tipoUsuario = 'agente';
        $user->save();
    }
}
