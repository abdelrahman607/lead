<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leads Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>


    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6366f1',
                        dark: '#0f172a'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-slate-100 min-h-screen flex">


<aside class="w-64 bg-dark text-white hidden md:flex flex-col">
    <div class="px-6 py-5 text-2xl font-bold border-b border-slate-700">
        Leads<span class="text-primary">.</span>
    </div>

    <nav class="flex-1 px-4 py-6 space-y-2 text-sm">
        <a href="{{ route('leads.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition">
            📋 <span>Leads</span>
        </a>

        <a href="{{ route('leads.archived') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition">
            🗄️ <span>Archived</span>
        </a>
    </nav>

    <div class="px-6 py-4 text-xs text-slate-400 border-t border-slate-700">
        © {{ date('Y') }} Leads Manager
    </div>
</aside>


<div class="flex-1 flex flex-col">


    <header class="bg-white shadow-sm px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-semibold text-slate-800">
            @yield('title', 'Dashboard')
        </h1>

        <a href="{{ route('leads.create') }}"
           class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-600 transition">
            + Add Lead
        </a>
    </header>

    <main class="p-6">

<div x-data="{ show: {{ session('success') ? 'true' : 'false' }} }"
     x-show="show"
     x-transition
     x-init="setTimeout(() => show = false, 3000)"
     class="fixed top-5 right-5 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center gap-2">

    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
         stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
    </svg>

    <span>{{ session('success') }}</span>

    <button @click="show = false" class="ml-4 text-white font-bold">&times;</button>
</div>


        @yield('content')

    </main>
</div>

</body>
</html>
