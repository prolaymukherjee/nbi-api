<?php

use function Pest\Laravel\postJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('validates the login request', function () {

    $response = postJson('/api/login', []);

    $response->assertStatus(422)
        ->assertJsonStructure([
            'message',
            'errors' => [
                'email',
                'password',
            ],
        ]);

    $response = postJson('/api/login', [
        'email' => 'invalid-email',
        'password' => 'password123',
    ]);

    $response->assertStatus(422)
        ->assertJsonStructure([
            'message',
            'errors' => [
                'email',
            ],
        ]);
});

