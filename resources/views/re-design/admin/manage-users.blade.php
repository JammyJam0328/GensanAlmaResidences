@php
$roles = \App\Models\Role::get()
    ->mapWithKeys(function ($role) {
        return [
            $role->id => $role->name,
        ];
    })
    ->toArray();
@endphp

@extends('layouts.admin')
@section('title', 'Users')
@section('content')
    <div>
        @livewire('re.admin.user-list', [
            'roles' => $roles,
        ])
        @livewire('re.admin.create-user', [
            'roles' => $roles,
        ])
        @livewire('re.admin.edit-user', [
            'roles' => $roles,
        ])
    </div>
@endsection
