<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl">
        Tambah Jadwal
    </h2>
</x-slot>

<div class="py-6">

<div class="max-w-4xl mx-auto">

<div class="bg-white shadow rounded-lg p-6">

<form action="{{ route('jadwal.store') }}" method="POST">

@csrf

<div class="mb-4">

<label>Tanggal</label>

<input
type="date"
name="tanggal"
class="w-full border rounded p-2">

</div>

<div class="mb-4">

<label>Petugas</label>

<select
name="petugas_id"
class="w-full border rounded p-2">

<option value="">-- Pilih Petugas --</option>

@foreach($petugas as $item)

<option value="{{ $item->id }}">

{{ $item->name }}

</option>

@endforeach

</select>

</div>

<button
class="bg-blue-600 text-white px-5 py-2 rounded">

Simpan

</button>

<a
href="{{ route('jadwal.index') }}"
class="bg-gray-500 text-white px-5 py-2 rounded">

Kembali

</a>

</form>

</div>

</div>

</div>

</x-app-layout>