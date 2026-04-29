<h1>Transaksi Stok</h1>

<h2>Barang Masuk</h2>

<form action="/stock-in" method="POST">
    @csrf

    <select name="product_id">
        @foreach($products as $p)
            <option value="{{ $p->id }}">{{ $p->name }}</option>
        @endforeach
    </select>

    <input type="number" name="quantity" placeholder="Jumlah">
    <input type="date" name="date">

    <button type="submit">Simpan</button>
</form>

<hr>

<h2>Barang Keluar</h2>

<form action="/stock-out" method="POST">
    @csrf

    <select name="product_id">
        @foreach($products as $p)
            <option value="{{ $p->id }}">{{ $p->name }}</option>
        @endforeach
    </select>

    <input type="number" name="quantity" placeholder="Jumlah">
    <input type="date" name="date">

    <button type="submit">Keluar</button>
</form>