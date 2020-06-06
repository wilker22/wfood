<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * Error create new client
     *
     * @return void
     */
    public function testErrorCreateNewClient()
    {
        $payload = [
            'name' => 'wilker alves',
            'email' => 'wilker22@gmail.com',
        ];

        $response = $this->postJson('/api/auth/register', $payload);

        $response->assertStatus(422);
                    // ->assertExactJson([
                    //     'messages'=> 'The given data was invalid',
                    //     'errors'  => [
                    //         'password' => [trans('validation.required', ['attribute' => 'password'])],
                    //     ]
                    // ]);
    }

    /**
     * Succes create new client
     *
     * @return void
     */
    public function testSuccessCreateNewClient()
    {
        $payload = [
            'name' => 'wilker alves',
            'email' => 'wilker22@gmail.com',
            'password' => '123456'
        ];

        $response = $this->postJson('/api/auth/register', $payload);

        $response->assertStatus(201)
                        ->assertExactJson([
                             'data'=> [
                                    'name' => $payload['name'],
                                    'email' => $payload['email'],
                            ]

                ]);
    }
}
