@extends('layouts.default')

@section('title', 'User Title')

@section('sidebar')
    <div>
        <nav>User sidebar</nav>
    </div>
@endsection

@section('content')
    <h1>User</h1>
    {{ $user->name }}<br>
    {{ $user->email }}<br>
@endsection

