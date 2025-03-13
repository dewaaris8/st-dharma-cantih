<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Laporan Inventaris Barang</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
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
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <h1>Laporan Data Anggota</h1>

        @php
            $kelompokDaerah = ['Kaja Kauh', 'Kaja Kangin', 'Delod'];
        @endphp

        @foreach ($kelompokDaerah as $daerah)
            @php
                $filteredAnggota = $dataAnggota->where('daerah', $daerah);
            @endphp

            @if ($filteredAnggota->count() > 0)
                <h2>Daerah: {{ $daerah }}</h2>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Nama Ayah</th>
                            <th>Nama Ibu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($filteredAnggota as $index => $anggota)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $anggota->nama }}</td>
                            <td>{{ $anggota->email }}</td>
                            <td>{{ $anggota->telepon }}</td>
                            <td>{{ $anggota->alamat }}</td>
                            <td>{{ $anggota->nama_ayah }}</td>
                            <td>{{ $anggota->nama_ibu }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        @endforeach
    </body>
</html>
