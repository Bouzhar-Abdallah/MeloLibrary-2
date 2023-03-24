<x-header />
<livewire:components.flash-messages />

    <body class="font-sans antialiased h-full">
        <div class="min-h-screen bg-gray-100">
            <x-navigation />
            <!-- Page Heading -->
            @if (isset($header))
            <header class="bg-red-600 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endif
            <x-admin_dashboard_nav />
            
            
            @yield('content')
            
        </div>
<x-footer />
