<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Teachers List - VisitSmuhero</title>
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
        <div class="title">Teachers List - VisitSmuhero</div>
        <div class="date">Generated on: {{ now()->format('Y-m-d H:i:s') }}</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Subject</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->subject }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
