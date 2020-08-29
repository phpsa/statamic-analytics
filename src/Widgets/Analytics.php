<?php

namespace Phpsa\StatamicAnalytics\Widgets;

use Illuminate\Support\Str;
use Spatie\Analytics\Period;
use Statamic\Widgets\Widget;
use Statamic\Exceptions\MethodNotFoundException;
use Spatie\Analytics\AnalyticsFacade as GAnalytics;

class Analytics extends Widget
{

    protected $views = [
        'totalVisitorsAndPageViews',
        'mostVisitedPages',
        'topReferrers',
        'topBrowsers'
    ];
    /**
     * The HTML that should be shown in the widget.
     *
     * @return \Illuminate\View\View
     * //https://github.com/spatie/laravel-analytics
     */
    public function html()
    {

        $version = Str::camel($this->config('group', 'most_visited_pages'));


        if (!in_array($version, $this->views)) {
            throw new MethodNotFoundException(__('statamic-analytics::messages.method_not_found', ['widget' => $version]));
        }

        return $this->{$version}();
    }


    public function totalVisitorsAndPageViews()
    {
        $data = $message = null;
        $period = Period::days($this->config('days', 10));

        try {
            $data = GAnalytics::fetchTotalVisitorsAndPageViews($period);
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }


        return view('phpsa-analytics::widgets.total-vistitors-and-page', ['data' => $data->reverse(), 'message' => $message]);
    }
    public function topReferrers()
    {
        $data = $message = null;
        $period = Period::days($this->config('days', 7));
        $maxResults = $this->config('max_results', 10);

        try {
            $data = GAnalytics::fetchTopReferrers($period, $maxResults);
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        return view('phpsa-analytics::widgets.top-referrers', ['data' => $data, 'message' => $message]);
    }

    public function topBrowsers()
    {
        $data = $message = null;
        $period = Period::days($this->config('days', 7));
        $maxResults = $this->config('max_results', 10);

        try {
            $data = GAnalytics::fetchTopBrowsers($period, $maxResults);
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        return view('phpsa-analytics::widgets.top-browsers', ['data' => $data, 'message' => $message]);
    }

    public function mostVisitedPages()
    {

        $data = $message = null;
        $period = Period::days($this->config('days', 7));
        $maxResults = $this->config('max_results', 10);
        try {
            $data = GAnalytics::fetchMostVisitedPages($period, $maxResults);
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        return view('phpsa-analytics::widgets.most-visited-pages', ['data' => $data, 'message' => $message]);
    }
}
