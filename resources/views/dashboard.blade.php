<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial;
        background: #f5f5f5;
    }

    .navbar {
        background: #333;
        color: white;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar h2 {
        margin: 0;
    }

    .navbar div {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .logout-btn {
        background: #dc3545;
        color: white;
        padding: 8px 15px;
        text-decoration: none;
        border-radius: 5px;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .day-section {
        margin: 20px 0;
    }

    .day-header {
        background: #007bff;
        color: white;
        padding: 12px;
        font-size: 18px;
        font-weight: bold;
        border-radius: 5px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        background: white;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background: #f0f0f0;
        font-weight: bold;
    }

    .action-btns {
        display: flex;
        gap: 5px;
    }

    .btn {
        padding: 6px 12px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        text-decoration: none;
        font-size: 12px;
    }

    .btn-edit {
        background: #ffc107;
        color: black;
    }

    .btn-delete {
        background: #dc3545;
        color: white;
    }

    .btn-add {
        background: #28a745;
        color: white;
        padding: 10px 15px;
    }

    .hidden {
        display: none;
    }
    </style>
</head>

<body>
    <div class="navbar">
        <h2>Sistem Informasi Daftar Mapel</h2>
        <div>
            <span>{{ Auth::user()->name }} ({{ Auth::user()->role }})</span>
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="logout-btn" style="border: none; cursor: pointer;">Logout</button>
            </form>
        </div>
    </div>

    <div class="container">
        @if(Auth::user()->role === 'admin')
        <button class="btn btn-add" onclick="alert('Fitur tambah mapel segera hadir!')">+ Tambah Mapel</button>
        @endif

        @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $hari)
        <div class="day-section">
            <div class="day-header">{{ $hari }}</div>
            <table>
                <thead>
                    <tr>
                        <th>Jam</th>
                        <th>Mapel</th>
                        <th>Guru</th>
                        @if(Auth::user()->role === 'admin')
                        <th>Aksi</th>
                        @endif
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
                        @if(Auth::user()->role === 'admin')
                        <td>
                            <div class="action-btns">
                                <button class="btn btn-edit" onclick="alert('Edit fitur segera hadir!')">Edit</button>
                                <button class="btn btn-delete"
                                    onclick="alert('Delete fitur segera hadir!')">Hapus</button>
                            </div>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="@if(Auth::user()->role === 'admin') 4 @else 3 @endif"
                            style="text-align: center; color: #999;">-</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @endforeach
    </div>
</body>

</html>