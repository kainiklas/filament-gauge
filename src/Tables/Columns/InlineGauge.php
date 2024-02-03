<?php

namespace Kainiklas\FilamentGauge\Tables\Columns;

use Filament\Tables\Columns\Column;
use Kainiklas\FilamentGauge\Concerns\HasGauge;

class InlineGauge extends Column
{
    use HasGauge;

    protected string $view = 'kainiklas-filament-gauge::tables.columns.inline-gauge';
}
