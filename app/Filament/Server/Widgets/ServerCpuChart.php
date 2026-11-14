<?php

namespace App\Filament\Server\Widgets;

use App\Models\Server;
use Filament\Facades\Filament;
use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;

class ServerCpuChart extends ChartWidget
{
    protected ?string $pollingInterval = null;

    protected ?string $maxHeight = '200px';

    public ?Server $server = null;

    public static function canView(): bool
    {
        /** @var Server $server */
        $server = Filament::getTenant();

        return !$server->isInConflictState() && !$server->retrieveStatus()->isOffline();
    }

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'data' => [],
                    'backgroundColor' => [
                        'rgba(255, 138, 50, 0.20)',
                    ],
                    'borderColor' => '#ff8a32',
                    'tension' => '0.3',
                    'fill' => true,
                ],
            ],
            'labels' => [],
            'locale' => user()->language ?? 'en',
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): RawJs
    {
        return RawJs::make(<<<'JS'
        {
            color: '#a1a8b5',
            scales: {
                y: {
                    min: 0,
                    ticks: { color: '#a1a8b5' },
                    grid: { color: 'rgba(161, 168, 181, 0.12)' },
                },
                x: {
                    display: false,
                    grid: { display: false },
                }
            },
            plugins: {
                legend: {
                    display: false,
                }
            }
        }
    JS);
    }

    public function getHeading(): string
    {
        return trans('server/console.labels.cpu');
    }
}
