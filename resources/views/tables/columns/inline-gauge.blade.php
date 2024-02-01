@php
    $value = min(round($getState() / $getUpperBound() * 100), $getUpperBound());
    $isValueHidden = $isValueHidden();
    $size = $getSize(); // sm, md, xl
    $shapeColour = $getShapeColor();
    $sectionColour = $getSectionColor();

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
    ];
@endphp
<div class="w-full">
    <div class="relative flex flex-col items-center justify-center">
        <svg fill="none" shape-rendering="crispEdges" height="{{ $sizes[$size]['height'] }}"
            width="{{ $sizes[$size]['width'] }}" viewBox="0 0 120 120" stroke-width="1" class="transform -rotate-90">
            <circle class="{{ $shapeColour }}" stroke-width="14" stroke="currentColor" fill="transparent"
                shape-rendering="geometricPrecision" r="53" cx="60" cy="60" />
            <circle class="{{ $sectionColour }}" stroke-width="14" stroke-dasharray="{{ $strokeDasharray }}"
                stroke-dashoffset="{{ $initialOffset }}" shape-rendering="geometricPrecision" stroke="currentColor"
                fill="transparent" r="53" cx="60" cy="60"
                style="stroke-dashoffset: {{ $strokeDashoffset }}" />
        </svg>
        @if (!$isValueHidden)
            <div class="absolute flex">
                <p class="{{ $sizes[$size]['textSize'] }}">{{ $value }}</p>
            </div>
        @endif
    </div>
</div>
