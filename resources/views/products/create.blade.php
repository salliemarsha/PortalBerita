<h1>Tambah Produk</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Nama produk"><br><br>

    <select name="category_id">
        @foreach($categories as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
        @endforeach
    </select><br><br>

    <input type="number" name="stock" placeholder="Stok"><br><br>
    <input type="number" name="price" placeholder="Harga"><br><br>

    <button type="submit">Simpan</button>
</form>