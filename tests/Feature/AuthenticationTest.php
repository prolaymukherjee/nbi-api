<?php

use App\Constants\Messages as MessagesConstant;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\postJson;

uses(RefreshDatabase::class);

it('validates the login request', function () {

    $response = postJson('/api/login', []);

    $response->assertStatus(422)
        ->assertJsonStructure([
            'statusCode',
            'error',
            'errorMessage',
            'errorBags',
            'data',
        ])
        ->assertJson([
            'statusCode' => 422,
            'error' => true,
            'errorMessage' => MessagesConstant::VALIDATION_ERROR,
            'errorBags' => [
                'email' => ['The email field is required.'],
                'password' => ['The password field is required.'],
            ],
            'data' => null,
        ]);

    $response = postJson('/api/login', [
        'email' => 'invalid-email',
        'password' => 'password123',
    ]);

    $response->assertStatus(422)
        ->assertJsonStructure([
            'statusCode',
            'error',
            'errorMessage',
            'errorBags',
            'data',
        ])
        ->assertJson([
            'statusCode' => 422,
            'error' => true,
            'errorMessage' => MessagesConstant::VALIDATION_ERROR,
            'errorBags' => [
                'email' => ['The email field must be a valid email address.'],
            ],
            'data' => null,
        ]);
});
