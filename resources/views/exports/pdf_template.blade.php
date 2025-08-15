<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ ucfirst($dataType) }} Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #3490dc;
            padding-bottom: 10px;
        }

        .header h1 {
            font-size: 18px;
            margin: 0;
            color: #3490dc;
        }

        .header p {
            margin: 5px 0 0;
            font-size: 12px;
            color: #666;
        }

        .date-range {
            text-align: right;
            margin-bottom: 15px;
            font-size: 11px;
            color: #666;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        table th {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            font-weight: bold;
        }

        table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .category-header {
            background-color: #e9ecef;
            padding: 5px 10px;
            margin: 15px 0 5px;
            font-weight: bold;
        }

        .photo-cell {
            width: 50px;
            text-align: center;
        }

        .photo {
            max-width: 40px;
            max-height: 40px;
        }

        .footer {
            margin-top: 20px;
            font-size: 10px;
            text-align: center;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 5px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>{{ ucfirst($dataType) }} Report</h1>
        <p>{{ config('app.name') }}</p>
    </div>

    @if ($startDate && $endDate)
        <div class="date-range">
            Date Range: {{ Carbon\Carbon::parse($startDate)->format('M j, Y') }} -
            {{ Carbon\Carbon::parse($endDate)->format('M j, Y') }}
        </div>
    @endif

    @if ($dataType === 'guests' && $groupByCategory)
        @foreach ($data as $category => $items)
            <div class="category-header">{{ $category }}</div>
            <table>
                <thead>
                    <tr>
                        @if ($includePhoto)
                            <th class="photo-cell">Photo</th>
                        @endif
                        <th>Name</th>
                        <th>Institution</th>
                        <th>Teacher</th>
                        <th>Purpose</th>
                        <th>Visit Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            @if ($includePhoto)
                                <td class="photo-cell">
                                    @if ($item->photo)
                                        <img src="{{ storage_path('app/public/' . $item->photo) }}" class="photo">
                                    @endif
                                </td>
                            @endif
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->institution }}</td>
                            <td>{{ $item->teacher->name ?? 'N/A' }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->created_at->format('M j, Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    @else
        <table>
            <thead>
                <tr>
                    @if ($dataType === 'guests' && $includePhoto)
                        <th class="photo-cell">Photo</th>
                    @endif
                    <th>Name</th>
                    @if ($dataType === 'guests')
                        <th>Institution</th>
                        <th>Teacher</th>
                        <th>Purpose</th>
                    @elseif($dataType === 'teachers')
                        <th>Subject</th>
                        <th>Email</th>
                    @elseif($dataType === 'users')
                        <th>Email</th>
                        <th>Role</th>
                    @endif
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        @if ($dataType === 'guests' && $includePhoto)
                            <td class="photo-cell">
                                @if ($item->photo)
                                    <img src="{{ storage_path('app/public/' . $item->photo) }}" class="photo">
                                @endif
                            </td>
                        @endif
                        <td>{{ $item->name }}</td>
                        @if ($dataType === 'guests')
                            <td>{{ $item->institution }}</td>
                            <td>{{ $item->teacher->name ?? 'N/A' }}</td>
                            <td>{{ $item->category }}</td>
                        @elseif($dataType === 'teachers')
                            <td>{{ $item->subject }}</td>
                            <td>{{ $item->email }}</td>
                        @elseif($dataType === 'users')
                            <td>{{ $item->email }}</td>
                            <td>{{ str_replace('_', ' ', $item->role) }}</td>
                        @endif
                        <td>{{ $item->created_at->format('M j, Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="footer">
        Generated on {{ now()->format('M j, Y H:i') }} | Page {PAGENO} of {nbpg}
    </div>
</body>

</html>
