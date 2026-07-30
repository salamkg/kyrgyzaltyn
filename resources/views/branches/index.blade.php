<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Дочерние компании — ОАО «КыргызАлтын»</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    @include('partials.header')

    <main class="max-w-7xl mx-auto px-6 py-8">
        
        <div class="text-xs text-gray-500 mb-6">
            <a href="{{ url('/') }}" class="hover:text-blue-900 transition">Главная</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-medium">Дочерние компании</span>
        </div>

        <div class="border-l-4 border-yellow-500 pl-4 mb-8">
            <h1 class="text-3xl font-extrabold text-blue-950">Дочерние компании</h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            @forelse($branches as $branch)
                <div class="relative rounded-2xl overflow-hidden shadow-sm group h-72 flex flex-col justify-end p-6 border border-gray-100">
                    <div class="absolute inset-0 bg-cover bg-center transition duration-500 group-hover:scale-105" style="background-image: url('{{ asset('storage/' . $branch->image_path) }}');"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                    
                    <div class="relative z-10">
                        <h3 class="font-extrabold text-xl text-white mb-4 leading-snug">{{ $branch->title }}</h3>
                        <a href="{{ route('branches.show', $branch->id) }}" class="inline-block bg-yellow-500 hover:bg-yellow-400 text-blue-950 font-bold text-xs uppercase px-5 py-2.5 rounded-lg transition shadow">
                            Подробнее
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 text-xs col-span-2">Дочерние компании пока не добавлены в панели администратора.</p>
            @endforelse
        </div>

    </main>

    @include('partials.footer')

</body>
</html>