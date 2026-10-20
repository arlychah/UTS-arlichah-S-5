@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
<h4>Tambah Barang</h4>
<form action="{{ route('items.store') }}" method="POST" class="card card-body">
    @csrf
    @include('items._form')
</form>
@endsection