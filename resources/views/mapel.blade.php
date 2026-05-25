<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Daftar Mapel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">
        Sistem Informasi Daftar Mapel
    </h2>
    <div class="container mt-5">

    <div class="mb-3">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger">
                Logout
            </button>
        </form>
    </div>
    
    <div class="card mb-4">
        <div class="card-body">

            <div class="row">

                <div class="col">
                    <input type="text"
                           id="kode"
                           class="form-control"
                           placeholder="Kode Mapel">
                </div>

                <div class="col">
                    <input type="text"
                           id="nama"
                           class="form-control"
                           placeholder="Nama Mapel">
                </div>

                <div class="col">
                    <input type="text"
                           id="guru"
                           class="form-control"
                           placeholder="Guru Pengampu">
                </div>

                <div class="col">
                    <input type="number"
                           id="jam"
                           class="form-control"
                           placeholder="Jam">
                </div>
                
                <div class="col">
                    <button
                        onclick="simpanData()"
                        class="btn btn-primary">
                        Simpan
                    </button>
                </div>
                
            </div>

        </div>
    </div>

    <table class="table table-bordered">

        <thead>

        <tr>
            <th>ID</th>
            <th>Kode</th>
            <th>Mapel</th>
            <th>Guru</th>
            <th>Jam</th>
            <th>Aksi</th>
        </tr>

        </thead>

        <tbody id="data-mapel">

        </tbody>

    </table>

</div>

<script>

let editId = null;

async function loadData()
{
    const response = await fetch('/api/mapels');
    const data = await response.json();

    let html = '';

    data.forEach(item => {

        html += `
        <tr>

            <td>${item.id}</td>
            <td>${item.kode_mapel}</td>
            <td>${item.nama_mapel}</td>
            <td>${item.guru_pengampu}</td>
            <td>${item.jam_pelajaran}</td>

            <td>

                <button
                    onclick="editData(
                        ${item.id},
                        '${item.kode_mapel}',
                        '${item.nama_mapel}',
                        '${item.guru_pengampu}',
                        ${item.jam_pelajaran}
                    )"
                    class="btn btn-warning btn-sm">
                    Edit
                </button>

                <button
                    onclick="hapusData(${item.id})"
                    class="btn btn-danger btn-sm">
                    Hapus
                </button>

            </td>

        </tr>
        `;
    });

    document.getElementById('data-mapel').innerHTML = html;
}

function editData(id, kode, nama, guru, jam)
{
    editId = id;

    document.getElementById('kode').value = kode;
    document.getElementById('nama').value = nama;
    document.getElementById('guru').value = guru;
    document.getElementById('jam').value = jam;
}

async function simpanData()
{
    const data = {
        kode_mapel: document.getElementById('kode').value,
        nama_mapel: document.getElementById('nama').value,
        guru_pengampu: document.getElementById('guru').value,
        jam_pelajaran: document.getElementById('jam').value
    };

    if(editId)
    {
        await fetch('/api/mapels/' + editId, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        editId = null;
    }
    else
    {
        await fetch('/api/mapels', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });
    }

    document.getElementById('kode').value = '';
    document.getElementById('nama').value = '';
    document.getElementById('guru').value = '';
    document.getElementById('jam').value = '';

    loadData();
}

async function hapusData(id)
{
    if(!confirm('Yakin hapus data?'))
    {
        return;
    }

    await fetch('/api/mapels/' + id, {
        method: 'DELETE'
    });

    loadData();
}

loadData();

</script>

</body>
</html>