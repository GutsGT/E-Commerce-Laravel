@extends('layouts.default')

@section('sidebar')
@endsection

@section('content')
    <h5>Add Business</h5>
    <!-- {{ print_r($errors) }} -->
    <br><br>
    <form enctype="multipart/form-data" method="POST" action="{{ route('businesses.store') }}">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}">
        <br>
        @error('name')
            {{ $message }}
        @enderror
        <br><br>
        <input type="text" name="email" value="{{ old('email') }}">
        <br>
        @error('email')
            {{ $message }}
        @enderror
        <br><br>
        <input type="text" name="address" value="{{ old('address') }}">
        <br>
        @error('address')
            {{ $message }}
        @enderror
        <br><br>
        <input type="file" name="logo">
        <br>
        @error('logo')
            {{ $message }}
        @enderror
        <br><br>
        <button type="submit">Salvar</button>
    </form>
    <hr>
    @foreach($businesses as $business)
        {{ $business->name }} ({{ $business->email }})<br>
        @if($business->logo)
            <img src="{{ Storage::disk('public')->url($business->logo) }}" alt="" width=100>
        @endif
    @endforeach
@endsection