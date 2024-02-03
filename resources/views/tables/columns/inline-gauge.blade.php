@php
    $value = min(round(($getState() / $getUpperBound()) * 100), $getUpperBound());
    $isValueHidden = $isValueHidden();
    $size = $getSize(); // sm, md, xl
@endphp

<x-kainiklas-filament-gauge::gauge
    :value="$value"
    :size="$size"
    :isValueHidden="$isValueHidden"
/>
</div>
