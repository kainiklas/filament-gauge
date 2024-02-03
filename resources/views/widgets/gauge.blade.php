@php
    use Filament\Support\Enums\IconPosition;
    use Filament\Support\Facades\FilamentView;

    $descriptionColor = $getDescriptionColor() ?? 'gray';
    $descriptionIcon = $getDescriptionIcon();
    $descriptionIconPosition = $getDescriptionIconPosition();
    $url = $getUrl();
    $tag = $url ? 'a' : 'div';

    $descriptionIconClasses = \Illuminate\Support\Arr::toCssClasses([
        'fi-wi-stats-overview-stat-description-icon h-5 w-5',
        match ($descriptionColor) {
            'gray' => 'text-gray-400 dark:text-gray-500',
            default => 'text-custom-500',
        },
    ]);

    $descriptionIconStyles = \Illuminate\Support\Arr::toCssStyles([
        \Filament\Support\get_color_css_variables($descriptionColor, shades: [500], alias: 'widgets::stats-overview-widget.stat.description.icon') => $descriptionColor !== 'gray',
    ]);

    $value = min(round(($getValue() / $getUpperBound()) * 100), $getUpperBound());
    $isValueHidden = $isValueHidden();
    $size = $getSize(); // sm, md, xl

@endphp

<{!! $tag !!}
    @if ($url) {{ \Filament\Support\generate_href_html($url, $shouldOpenUrlInNewTab()) }} @endif
    {{ $getExtraAttributeBag()->class([
        'fi-wi-stats-overview-stat relative rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10',
    ]) }}
>
    <div class="grid gap-y-2">
        <div class="flex items-center gap-x-2">
            @if ($icon = $getIcon())
                <x-filament::icon
                    :icon="$icon"
                    class="w-5 h-5 text-gray-400 fi-wi-stats-overview-stat-icon dark:text-gray-500"
                />
            @endif

            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                {{ $getLabel() }}
            </span>
        </div>

        <div class="text-3xl font-semibold tracking-tight text-gray-950 dark:text-white">

            <x-kainiklas-filament-gauge::gauge
                :value="$value"
                :size="$size"
                :isValueHidden="$isValueHidden"
            />

        </div>

        @if ($description = $getDescription())
            <div class="flex items-center gap-x-1">
                @if ($descriptionIcon && in_array($descriptionIconPosition, [IconPosition::Before, 'before']))
                    <x-filament::icon
                        :icon="$descriptionIcon"
                        :class="$descriptionIconClasses"
                        :style="$descriptionIconStyles"
                    />
                @endif

                <span
                    @class([
                        'fi-wi-stats-overview-stat-description text-sm',
                        match ($descriptionColor) {
                            'gray' => 'fi-color-gray text-gray-500 dark:text-gray-400',
                            default => 'fi-color-custom text-custom-600 dark:text-custom-400',
                        },
                    ])
                    @style([
                        \Filament\Support\get_color_css_variables($descriptionColor, shades: [400, 600], alias: 'widgets::stats-overview-widget.stat.description') => $descriptionColor !== 'gray',
                    ])
                >
                    {{ $description }}
                </span>

                @if ($descriptionIcon && in_array($descriptionIconPosition, [IconPosition::After, 'after']))
                    <x-filament::icon
                        :icon="$descriptionIcon"
                        :class="$descriptionIconClasses"
                        :style="$descriptionIconStyles"
                    />
                @endif
            </div>
        @endif
    </div>
    </{!! $tag !!}>
