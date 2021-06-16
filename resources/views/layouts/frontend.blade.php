<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  class="text-gray-900 leading-tight">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @includeIf('seo::components.metadata')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        
        @stack('top-scripts')
        <!-- Styles -->
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

    </head>
  <body class="antialiased bg-body text-body font-body">
    <div x-data="{ isOpen: false }" class="relative bg-gray">
    
        @includeIf('theme::flyout-menu')
        @if(! \Request::is('/'))
            @includeIf('theme::fastbar')
        @endif
        @if(! \Request::is('/'))
            @includeIf('theme::breadcrumbs')
        @endif
        <div class="relative mx-auto max-w-7xl px-auto">
            @includeIf('flash::message')
        </div>
        @role('admin')        
        <div x-data='{ dashboard: false }' class="bg-gradient bg-gradient-to-r from-green-600 to-green-900 border-cool-gray-300 relative">
            @yield('module-dashboard')
        </div>
        @endrole
        <div class="text-right w-full bg-green-300">
            <div class="mx-auto max-w-7xl py-1 text-green-900">
                @yield('config')
            </div>
        </div>
        @yield('section-header')
        
        @hasSection('cta')
            <div class="bg-gradient bg-gradient-to-r from-green-600 to-green-900 border-b-4 border-cool-gray-300 relative">
                @yield('cta')
            </div>
        @endif

        @hasSection('landing')
            @yield('landing')
        @endif
        
        @hasSection('content')
            <div x-data="{ open: false, button: true }" class="mx-auto flex flex-row max-w-7xl relative" >
                <main class="bg-white py-8 w-full shadow-outline-green px-4 sm:px-6 ">
                    @yield('content')
                </main>
                <aside>            
                    @if(isset($aside) && !is_null($aside))
                        <button x-show="button" type="button" @click="open = true, button = false" 
                            :class="{ 'active': open === true }" 
                            class="@if( Request::is('learn*') || Request::is('share*') || Request::is('grow*') || Request::is('act*') || Request::is('interaction*')) bg-yellow-300 text-gray-900 border-gray-200 border-2 @elseif(Request::is('quinteiros')) bg-yellow-700 text-gray-900 @else bg-white text-gray-400 @endif rounded-md p-1 inline-flex items-center justify-center  
                            hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-green-500">
                            <span class="sr-only">{{ __('Open Menu') }}</span>
                            <!-- Heroicon name: menu -->
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        @includeIf('theme::aside-menu', ['aside' => $aside])
                    @endif
                </aside>
            </div>
        @endif
        
        @includeIf('theme::footer')
    </div>

        @stack('modals')

        @livewireScripts

        @stack('bottom-scripts')

        <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
    </body>
</html>