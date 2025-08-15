<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Guests List - VisitSmuhero</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .title {
            font-size: 20px;
            font-weight: bold;
        }

        .date {
            font-size: 12px;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="title">Guests List - VisitSmuhero</div>
        <div class="date">
            Generated on: {{ \Carbon\Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Institution</th>
                <th>Person to Meet</th>
                <th>Purpose</th>
                <th>Appointment</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guests as $guest)
                <tr>
                    <td>{{ $guest->name }}</td>
                    <td>{{ $guest->institution }}</td>
                    <td>{{ $guest->teacher->name }}</td>
                    <td>{{ $guest->category }}</td>
                    <td>
                        @if ($guest->appointment_datetime)
                            <span class="px-2 py-1 text-sm bg-gray-100 text-gray-700 rounded">
                                {{ $guest->appointment_datetime->translatedFormat('d F Y, H:i') }}
                            </span>
                        @else
                            <span class="px-2 py-1 text-sm bg-red-100 text-red-700 rounded">
                                Tidak ada jadwal
                            </span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- <script>
        function updateDateTime() {
            const now = new Date();
            const formatted =
                now.getFullYear() + '-' +
                String(now.getMonth() + 1).padStart(2, '0') + '-' +
                String(now.getDate()).padStart(2, '0') + ' ' +
                String(now.getHours()).padStart(2, '0') + ':' +
                String(now.getMinutes()).padStart(2, '0') + ':' +
                String(now.getSeconds()).padStart(2, '0');

            document.getElementById('generated-date').textContent = 'Generated on: ' + formatted;
        }

        updateDateTime();
        setInterval(updateDateTime, 1000);
    </script> --}}
</body>

</html>
