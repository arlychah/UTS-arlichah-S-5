@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<h4>Edit Kategori</h4>
<form action="{{ route('categories.update', $category) }}" method="POST" class="card card-body">
    @csrf
    @method('PUT')
    @include('categories._form')
</form>
@endsection