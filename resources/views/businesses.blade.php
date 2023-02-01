@extends('layouts.default')

@section('sidebar')
@endsection

@section('content')
    <h3><b>Add Business</b></h3>
    <br>
    <!-- {{ print_r($errors) }} -->
    <form enctype="multipart/form-data" method="POST" action="{{ route('businesses.store') }}">
        @csrf
        
        @error('name')
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" required>
        @else
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Name">
        @enderror
        <br>
        <br>
        @error('email')
            <input type="text" name="email" value="{{ old('email') }}" placeholder="Email" required>
        @else
            <input type="text" name="email" value="{{ old('email') }}" placeholder="Email">
        @enderror
        <br>
        <br>
        <input type="text" name="address" value="{{ old('address') }}" placeholder="Address">
        <br>
        @error('address')
            //
        @enderror
        <br>
        <input type="file" name="logo" id="logo">
        <label for="logo">Escolher logo</label>
        <br>
        @error('logo')
            {{ $message }}
        @enderror
        <br>
        <button type="submit">Salvar</button>
    </form>
    <br>
    <hr>
    <h5>Registered Businesses</h5><br>
    @foreach($businesses as $business)
        {{ $business->name }} ({{ $business->email }})<br>
        @if($business->logo)
            <img src="{{ Storage::disk('public')->url($business->logo) }}" alt="" width=100>
        @endif
    @endforeach

    {{ $businesses->links() }}
@endsection