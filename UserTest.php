<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testCreateUser(): void
    {
        //Arrange
        $data = [
            'name' => 'My Test Name',
            'email' => 'mytest@email.com',
            'password' => 'Harley81',
            'password_confirmation' => 'Harley81',
        ];
        //Act
        $response = $this->post('/users', $data);

        //Assert
        $response->assertRedirect('/users');

        $this->assertDatabaseHas('users', ['name'=> $data['name'], 'email'=>$data['email']]);
    }

    public function testUpdateUser(): void
    {
        //Arrange
        $data = [
            'name' => 'My Test Name',
            'email' => 'myTest@email.com',
            'password' => 'Harley81',
            'password_confirmation' => 'Harley81',
        ];

        $user = User::factory()->create();

        //Act
        $response = $this->patch('/users/' . $user->getRouteKey(), $data);

        //Assert
        $response->assertRedirect('/users');

        $this->assertDatabaseHas('users', [
            'id' => $user->getKey(),
            'name' => $data['name'],
            'email' => $data['email'],
        ]);
    }

    public function testDeleteUser(): void
    {
        //Arrange
        $user = User::factory()->create();

        //Act
        $response = $this->delete('/users/' . $user->getRouteKey());

        //Assert
        $this->AssertModelMissing($user);

        $response->assertRedirect('/users');

    }

}
