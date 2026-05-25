<!DOCTYPE html>
<html>

<head>
    <title>Jadwal</title>
    <style>
    body {
        font-family: Arial;
        padding: 20px;
    }

    h1 {
        text-align: center;
    }

    .day-section {
        margin: 30px 0;
    }

    .day-header {
        background: #007bff;
        color: white;
        padding: 10px;
        font-size: 18px;
        font-weight: bold;
        border-radius: 5px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    th {
        background: #f0f0f0;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <a href="{{ url('/mapel') }}"
        style="background: red; color: white; padding: 10px; text-decoration: none; border-radius: 5px;">← Kembali</a>

    <h1>Jadwal Pelajaran</h1>

    @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $hari)
    <div class="day-section">
        <div class="day-header">{{ $hari }}</div>
        <table>
            <thead>
                <tr>
                    <th>Jam</th>
                    <th>Mapel</th>
                    <th>Guru</th>
                </tr>
            </thead>
            <tbody>
                @php
                $mapels = \App\Models\Mapel::where('hari', $hari)->orderBy('jam_pelajaran')->get();
                @endphp
                @forelse($mapels as $mapel)
                <tr>
                    <td>{{ $mapel->jam_pelajaran }}:00</td>
                    <td>{{ $mapel->nama_mapel }}</td>
                    <td>{{ $mapel->guru_pengampu }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" style="text-align: center; color: #999;">-</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endforeach
</body>

</html>