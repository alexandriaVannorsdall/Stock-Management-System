<?php

namespace Tests\Feature;

use App\Models\Inventory;
use Tests\TestCase;

class InventoryApiTest extends TestCase
{
    public function testShowInventory()
    {
        //Arrange
        $inventory = Inventory::factory()->create();

        //Act
        $response = $this->getJson('/api/inventories/' . $inventory->getRouteKey());
        //Assert
        $response
            ->assertStatus(200)
            ->assertExactJson([
                'data' => [
                    'id' => $inventory->getRouteKey(),
                    'title' => $inventory->title,
                    'description' => $inventory->description,
                    'price' => $inventory->price,
                    'in_stock' => $inventory->in_stock,
                    'on_sale' => $inventory->on_sale,
                ],
            ]);
    }

    public function testStoreInventory()
    {
        //Arrange
        $data = [
            'data' => [
                'title' => 'My Test Inventory',
                'description' => '...',
                'price' => '100',
                'on_sale' => true,
                'in_stock' => '99',
            ],
        ];

        //Act
        $response = $this->postJson('/api/inventories/', $data);

        //Assert
        $response
            ->assertStatus(201)
            ->assertJson($data);

        $this->assertDatabaseHas('inventories', $data['data']);
    }

    public function testUpdateInventory()
    {
        //Arrange
        $data = [
            'data' => $expected = [
                'title' => 'My Test Inventory',
                'description' => '...',
                'price' => '100',
                'on_sale' => true,
                'in_stock' => '99',
            ],
        ];

        $inventory = Inventory::factory()->create();

        //Act
        $response = $this->patchJson('/api/inventories/' . $inventory->getRouteKey(), $data);

        //Assert
        $this->assertDatabaseHas('inventories', [
            'id' => $inventory->getKey(),
            'title' => $expected['title'],
            'description' => $expected['description'],
            'price' => $expected['price'],
            'on_sale' => $expected['on_sale'],
            'in_stock' => $expected['in_stock'],
        ]);

        $response
            ->assertStatus(200)
            ->assertJson($data);
    }

    public function testDeleteInventory()
    {
        //Arrange
        $inventory = Inventory::factory()->create();

        //Act
        $response = $this->deleteJson('/api/inventories/' . $inventory->getRouteKey());

        //Assert
        $this->assertModelMissing($inventory);

        $response->assertStatus(204);
    }

}

