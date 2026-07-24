<x-app-layout>
<x-slot name="header">Novedades del PEM</x-slot>
<div class="max-w-4xl mx-auto py-8 px-4">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-navy">📰 Novedades del PEM</h1>
        <a href="{{ route('admin.news.create') }}"
           class="bg-green-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-700">
            + Nueva novedad
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($news->isEmpty())
        <p class="text-gray-500">No hay novedades aún. ¡Crea la primera!</p>
    @else
        <div class="space-y-3">
            @foreach($news as $item)
            <div class="bg-white border border-gray-200 rounded-xl p-4 flex items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <span class="text-2xl">{{ $item->icon }}</span>
                    <div>
                        <p class="font-semibold text-navy">{{ $item->title }}</p>
                        <p class="text-xs text-gray-500">{{ $item->meta }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 flex-shrink-0">
                    <span class="text-xs px-2 py-1 rounded-full {{ $item->active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                        {{ $item->active ? 'Activa' : 'Inactiva' }}
                    </span>
                    <a href="{{ route('admin.news.edit', $item) }}"
                       class="text-blue-600 hover:underline text-sm font-medium">Editar</a>
                    <form action="{{ route('admin.news.destroy', $item) }}" method="POST"
                          onsubmit="return confirm('¿Eliminar esta novedad?')">
                        @csrf @method('DELETE')
                        <button class="text-red-500 hover:underline text-sm font-medium">Eliminar</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    @endif

</div>
</x-app-layout>