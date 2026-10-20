@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
<h4>Edit Barang</h4>
<form action="{{ route('items.update', $item) }}" method="POST" class="card card-body">
    @csrf
    @method('PUT')
    @include('items._form')
</form>
@endsection