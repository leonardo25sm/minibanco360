<?php

/**
 * Permitir validar el registro del usuario 
 *
 */
it('permite registrar un usuario', function () {
    $response = $this->postJson('/api/register', [
        'name' => 'Leonardo',
        'email' => 'leonardo23@example.com',
        'password' => 'secret123',
    ]);
 
    $response->assertStatus(200)
             ->assertJsonStructure(['user', 'token']);
}); 