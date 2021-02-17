@extends('layouts.master')

@section('title', 'Users Profile')

@section('active', 'Users')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endpush

@push('js')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
@endpush

@section('breadcrumb')
<span class="kt-subheader__breadcrumbs-separator"></span>
    <a href="#" class="kt-subheader__breadcrumbs-link">
        Users Profile           
    </a>
<span class="kt-subheader__breadcrumbs-separator"></span>
<span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
    Profile
</span>
@endsection

@section('content')

<div>
    @livewire('profile.update-profile-information-form')
        <x-jet-section-border />
        
            @livewire('profile.update-password-form')

        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            <x-jet-section-border />
        
            @livewire('profile.two-factor-authentication-form')
        @endif

        <x-jet-section-border />

        @livewire('profile.logout-other-browser-sessions-form')
</div>
@endsection
