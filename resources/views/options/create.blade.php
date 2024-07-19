<!DOCTYPE html>
<html>

<head>
    <title>Create Alternatif</title>
</head>

<body>
    <h1>Create Alternatif</h1>
    <form action="{{ route('option.store') }}" method="POST">
        @csrf
        <label for="nama">Nama Alternatif:</label>
        <input type="text" name="nama" id="nama">
        @forelse ($kriterias as $kriteria)
            <label for="{{ $kriteria->kodekrit }}">{{ $kriteria->kodekrit }} :</label>
            <input type="text" name="{{ $kriteria->kodekrit }}" id="{{ $kriteria->kodekrit }}">
        @empty
        @endforelse
        <button type="submit">Submit</button>
    </form>
</body>
</
