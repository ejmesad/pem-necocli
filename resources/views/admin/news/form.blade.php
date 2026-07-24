<x-app-layout>
<x-slot name="header">Novedades del PEM</x-slot>
<div class="max-w-2xl mx-auto py-8 px-4">

    <h1 class="text-2xl font-bold text-navy mb-6">
        {{ $item->exists ? '✏️ Editar novedad' : '➕ Nueva novedad' }}
    </h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-800 px-4 py-3 rounded-lg mb-4">
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ $item->exists ? route('admin.news.update', $item) : route('admin.news.store') }}"
          class="bg-white border border-gray-200 rounded-xl p-6 space-y-5">
        @csrf
        @if($item->exists) @method('PUT') @endif

        {{-- Título --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Título *</label>
            <input type="text" name="title" value="{{ old('title', $item->title) }}"
                   placeholder="Ej: Reunión Mesa de Rectores Necoclí"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                   required>
        </div>

        {{-- Meta --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Meta (fecha / descripción corta)</label>
            <input type="text" name="meta" value="{{ old('meta', $item->meta) }}"
                   placeholder="Ej: 24 jul 2026 · Acta disponible"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        {{-- Ícono --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Ícono (emoji)</label>
            <input type="text" name="icon" value="{{ old('icon', $item->icon ?? '📰') }}"
                   placeholder="📰"
                   class="w-24 border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        {{-- Link --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Enlace (opcional)</label>
            <input type="url" name="link" value="{{ old('link', $item->link) }}"
                   placeholder="https://..."
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        {{-- Orden --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Orden (menor = primero)</label>
            <input type="number" name="order" value="{{ old('order', $item->order ?? 0) }}"
                   class="w-24 border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        {{-- Activa --}}
        <div class="flex items-center gap-3">
            <input type="hidden" name="active" value="0">
            <input type="checkbox" name="active" value="1" id="active"
                   {{ old('active', $item->active ?? true) ? 'checked' : '' }}
                   class="w-4 h-4 accent-green-600">
            <label for="active" class="text-sm font-semibold text-gray-700">Visible en el home</label>
        </div>

        {{-- Botones --}}
        <div class="flex gap-3 pt-2">
            <button type="submit"
                    class="bg-green-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-green-700">
                {{ $item->exists ? 'Guardar cambios' : 'Crear novedad' }}
            </button>
            <a href="{{ route('admin.news.index') }}"
               class="bg-gray-100 text-gray-700 px-6 py-2 rounded-lg font-semibold hover:bg-gray-200">
                Cancelar
            </a>
        </div>
    </form>

</div>
</x-app-layout>
