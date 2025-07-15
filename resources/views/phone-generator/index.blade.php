@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow rounded">
        <h1 class="text-2xl font-bold mb-4">Generate Nomor Provider</h1>

        @if (session('success'))
            <div class="p-3 bg-green-200 text-green-800 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('phone-generator.generate') }}" method="POST" class="mb-6">
            @csrf
            <div class="flex gap-4 items-end">
                <div>
                    <label>Provider</label>
                    <select name="provider" required class="form-select">
                        <option value="telkomsel">Telkomsel</option>
                        <option value="xl">XL</option>
                        <option value="axis">AXIS</option>
                    </select>
                </div>
                <div>
                    <label>Jumlah</label>
                    <input type="number" name="count" required min="1" max="1000" class="border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                </div>
                <div>
                    <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Generate</button>
                </div>
            </div>
        </form>

        <table class="table-auto w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Nomor</th>
                    <th class="border px-4 py-2">Provider</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($phones as $phone)
                <tr>
                    <td class="border px-4 py-2">{{ $phone->number }}</td>
                    <td class="border px-4 py-2">{{ $phone->provider }}</td>
                    <td class="border px-4 py-2">
                        @if ($phone->is_active)
                            <span class="text-green-600 font-bold">Aktif</span>
                        @else
                            <span class="text-red-600">Tidak Aktif</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2 text-center">
                        <a
                            href="https://wa.me/{{ ltrim(preg_replace('/^0/', '62', $phone->number)) }}"
                            target="_blank"
                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm"
                        >
                            WhatsApp
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $phones->links() }}
        </div>
    </div>
@endsection
