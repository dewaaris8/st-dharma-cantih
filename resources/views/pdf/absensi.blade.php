<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi {{ $daerah }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Data Absensi - {{ $daerah }}</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Hadir</th>
                <th>Tidak Hadir</th>
                <th>Sakit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggotaList as $anggota)
                <tr>
                    <td>{{ $anggota->nama }}</td>
                    <td>{{ $anggota->absensi->sum('total_hadir') }}</td>
                    <td>{{ $anggota->absensi->sum('total_tidak_hadir') }}</td>
                    <td>{{ $anggota->absensi->sum('total_sakit') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
