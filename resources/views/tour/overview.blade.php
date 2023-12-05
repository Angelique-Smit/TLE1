@extends('layouts.app')

@section('content')
    @php
        $currentUser = auth()->user();
    @endphp
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold">Tour Overzicht</h1>
            @if ($currentUser && $currentUser->is_admin)
                <a href="{{ route('admin.view_create_tour') }}" type="button" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-20 rounded">{{ __('Maak een nieuwe tour aan') }}</a>
            @endif
        </div>
        @if (session('status'))
            <div class="relative px-3 py-3 mb-4 text-green-800 bg-green-200 border border-green-300 rounded"
                 role="alert">
                {{ session('status') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300">
            <tr>
                <th class="px-4 py-2 text-center border-b">Gids</th>
                <th class="px-4 py-2 text-center border-b">Klant</th>
                <th class="px-4 py-2 text-center border-b">Klant Email</th>
                <th class="px-4 py-2 text-center border-b">Datum</th>
                <th class="px-4 py-2 text-center border-b">Tijd</th>
                <th class="px-4 py-2 text-center border-b">Acties</th>
            </tr>

            @foreach($tours as $tour)
                <tr>
                    <td class="px-4 py-2 text-center border-b">{{ $tour->user->name }} - {{ $tour->user->organisation ? $tour->user->organisation->name : 'No Organisation' }}</td>
                    <td class="px-4 py-2 text-center border-b">{{ $tour->customer }}</td>
                    <td class="px-4 py-2 text-center border-b">{{ $tour->email }}</td>
                    <td class="px-4 py-2 text-center border-b">{{ $tour->datetime->format('d F Y') }}</td>
                    <td class="px-4 py-2 text-center border-b">{{ $tour->datetime->format('H:i') }}</td>
                    <td class="px-4 py-2 text-center border-b">
                        @if ($currentUser && $currentUser->is_admin)
                            <a href="{{ route('admin.view_edit_tour', $tour->id) }}"
                               class="px-2 py-1 text-white bg-blue-500 rounded hover:bg-blue-700">Edit</a>
                            <form method="post" action="{{ route('admin.delete_tour', $tour->id) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-2 py-1 text-white bg-red-500 rounded hover:bg-red-700">Delete
                                </button>
                            </form>
                        @else
                            <a href="{{ route('livestream', $tour->login_code) }}"
                               class="px-2 py-1 text-white bg-blue-500 rounded hover:bg-blue-700">Start Livestream</a>
                        @endif

                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection
