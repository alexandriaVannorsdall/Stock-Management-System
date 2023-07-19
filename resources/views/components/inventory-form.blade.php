<form action="{{ $action }}" method="post">
    @if($inventory)
        @method('patch')
    @endif
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Enter an item name:</label>
        <input id="title" type="text" name="title" class="form-control" value="{{ old('title') ?? $inventory?->title }}" required />
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Enter the item's description:</label>
        <textarea id="description" name="description" class="form-control" rows="5" required>{{ old('description') ?? $inventory?->description }}</textarea>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Enter the item's price:</label>
        <input id="price" class="form-control" type="number" name="price" value="{{ old('price') ?? $inventory?->price }}" required/>
    </div>

    <div class="mb-3">
        <label for="in_stock" class="form-label">Enter a number of items in stock:</label>
        <input id="in_stock" type="number" name="in_stock" class="form-control" value="{{ old('in_stock') ?? $inventory?->in_stock }}" required/>
    </div>

    <div class="mb-3">
        <label for="on_sale" class="form-label">Select yes/no if item is on sale:</label>
        <select id="on_sale" name="on_sale" class="form-select" required>
            <option value="" disabled {{ (null === $onSale()) ? 'selected' : '' }}>--Please choose an option--</option>
            <option value="1" {{ (true === $onSale()) ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ (false === $onSale()) ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-secondary">Submit</button>
    </div>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
