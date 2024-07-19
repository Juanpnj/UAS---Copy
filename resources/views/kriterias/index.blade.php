<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kriteria</title>
</head>

<body>
    <div>
        <div>
            <a href="{{ route('kriteria.create') }}">TAMBAH KRITERIA</a>
            <a href="{{route('option.index')}}">ALTERNATIF</a>
            {{-- <button>ALTERNATIF</button> --}}
        </div>
        <div>
            <table border="1">
                <thead>
                    <tr>
                        <th>KRITERIA</td>
                        <th>KODE</td>
                        <th>ACTIONS</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kriterias as $kriteria)
                        <tr>
                            <td>{{ $kriteria->namakrit }}</td>
                            <td>{{ $kriteria->kodekrit }}</td>
                            <td>
                                <a href="{{ route('kriteria.edit', $kriteria->id) }}">Edit</a>
                                <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                            <td></td>
                        </tr>
                    @empty
                </tbody>
            </table>
            <div>data kosong</div>
            @endforelse
            </tbody>
            </table>
            
        </div>
    </div>
</body>

</html>
