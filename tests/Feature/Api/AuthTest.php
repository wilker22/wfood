<?php

namespace Tests\Feature\Api;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class AuthTest extends TestCase
{
    /**
     * Test  Auth with user fake
     *
     * @return void
     */
    public function testAuthClientFake()
    {
        $payload = [
            'email' => 'fakeemail@eti.com.br',
            'password' => '1232131',
            'device_name' => Str::random(10),
        ];

        $response = $this->postJson('/api/auth/token', $payload);

        $response->assertStatus(404)
                    ->assertExactJson([
                        'message' => trans('messages.invalid_credentials')
                    ]);
    }

        /**
     * Test  Auth success
     *
     * @return void
     */
    public function testAuthSuccess()
    {
        $client = factory(Client::class)->create();
        $payload = [
            'email' => $client->email,
            'password' => 'password',
            'device_name' => Str::random(10),
        ];

        $response = $this->postJson('/api/auth/token', $payload);
        $response->dump();
        $response->assertStatus(200)->assertJsonStructure(['token']);

    }

     /**
     * Error get Me
     *
     * @return void
     */
    public function testErrorGetMe()
    {

        $response = $this->getJson('/api/auth/me');

        $response->assertStatus(401);

    }


    /**
     * Error get Me
     *
     * @return void
     */
    public function testGetMe()
    {
        $client = factory(Client::class)->create();
        $token = $client->createToken(Str::random(10))->plainTextToken;
        $response = $this->getJson('/api/auth/me', [
            'Authorization' => "Bearer {$token}",
        ]);

        $response->assertStatus(200)
                        ->assertExactJson([
                            'data' => [
                                'name' => $client->name,
                                'email' => $client->email
                            ]
                        ]);

    }


    /**
     * Logout
     *
     * @return void
     */
    public function testLogout()
    {
        $client = factory(Client::class)->create();
        $token = $client->createToken(Str::random(10))->plainTextToken;
        $response = $this->postJson('/api/auth/logout', [], [
            'Authorization' => "Bearer {$token}",
        ]);

        $response->assertStatus(204);

    }
}
