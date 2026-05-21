{{-- partials/public-footer.blade.php --}}
<footer class="flex items-center justify-center flex-wrap gap-7 px-7 py-4 bg-[var(--arena-l)] border-t border-[var(--border)] mt-12">
    <img src="{{ asset('images/logo-pem-simbolo.svg') }}"
         alt="PEM" class="h-8 w-auto max-w-[130px] object-contain">
<!--     <img src="{{ asset('images/logo-municipio.png') }}"
         alt="Alcaldía de Necoclí" class="h-8 w-auto max-w-[130px] object-contain">
    <img src="{{ asset('images/logo-necocli.svg') }}"
         alt="Necoclí" class="h-8 w-auto max-w-[130px] object-contain">
    /<img src="{{ asset('images/logo-fgs.svg') }}"
         alt="Fundación Grupo Social" class="h-8 w-auto max-w-[130px] object-contain"> -->

    <small class="ml-auto text-[11px] text-[var(--gris)]">
        © {{ date('Y') }} Mesa Municipal de Educación de Necoclí ·
        Plan Educativo Municipal 2025—2035
    </small>
</footer>
