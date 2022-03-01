@extends('layouts.admin')

@section('title', 'Dashboard')

@section('css')

@endsection

@section('js')

@endsection

@section('content')

<x-content>
    <x-slot name="modul">
        <h1>Dashboard</h1>
    </x-slot>

    @include('admin.partials.coming')
</x-content>

@endsection
