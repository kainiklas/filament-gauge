<?php

namespace Kainiklas\FilamentGauge\Tables\Columns;

use Closure;
use Filament\Tables\Columns\Column;
use Kainiklas\FilamentGauge\Enums\GaugeSize;

class InlineGauge extends Column
{
    protected string $view = 'kainiklas-filament-gauge::tables.columns.inline-gauge';

    protected string | Closure | null $sectionColor = null;

    protected string | Closure | null $shapeColor = null;

    protected GaugeSize | Closure | null $size = null;

    protected bool | Closure | null $isValueHidden = null;

    protected int | Closure | null $upperBound = null;

    public function shapeColor(string | Closure | null $color): static
    {
        $this->shapeColor = $color;

        return $this;
    }

    public function sectionColor(string | Closure | null $color): static
    {
        $this->sectionColor = $color;

        return $this;
    }

    public function size(GaugeSize | Closure | null $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function valueHidden(bool | Closure | null $isValueHidden = true): static
    {
        $this->isValueHidden = $isValueHidden;

        return $this;
    }

    public function getSectionColor(): string
    {
        return $this->evaluate($this->sectionColor) ?? 'text-primary-600';
    }

    public function getShapeColor(): string
    {
        return $this->evaluate($this->shapeColor) ?? 'text-gray-300 dark:text-gray-700';
    }

    public function getSize(): string
    {
        return $this->evaluate($this->size)?->value ?? GaugeSize::SM->value;
    }

    public function isValueHidden(): bool
    {
        return $this->evaluate($this->isValueHidden) ?? false;
    }

    public function upperBound(int | Closure | null $upperBound): static
    {
        $this->upperBound = $upperBound;

        return $this;
    }

    public function getUpperBound(): int | float
    {
        return $this->evaluate($this->upperBound) ?? 100;
    }
}
