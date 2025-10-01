<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Desa - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                🏠 Inventaris Desa - Admin
            </a>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Dashboard Inventaris & Aset</h2>

        <!-- Statistik -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h3>{{ $total_aset }}</h3>
                        <p>Total Aset</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h3>{{ $aset_baik }}</h3>
                        <p>Aset Baik</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <h3>{{ $aset_rusak }}</h3>
                        <p>Aset Rusak</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daftar Aset -->
        <div class="card">
            <div class="card-header">
                <h4>Daftar Aset Terkini</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Aset</th>
                            <th>Kondisi</th>
                            <th>Lokasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($daftar_aset as $aset)
                        <tr>
                            <td>{{ $aset['kode'] }}</td>
                            <td>{{ $aset['nama'] }}</td>
                            <td>
                                @if($aset['kondisi'] == 'Baik')
                                    <span class="badge bg-success">{{ $aset['kondisi'] }}</span>
                                @else
                                    <span class="badge bg-warning">{{ $aset['kondisi'] }}</span>
                                @endif
                            </td>
                            <td>{{ $aset['lokasi'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Info Passing Data -->
        <div class="alert alert-info mt-4">
            <h5>Demo Passing Data:</h5>
            <p>Data ditampilkan dari Controller ke View menggunakan:</p>
            <ul>
                <li><strong>Route:</strong> /admin/inventaris</li>
                <li><strong>Controller:</strong> InventarisController@index</li>
                <li><strong>View:</strong> admin/inventaris.blade.php</li>
            </ul>
        </div>
    </div>

    <footer class="bg-light mt-5 py-3 text-center">
        <p>Project Akhir Bina Desa - Inventaris & Aset (Admin)</p>
    </footer>
</body>
</html>