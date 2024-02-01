<?php

namespace Kainiklas\FilamentInlineGauge\Tables\Columns;

use Closure;
use Filament\Tables\Columns\Column;
use Kainiklas\FilamentInlineGauge\Enums\InlineGaugeSize;

class InlineGauge extends Column
{
    protected string $view = 'kainiklas-filament-inline-gauge::tables.columns.inline-gauge';

    /**
     * @var string | Closure | null
     */
    protected string | Closure | null $sectionColor = null;

    /**
     * @var string | Closure | null
     */
    protected string | Closure | null $shapeColor = null;

    /**
     * @var string | Closure | null
     */
    protected InlineGaugeSize | Closure | null $size = null;

    /**
     * @var string | Closure | null
     */
    protected bool | Closure | null $isValueHidden = null;

    /**
     * @var int | float | Closure | null
     */
    protected int | Closure | null $upperBound = null;


    /**
     * @param  string | Closure | null  $color
     */
    public function shapeColor(string | Closure | null $color): static
    {
        $this->shapeColor = $color;

        return $this;
    }

    /**
     * @param  string | Closure | null  $color
     */
    public function sectionColor(string | Closure | null $color): static
    {
        $this->sectionColor = $color;

        return $this;
    }

    /**
     * @param  string | Closure | null  $color
     */
    public function size(InlineGaugeSize | Closure | null $size): static
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @param  string | Closure | null  $isValueHidden
     */
    public function valueHidden(bool | Closure | null $isValueHidden = true): static
    {
        $this->isValueHidden = $isValueHidden;

        return $this;
    }

    /**
     * @return string
     */
    public function getSectionColor(): string
    {
        return $this->evaluate($this->sectionColor) ?? 'text-primary-600';
    }

    /**
     * @return string
     */
    public function getShapeColor(): string
    {
        return $this->evaluate($this->shapeColor) ?? 'text-gray-300 dark:text-gray-700';
    }

    /**
     * @return string
     */
    public function getSize(): string
    {
        return $this->evaluate($this->size)?->value ?? InlineGaugeSize::SM->value;
    }

    /**
     * @return bool
     */
    public function isValueHidden(): bool
    {
        return $this->evaluate($this->isValueHidden) ?? false;
    }

    /**
     * @param int | Closure | null  $upperBound
     */
    public function upperBound(int | Closure | null $upperBound): static
    {
        $this->upperBound = $upperBound;
        return $this;
    }


    /**
     * @return int | float
     */
    public function getUpperBound(): int | float
    {
        return $this->evaluate($this->upperBound) ?? 100;
    }

}
