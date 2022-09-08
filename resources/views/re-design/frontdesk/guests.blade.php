@extends('layouts.frontdesk')
@section('title', 'Guest Transactions')
@section('content')
    <div>
        @livewire('re.frontdesk.guest-transactions')
        @livewire('re.frontdesk.add-damages')
    </div>
@endsection
