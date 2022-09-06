@extends('layouts.frontdesk')
@section('title', 'Check In')
@section('content')
    <div>
        <div class="gap-4 sm:grid sm:grid-cols-12">
            <div class="sm:col-span-8">
                @livewire('re.frontdesk.check-in')
            </div>
            <div class=" sm:col-span-4">
                @livewire('re.frontdesk.recent-check-in-list')
            </div>
        </div>
        <div>
            @livewire('re.frontdesk.check-in-guest')
        </div>
    </div>
@endsection
