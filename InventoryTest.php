<?php

namespace Tests\Feature;

use App\Models\Inventory;
use Tests\TestCase;

class InventoryTest extends TestCase
{

    public function testCreateInventory(): void
    {
        // Arrange
        $data = [
            'title' => 'My Test Inventory',
            'description' => '...',
            'price' => '100',
            'on_sale' => '1',
            'in_stock' => '99',
        ];

        // Act
        $response = $this->post('/inventories', $data);

        // Assert
        $response->assertRedirect('/inventories');

        $this->assertDatabaseHas('inventories', $data);
    }

    public function testUpdateInventory(): void
    {
        // Arrange
        $data = [
            'title' => 'My Test Inventory',
            'description' => '...',
            'price' => '100',
            'on_sale' => '1',
            'in_stock' => '99',
        ];

        $inventory = Inventory::factory()->create();

        // 1. the inventory must be in the database.
        // 2. the data we are submitting (i.e. what the user typed into the form) - which is different from the data in
        // the database.

        // Act
        $response = $this->patch('/inventories/' . $inventory->getRouteKey(), $data);

        // Do a patch request, /inventories/{inventory_id}.

        // Assert
        $this->assertDatabaseHas('inventories', [
            'id' => $inventory->getKey(),
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
            'on_sale' => $data['on_sale'],
            'in_stock' => $data['in_stock'],
        ]);

        $response->assertRedirect('/inventories');

        // 1. the database row has changed.
        // 2. the response is a redirect to /inventories.
    }

    public function testDeleteInventory(): void
    {
        //Arrange
        $inventory = Inventory::factory()->create();

        //Act
        $response = $this->delete('/inventories/' . $inventory->getRouteKey());

        //Assert

        $this->assertModelMissing($inventory);

        $response->assertRedirect('/inventories');

    }
}
