<x-header />
<livewire:components.flash-messages />
<a href="/test" class="text-white bg-green-400 px-4 py-6 border border-green-600 rounded-md">test</a>
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
            
            
            {{ $slot }}
            
        </div>
<x-footer />
