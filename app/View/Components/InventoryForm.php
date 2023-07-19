<?php

namespace App\View\Components;

use App\Models\Inventory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class InventoryForm extends Component
{
    /**
     * @var Inventory|null
     */
    public $inventory;

    /**
     * @var ViewErrorBag
     */
    public $errors;

    /**
     * @param Inventory|null $inventory
     * @param ViewErrorBag $errors
     */
    public function __construct(?Inventory $inventory, ViewErrorBag $errors)
    {
        $this->inventory = $inventory;
        $this->errors = $errors;
    }

    /**
     * @return string
     */
    public function action(): string
    {
        if ($this->inventory) {
            return route('inventories.update', ['inventory' => $this->inventory]);
        }
        return route('inventories.store');
    }

    /**
     * @return bool|null
     */
    public function onSale(): ?bool
    {
        $old = old('on_sale');

        if (null === $old) {
            return $this->inventory?->on_sale;
        }

        return (bool) $old;
    }

    /**
     * Get the view / contents that represent the component.
     *
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.inventory-form');
    }
}
