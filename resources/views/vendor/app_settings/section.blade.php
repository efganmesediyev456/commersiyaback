<div class="col-6 mb-5">
    <div class="{{ Arr::get($fields, 'section_class', config('app_settings.section_class', 'card')) }} section-{{ Str::slug($fields['title']) }}" style="height: 100%">
        <div class="{{ Arr::get($fields, 'section_heading_class', config('app_settings.section_heading_class', 'card-header')) }}" style="background-color: unset">
            <i class="{{ Arr::get($fields, 'icon', 'glyphicon glyphicon-flash') }}"></i>
            {{ $fields['title'] }}
        </div>

        @if( $desc = Arr::get($fields, 'descriptions') )
            <div class="pb-0 {{ config('app_settings.section_body_class', Arr::get($fields, 'section_body_class', 'card-body')) }}">
                <p class="text-muted mb-0 ">{{ $desc }}</p>
            </div>
        @endif

        {{ $slot }}
    </div>
<!-- end card for {{ $fields['title'] }} -->
</div>
