<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Absensi {{ $acara->nama }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Absensi</h2>
    <h3 style="text-align: center;">Acara: {{ $acara->nama }}</h3>
    <p>Tanggal: {{ $acara->tanggal }}</p>

    @foreach($dataAbsensi as $daerah => $absensi)
        <h4>Daerah: {{ $daerah }}</h4>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Status Kehadiran</th>
                </tr>
            </thead>
            <tbody>
                @foreach($absensi as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->anggota->nama }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>
</html>
