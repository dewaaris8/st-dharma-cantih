<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Absensi {{ $daerah }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

    <h2>Laporan Absensi - {{ $daerah }}</h2>

    <table>
        <thead>
            <tr>
                <th>Nama Anggota</th>
                <th>Hadir</th>
                <th>Tidak Hadir</th>
                <th>Sakit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataAbsensi as $anggota)
                <tr>
                    <td>{{ $anggota->nama }}</td>
                    <td>{{ $anggota->absensi->where('status', 'hadir')->count() }}</td>
                    <td>{{ $anggota->absensi->where('status', 'tidak_hadir')->count() }}</td>
                    <td>{{ $anggota->absensi->where('status', 'sakit')->count() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
