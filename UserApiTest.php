<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    public function testShowUser()
    {
        //Arrange
        $user = User::factory()->create();

        //Act
        $response = $this->getJson('/api/users/' . $user->getRouteKey());

        //Assert
        $response
            ->assertStatus(200)
            ->assertExactJson([
                'data' => [
                    'id' => $user->getRouteKey(),
                    'name' => $user->name,
                    'email' => $user->email,
                ],
            ]);
    }

    public function testStoreUser()
    {
        //Arrange
        $data = [
            'data' => [
                'name' => 'Testing Name',
                'email' => 'myTesting@email.com',
                'password' => 'Harley81',
            ],
        ];

        //Act
        $response = $this->postJson('/api/users/', $data);

        //Assert
        $response
            ->assertStatus(201)
            ->assertJson([
                'data' => [
                    'name' => $data['data']['name'],
                    'email' => $data['data']['email'],
                ]
            ]);

        $this->assertDatabaseHas('users', [
            'name'=>$data['data']['name'],
            'email'=>$data['data']['email'],
        ]);
    }

    public function testUpdateUser()
    {
        //Arrange
        $data = [
            'data' => $expected = [
                'name' => 'Testing Name',
                'email' => 'myTesting@email.com',
            ],
        ];

        $user = User::factory()->create();

        //Act
        $response = $this->patchJson('/api/users/' . $user->getRouteKey(), $data);

        //Assert
        $this->assertDatabaseHas('users', [
            'id' => $user->getKey(),
            'name' => $expected['name'],
            'email' => $expected['email'],
        ]);

        $response
            ->assertStatus(200)
            ->assertJson($data);
    }

    public function testDeleteUser()
    {
        //Arrange
        $user = User::factory()->create();

        //Act
        $response = $this->deleteJson('/api/users/' . $user->getRouteKey());

        //Assert
        $this->assertModelMissing($user);

        $response->assertStatus(204);
    }
}
