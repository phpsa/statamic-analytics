<?php

namespace Phpsa\StatamicAnalytics\Actions;

use Statamic\Entries\Entry;
use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Statamic\Http\Controllers\Controller;
use Spatie\Analytics\AnalyticsFacade as GAnalytics;

class PageGraph extends Controller
{

    public function getPageGraph(Request $request)
    {
        $entry = Entry::find($request->entry);
        if (! $entry) {
            return [];
        }
        $url = $entry->url();

        $key = 'ga_stats_' . $url;

        $data = Cache::get($key);
        $data = null;
        if ($data === null) {
            $period = Period::create(Carbon::now()->subMonth(1), Carbon::now());
            $query = GAnalytics::performQuery(
                $period,
                'ga:users,ga:pageviews',
                [
                    'filters'    => 'ga:pagePath==' . $url,
                    'dimensions' => 'ga:date'
                ]
            );

            $data = collect($query['rows'] ?? [])->map(
                function (array $dateRow) {

                    return [
                        'date'      => Carbon::createFromFormat('Ymd', $dateRow[0])->format("Y-m-d"),

                        'visitors'  => (int) $dateRow[1],
                        'pageViews' => (int) $dateRow[2],
                    ];
                }
            );

            Cache::put($key, $data, 600);
        }

        return [
            'labels'   => $data->pluck('date'),
            'datasets' => [
                [
                    'label' => 'Visitors',
                    'data'  => $data->pluck('visitors')
                ],
                [
                    'label' => 'Page Views',
                    'data'  => $data->pluck('pageViews')
                ],
            ],

        ];

        return $data;
    }
}
