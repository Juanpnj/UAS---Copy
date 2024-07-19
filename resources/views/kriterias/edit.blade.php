<!DOCTYPE html>
<html>
<head>
    <title>Edit Kriteria</title>
</head>
<body>
    <h1>Edit Kriteria</h1>
    <form action="{{ route('kriteria.update', $kriterias->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="nama">Name:</label>
        <input type="text" name="nama" id="nama" value="{{ $kriterias->namakrit }}">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
