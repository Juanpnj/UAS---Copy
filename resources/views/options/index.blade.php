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
            <a href="{{ route('option.create') }}">TAMBAH ALTERNATIF</a>
            <a href="{{ route('kriteria.index') }}">KRITERIA</a>
        </div>
        <div>
            <table border="1">
                <thead>
                    <tr>
                        <th>ALTERNATIF</td>
                            @forelse ($kriterias as $kriteria)
                        <th>{{ $kriteria->kodekrit }}</th>
                    @empty
                        @endforelse
                        <th>ACTIONS</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($options as $option)
                        <tr>
                            <td>{{ $option->alternatif }}</td>
                            @forelse ($kriterias as $kriteria)
                                @forelse ($opbobots as $opbobot)
                                    @if ($opbobot->idalt == $option->id && ($opbobot->idkrit == $kriteria->id))
                                        <td>{{ $opbobot->bobot }}</td>
                                    @else
                                        
                                    @endif
                                @empty
                                    
                                @endforelse
                            @empty
                            @endforelse
                            <td>
                                <a href="{{ route('option.edit', $option->id) }}">Edit</a>
                                <form action="{{ route('option.destroy', $option->id) }}" method="POST"
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
            <a href="{{ route('result.index') }}">Hasil</a>
        </div>
    </div>
</body>

</html>
