<h1>Data Produk</h1>

@if(session('success'))
    <div style="color:green;">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('products.create') }}">Tambah</a>

<table border="1">
    <tr>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>

    @foreach($products as $p)
    <tr>
        <td>{{ $p->name }}</td>
        <td>{{ $p->category->name }}</td>
        <td>{{ $p->stock }}</td>
        <td>{{ $p->price }}</td>
        <td>
            <a href="{{ route('products.edit', $p->id) }}">Edit</a>

            <form action="{{ route('products.destroy', $p->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>