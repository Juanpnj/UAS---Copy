<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil</title>
</head>

<body>
    <div>
        <a href="{{route('kriteria.index')}}">Kriteria</a>
        <a href="{{ route('result.create') }}">create</a>
        <form action="{{ route('result.hapus') }}" method="POST" style="display:inline-block;">
            @csrf
            <button type="submit">Delete</button>
        </form>
        <form action="{{ route('result.hitung') }}" method="POST" style="display:inline-block;">
            @csrf
            <button type="submit">Hitung</button>
        </form>
    </div>
    @forelse ($options as $a)
        <table border="2">
            <tr>
                <th>{{ $a->alternatif }}</th>

                @forelse ($kriterias as $kriteria)
                    <th>{{ $kriteria->kodekrit }}</th>
                    <th>H(d)</th>
                @empty
                @endforelse
            </tr>
            @forelse ($options as $b)
                @if ($a != $b)
                    <tr>
                        <td>{{ $a->alternatif }}, {{ $b->alternatif }}</td>
                        @foreach ($kriterias as $kriteria)
                            @foreach ($prefs as $pref)
                                @if ($pref->ida == $a->id && $pref->idb == $b->id && $pref->idkrit == $kriteria->id)
                                    <td>{{ $pref->bobot }}</td>
                                    <td>{{ $pref->hd }}</td>
                                @endif
                            @endforeach
                            
                        @endforeach

                    </tr>
                @endif

            @empty
            @endforelse
        </table>
    @empty

    @endforelse
    <table border="2">
        <tr>
            <th>Alternatif</th>
            <th>Leaving Flow</th>
            <th>Entering Flow</th>
            <th>Net Flow</th>
        </tr>
        @forelse ($results as $result)
            <tr>
                <td>{{ $result->alternatif }}</td>
                <td>{{ $result->leavingflow }}</td>
                <td>{{ $result->enteringflow }}</td>
                <td>{{ $result->netflow }}</td>
                <td>{{ $result->rank }}</td>
            </tr>
        @empty
        @endforelse
    </table>
</body>

</html>
