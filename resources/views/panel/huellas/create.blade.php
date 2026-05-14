<x-app-layout>
    <x-slot name="header">Proponer Huella</x-slot>

    <div style="max-width:700px;">

        @if(session('success'))
            <div style="background:var(--palma-l);border:1px solid var(--palma);border-radius:var(--radius);padding:14px 18px;margin-bottom:20px;color:#1E5F36;font-weight:700;">
                {{ session('success') }}
            </div>
        @endif

        <div style="background:var(--white);border-radius:16px;border:1px solid var(--border);box-shadow:var(--shadow);overflow:hidden;">
            <div style="padding:20px 24px;border-bottom:1px solid var(--border);background:linear-gradient(135deg,var(--navy),var(--caribe-d));">
                <h2 style="color:#fff;font-size:16px;font-weight:800;margin:0;">🌊 Proponer una Huella</h2>
                <p style="color:rgba(255,255,255,0.7);font-size:12px;margin:4px 0 0;">Comparte una publicación de Facebook o YouTube relacionada con el PEM</p>
            </div>

            <form method="POST" action="{{ route('panel.huellas.store') }}" style="padding:24px;">
                @csrf

                <!-- URL -->
                <div style="margin-bottom:20px;">
                    <label style="display:block;font-size:12px;font-weight:800;color:var(--texto);margin-bottom:8px;font-family:'Nunito',sans-serif;">
                        🔗 URL de la publicación *
                    </label>
                    <input type="url" name="url" value="{{ old('url') }}"
                        placeholder="https://www.facebook.com/... o https://www.youtube.com/..."
                        style="width:100%;padding:11px 14px;border:2px solid var(--border);border-radius:var(--radius-s);font-size:14px;font-family:'Nunito Sans',sans-serif;outline:none;transition:border-color .2s;"
                        onfocus="this.style.borderColor='var(--turquesa)'"
                        onblur="this.style.borderColor='var(--border)'">
                    @error('url')<div style="color:var(--coral);font-size:11px;margin-top:4px;">{{ $message }}</div>@enderror
                </div>

                <!-- Plataforma -->
                <div style="margin-bottom:20px;">
                    <label style="display:block;font-size:12px;font-weight:800;color:var(--texto);margin-bottom:8px;font-family:'Nunito',sans-serif;">
                        📱 Plataforma *
                    </label>
                    <div style="display:flex;gap:10px;">
                        <label style="flex:1;cursor:pointer;">
                            <input type="radio" name="platform" value="youtube" {{ old('platform') === 'youtube' ? 'checked' : '' }} style="display:none;" class="platform-radio">
                            <div class="platform-chip" data-val="youtube" style="padding:12px;border-radius:var(--radius-s);border:2px solid var(--border);text-align:center;transition:all .2s;">
                                <i class="fab fa-youtube" style="color:#c0392b;font-size:20px;display:block;margin-bottom:4px;"></i>
                                <span style="font-size:12px;font-weight:700;font-family:'Nunito',sans-serif;">YouTube</span>
                            </div>
                        </label>
                        <label style="flex:1;cursor:pointer;">
                            <input type="radio" name="platform" value="facebook" {{ old('platform') === 'facebook' ? 'checked' : '' }} style="display:none;" class="platform-radio">
                            <div class="platform-chip" data-val="facebook" style="padding:12px;border-radius:var(--radius-s);border:2px solid var(--border);text-align:center;transition:all .2s;">
                                <i class="fab fa-facebook" style="color:var(--lila);font-size:20px;display:block;margin-bottom:4px;"></i>
                                <span style="font-size:12px;font-weight:700;font-family:'Nunito',sans-serif;">Facebook</span>
                            </div>
                        </label>
                    </div>
                    @error('platform')<div style="color:var(--coral);font-size:11px;margin-top:4px;">{{ $message }}</div>@enderror
                </div>

                <!-- Título -->
                <div style="margin-bottom:20px;">
                    <label style="display:block;font-size:12px;font-weight:800;color:var(--texto);margin-bottom:8px;font-family:'Nunito',sans-serif;">
                        📝 Título *
                    </label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        placeholder="Ej: Feria de ciencias en la IE El Totumo"
                        maxlength="200"
                        style="width:100%;padding:11px 14px;border:2px solid var(--border);border-radius:var(--radius-s);font-size:14px;font-family:'Nunito Sans',sans-serif;outline:none;transition:border-color .2s;"
                        onfocus="this.style.borderColor='var(--turquesa)'"
                        onblur="this.style.borderColor='var(--border)'">
                    @error('title')<div style="color:var(--coral);font-size:11px;margin-top:4px;">{{ $message }}</div>@enderror
                </div>

                <!-- Descripción -->
                <div style="margin-bottom:20px;">
                    <label style="display:block;font-size:12px;font-weight:800;color:var(--texto);margin-bottom:8px;font-family:'Nunito',sans-serif;">
                        💬 Descripción (opcional)
                    </label>
                    <textarea name="description" rows="3" maxlength="500"
                        placeholder="Describe brevemente esta huella..."
                        style="width:100%;padding:11px 14px;border:2px solid var(--border);border-radius:var(--radius-s);font-size:14px;font-family:'Nunito Sans',sans-serif;outline:none;transition:border-color .2s;resize:vertical;"
                        onfocus="this.style.borderColor='var(--turquesa)'"
                        onblur="this.style.borderColor='var(--border)'">{{ old('description') }}</textarea>
                </div>

                <!-- Línea estratégica -->
                <div style="margin-bottom:20px;">
                    <label style="display:block;font-size:12px;font-weight:800;color:var(--texto);margin-bottom:8px;font-family:'Nunito',sans-serif;">
                        🎯 Línea estratégica *
                    </label>
                    <select name="strategic_line_id"
                        style="width:100%;padding:11px 14px;border:2px solid var(--border);border-radius:var(--radius-s);font-size:14px;font-family:'Nunito Sans',sans-serif;outline:none;background:var(--white);">
                        <option value="">Selecciona una línea...</option>
                        @foreach($lines as $line)
                            <option value="{{ $line->id }}" {{ old('strategic_line_id') == $line->id ? 'selected' : '' }}>
                                {{ $line->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('strategic_line_id')<div style="color:var(--coral);font-size:11px;margin-top:4px;">{{ $message }}</div>@enderror
                </div>

                <!-- Colegio -->
                @if($schools->count() > 0)
                <div style="margin-bottom:24px;">
                    <label style="display:block;font-size:12px;font-weight:800;color:var(--texto);margin-bottom:8px;font-family:'Nunito',sans-serif;">
                        🏫 Institución educativa (opcional)
                    </label>
                    <select name="school_id"
                        style="width:100%;padding:11px 14px;border:2px solid var(--border);border-radius:var(--radius-s);font-size:14px;font-family:'Nunito Sans',sans-serif;outline:none;background:var(--white);">
                        <option value="">Sin institución específica</option>
                        @foreach($schools as $school)
                            <option value="{{ $school->id }}" {{ old('school_id') == $school->id ? 'selected' : '' }}>
                                {{ $school->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @endif

                <!-- Botones -->
                <div style="display:flex;gap:12px;">
                    <button type="submit"
                        style="flex:1;padding:12px;background:var(--caribe);color:#fff;border:none;border-radius:var(--radius-s);font-size:14px;font-weight:800;font-family:'Nunito',sans-serif;cursor:pointer;transition:all .2s;"
                        onmouseover="this.style.background='var(--caribe-d)'"
                        onmouseout="this.style.background='var(--caribe)'">
                        <i class="fas fa-paper-plane" style="margin-right:6px;"></i> Enviar Huella
                    </button>
                    <a href="{{ route('panel.huellas.index') }}"
                        style="padding:12px 20px;border:2px solid var(--border);border-radius:var(--radius-s);font-size:14px;font-weight:700;font-family:'Nunito',sans-serif;color:var(--gris);text-decoration:none;display:inline-flex;align-items:center;">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        document.querySelectorAll('.platform-radio').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.platform-chip').forEach(chip => {
                    chip.style.borderColor = 'var(--border)';
                    chip.style.background = 'var(--white)';
                });
                const chip = document.querySelector(`.platform-chip[data-val="${this.value}"]`);
                if(chip){
                    chip.style.borderColor = 'var(--turquesa)';
                    chip.style.background = 'var(--tur-l)';
                }
            });
        });
    </script>
    @endpush
</x-app-layout>