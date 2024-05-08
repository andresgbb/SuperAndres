<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase{


    /**
     * Test to ensure user can log in with valid credentials.
     *
     * @return void
     */
    public function testLogin()
    {
        // Creamos un usuario de prueba
        $user = User::factory()->create([
            'email' => 'angabe@gmail.com',
            'password' => bcrypt('1234'),
        ]);

        // Hacemos una solicitud de login con las credenciales válidas
        $response = $this->postJson('/api/login', [
            'email' => 'angabe@gmail.com',
            'password' => '1234',
        ]);

        // Verificamos que la solicitud sea exitosa (código de respuesta 200)
        $response->assertStatus(200);

        // Verificamos que la respuesta contenga el token de acceso
        $response->assertJsonStructure([
            'token',
        ]);
    }
    /**
     * Test to ensure user cannot log in with invalid credentials.
     *
     * @return void
     */
    public function testLoginIncorrect()
    {
        // Creamos un usuario de prueba
        $user = User::factory()->create([
            'email' => 'angabe@gmail.com',
            'password' => bcrypt('1234'),
        ]);

        // Hacemos una solicitud de login con credenciales inválidas
        $response = $this->postJson('/api/login', [
            'email' => 'angabe@gmail.com',
            'password' => 'invalid-password',
        ]);

        // Verificamos que la solicitud falle con un código de respuesta 401 (Unauthorized)
        $response->assertStatus(401);
    }
}

