<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $inventories = Inventory::all();
        return view('pages.inventories',[
            "inventories" => $inventories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('pages.inventories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'=> 'required|string',
            'description'=> 'required|string|max:300',
            'price' => 'required|integer|min:0',
            'in_stock' => 'required|integer',
            'on_sale' => 'required|boolean'
        ]);
        $inventory = new Inventory();

        $inventory->fill($validated)->save();

        return redirect('/inventories')->with(
            'status',
            'Successfully created inventory ' . $inventory->title
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function edit(Inventory $inventory): View
    {
        return view('pages.inventories.edit',[
            "inventory" => $inventory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Inventory $inventory
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Inventory $inventory): RedirectResponse
    {
        $validated = $this->validate($request, [
            'title'=> 'required|string',
            'description'=> 'required|string|max:300',
            'price' => 'required|integer|min:0',
            'in_stock' => 'required|integer',
            'on_sale' => 'required|boolean'
        ]);
        $inventory->fill($validated)->save();
        return redirect()->route('inventories.index')->with(
            'status',
            'Successfully updated inventory ' . $inventory->title
        );
    }

    /**
     * @param Inventory $inventory
     * @return View
     */
    public function delete(Inventory $inventory): View
    {
        return view('pages.inventories.delete', ["inventory" => $inventory]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Inventory $inventory
     * @return RedirectResponse
     */
    public function destroy(Inventory $inventory): RedirectResponse
    {
        $inventory->delete();
        return redirect()->route('inventories.index')->with(
            'status',
            'Deleted inventory ' . $inventory->title
        );
    }
}
