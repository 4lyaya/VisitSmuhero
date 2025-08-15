@extends('layouts.app')

@section('title', 'Export Preview')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-md overflow-hidden p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">{{ ucfirst($dataType) }} Report Preview</h1>
                <div>
                    <a href="{{ url('export') }}" class="text-blue-600 hover:text-blue-800 mr-4">
                        Back to Export
                    </a>
                    <form action="{{ route('export.generate') }}" method="POST" class="inline">
                        @csrf
                        <input type="hidden" name="data_type" value="{{ $dataType }}">
                        <input type="hidden" name="format" value="pdf">
                        <input type="hidden" name="start_date" value="{{ $startDate }}">
                        <input type="hidden" name="end_date" value="{{ $endDate }}">
                        <input type="hidden" name="include_photo" value="{{ $includePhoto ? '1' : '0' }}">
                        <input type="hidden" name="group_by_category" value="{{ $groupByCategory ? '1' : '0' }}">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Download PDF
                        </button>
                    </form>
                </div>
            </div>

            @if ($startDate && $endDate)
                <div class="mb-4 text-gray-600">
                    Date Range: {{ Carbon\Carbon::parse($startDate)->format('M j, Y') }} -
                    {{ Carbon\Carbon::parse($endDate)->format('M j, Y') }}
                </div>
            @endif

            @if ($dataType === 'guests' && $groupByCategory)
                @foreach ($data as $category => $items)
                    <h2 class="text-lg font-semibold bg-gray-100 p-2 mt-6 mb-2">{{ $category }}</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    @if ($includePhoto)
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Photo</th>
                                    @endif
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Institution</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Teacher</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Visit Date</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($items as $item)
                                    <tr>
                                        @if ($includePhoto)
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($item->photo)
                                                    <img src="{{ asset('storage/' . $item->photo) }}"
                                                        class="h-10 w-10 rounded-full object-cover">
                                                @endif
                                            </td>
                                        @endif
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $item->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $item->institution }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $item->teacher->name ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $item->created_at->format('M j, Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                @if ($dataType === 'guests' && $includePhoto)
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Photo</th>
                                @endif
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name</th>
                                @if ($dataType === 'guests')
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Institution</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Teacher</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Purpose</th>
                                @elseif($dataType === 'teachers')
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Subject</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email</th>
                                @elseif($dataType === 'users')
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Role</th>
                                @endif
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Created At</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($data as $item)
                                <tr>
                                    @if ($dataType === 'guests' && $includePhoto)
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($item->photo)
                                                <img src="{{ asset('storage/' . $item->photo) }}"
                                                    class="h-10 w-10 rounded-full object-cover">
                                            @endif
                                        </td>
                                    @endif
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $item->name }}</td>
                                    @if ($dataType === 'guests')
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $item->institution }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $item->teacher->name ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->category }}
                                        </td>
                                    @elseif($dataType === 'teachers')
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->subject }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->email }}
                                        </td>
                                    @elseif($dataType === 'users')
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ str_replace('_', ' ', $item->role) }}</td>
                                    @endif
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $item->created_at->format('M j, Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <div class="mt-6 text-sm text-gray-500">
                Total records:
                {{ $dataType === 'guests' && $groupByCategory ? $data->flatten()->count() : $data->count() }}
            </div>
        </div>
    </div>
@endsection
