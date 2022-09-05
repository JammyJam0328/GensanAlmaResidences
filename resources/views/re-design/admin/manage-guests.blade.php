@extends('layouts.admin')
@section('title', 'Guests')
@section('content')
    <div x-data="{ view: false }"
        x-on:guest-ready.window="view=true">
        <div x-show="view==false">
            @livewire('re.admin.guest-list')
        </div>
        <div x-cloak
            x-show="view">
            @livewire('re.admin.view-guest')
        </div>
    </div>
@endsection
