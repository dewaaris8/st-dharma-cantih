@extends('layouts.app')

@section('content')
    <h1>Detail Acara: {{ $acara->nama }}</h1>
    <p>Tanggal: {{ $acara->tanggal }}</p>

    <a href="{{ route('absensi.index', ['acara' => $acara->id]) }}">Lihat Absensi</a>
@endsection
