<!DOCTYPE html>
<html>
<head>
    <title>Create Kriteria</title>
</head>
<body>
    <h1>Create Kriteria</h1>
    <form action="{{ route('kriteria.store') }}" method="POST">
        @csrf
        <label for="nama">Nama Kriteria:</label>
        <input type="text" name="nama" id="nama">
        <label for="kode">Kode :</label>
        <input type="text" name="kode" id="kode">
        <button type="submit">Submit</button>
    </form>
</body>
</
