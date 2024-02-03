@props(['value', 'size', 'isValueHidden'])

@php

    $circumference = 332; // 2 * pi * radius (=53)
    $valueInCircumference = ($value / 100) * $circumference;
    $strokeDasharray = $circumference . ' ' . $circumference;
    $initialOffset = $circumference;
    $strokeDashoffset = $initialOffset - $valueInCircumference;

    $sizes = [
        'sm' => [
            'width' => '32',
            'height' => '32',
            'textSize' => 'text-xs',
        ],
        'md' => [
            'width' => '38',
            'height' => '38',
            'textSize' => 'text-sm',
        ],
        'xl' => [
            'width' => '50',
            'height' => '50',
            'textSize' => 'text-xl',
        ],
        '2xl' => [
            'width' => '100',
            'height' => '100',
            'textSize' => 'text-2xl',
        ],
    ];

@endphp

<div {{ $attributes->merge(['class' => 'fi-ta-text grid gap-y-1 px-3']) }}>
    <div class="relative flex flex-col items-center justify-center">
        <svg
            fill="none"
            shape-rendering="crispEdges"
            height="{{ $sizes[$size]['height'] }}"
            width="{{ $sizes[$size]['width'] }}"
            viewBox="0 0 120 120"
            stroke-width="1"
            class="transform -rotate-90"
        >
            <circle
                class="text-gray-300 fi-inline-gauge-shape-color dark:text-gray-700"
                stroke-width="14"
                stroke="currentColor"
                fill="transparent"
                shape-rendering="geometricPrecision"
                r="53"
                cx="60"
                cy="60"
            />
            <circle
                class="fi-inline-gauge-section-color text-primary-600"
                stroke-width="14"
                stroke-dasharray="{{ $strokeDasharray }}"
                stroke-dashoffset="{{ $initialOffset }}"
                shape-rendering="geometricPrecision"
                stroke="currentColor"
                fill="transparent"
                r="53"
                cx="60"
                cy="60"
                style="stroke-dashoffset: {{ $strokeDashoffset }}"
            />
        </svg>

        @if (!$isValueHidden)
            <div class="absolute flex">
                <p class="{{ $sizes[$size]['textSize'] }}">{{ $value }}</p>
            </div>
        @endif

    </div>
</div>
