<x-layout>
    <x-slot name="title">
        halaman form
    </x-slot>
    isi form
    <form action="{{ route('validate.post') }}" method="post">
        @csrf
        <x-input label="title" error="title" />
        <x-input label="body" error="body" />
        <button type="submit">POST</button>
    </form>
</x-layout>
