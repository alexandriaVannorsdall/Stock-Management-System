<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InventoryResource;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class InventoryController extends Controller
{
    /**
     * Retrieves a list of inventory.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $inventories = Inventory::all();
        return InventoryResource::collection($inventories);
    }

    /**
     * Display a specific inventory.
     *
     * @param Inventory $inventory
     * @return InventoryResource
     */
    public function show(Inventory $inventory): InventoryResource
    {
        return new InventoryResource($inventory);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return InventoryResource
     */
    public function store(Request $request): InventoryResource
    {
        $validated = $request->validate([
            'data' => 'required|array',
            'data.title'=> 'required|string',
            'data.description'=> 'required|string|max:300',
            'data.price' => 'required|integer|min:0',
            'data.in_stock' => 'required|integer',
            'data.on_sale' => 'required|boolean'
        ]);

        $inventory = new Inventory();

        $inventory->fill($validated['data'])->save();

        return new InventoryResource($inventory);
    }

    /**
     * Updates a specific inventory.
     *
     * @param Request $request
     * @return InventoryResource
     */
    public function update(Request $request, Inventory $inventory): InventoryResource
    {
        $validated = $request->validate([
            'data' => 'required|array',
            'data.title'=> 'required|string',
            'data.description'=> 'required|string|max:300',
            'data.price' => 'required|integer|min:0',
            'data.in_stock' => 'required|integer',
            'data.on_sale' => 'required|boolean'
        ]);

        $inventory->fill($validated['data'])->save();

        return new InventoryResource($inventory);
    }

    /**
     * Deletes a specific inventory.
     *
     * @param Inventory $inventory
     * @return Response
     */
    public function delete(Inventory $inventory): Response
    {
        $inventory->delete();
        return response(null, 204);
    }

}
