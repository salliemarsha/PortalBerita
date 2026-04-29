<h1>Tambah Kategori</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nama kategori">
    <button type="submit">Simpan</button>
</form>