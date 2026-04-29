<h1>Edit Produk</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $product->name }}"><br><br>

    <select name="category_id">
        @foreach($categories as $c)
            <option value="{{ $c->id }}" 
                {{ $product->category_id == $c->id ? 'selected' : '' }}>
                {{ $c->name }}
            </option>
        @endforeach
    </select><br><br>

    <input type="number" name="stock" value="{{ $product->stock }}"><br><br>
    <input type="number" name="price" value="{{ $product->price }}"><br><br>

    <button type="submit">Update</button>
</form>