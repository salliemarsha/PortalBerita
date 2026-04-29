<h1>Data Kategori</h1>

@if(session('success'))
    <div style="color:green;">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('categories.create') }}">Tambah</a>

<table border="1">
    <tr>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>

    @foreach($categories as $c)
    <tr>
        <td>{{ $c->name }}</td>
        <td>
            <a href="{{ route('categories.edit', $c->id) }}">Edit</a>

            <form action="{{ route('categories.destroy', $c->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>