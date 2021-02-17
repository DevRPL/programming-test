<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    @include('components.base.meta')
    
    @include('components.base.title')
    
    @include('components.base.font')

    @include('components.base.css')

    @stack('css')
    
</head>
<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
    @include('components.base.sidebar')
    
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
        @include('components.base.header')

        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
            @include('components.base.breadcrumb')
            <div class="kt-subheader__toolbar">
                <div class="kt-subheader__wrapper">
                    <div class="btn kt-subheader__btn-daterange">
                        <span class="kt-subheader__btn-daterange-title">Today</span>&nbsp;
                        <span class="kt-subheader__btn-daterange-date">
                            {{ \Carbon\Carbon::now()->format('d M Y') }}</span>
                        @include('components.base.breadcrumb-svg')
                    </div>
                </div>
            </div>
        </div>

        <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed " >
            @include('components.base.toggle_mobile')
        </div>
        
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            @yield('content')
            <main>
                {{ $slot ?? '' }}
            </main>
        </div>
    </div>

    <div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop"> 
        @include('components.base.footer')    
    </div>

    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>

        @include('components.base.js')

        {{-- @stack('modals')

        @livewireScripts --}}
    
        @stack('js')
</body>
</html>