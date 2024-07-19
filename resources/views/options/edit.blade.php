<!DOCTYPE html>
<html>

<head>
    <title>Edit Kriteria</title>
</head>

<body>
    <h1>Edit Kriteria</h1>
    <form action="{{ route('option.update', $option->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nama">Name:</label>
        <input type="text" name="nama" id="nama" value="{{ $option->alternatif }}">
        @forelse ($kriterias as $kriteria)
            <label for="{{ $kriteria->kodekrit }}">{{ $kriteria->kodekrit }} :</label>
            @foreach ($bobots as $bobot)
                @if ($bobot->idkrit == $kriteria->id)
                    <input type="text" name="{{ $kriteria->kodekrit }}" id="{{ $kriteria->kodekrit }}"
                        value="{{ $bobot->bobot }}">
                @endif
            @endforeach

        @empty
        @endforelse
        <button type="submit">Submit</button>
    </form>
</body>

</html>
