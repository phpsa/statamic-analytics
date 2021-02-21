<?php
namespace Phpsa\StatamicAnalytics;

use Statamic\Events;
use Statamic\Facades\Config;

class Subscriber
{
    protected $blueprint;

    /**
     * List of subscribed events
     *
     * @var array
     */
    protected $events = [
        Events\EntryBlueprintFound::class => 'addFields',
    ];

    /**
     * Registers event listeners
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        foreach ($this->events as $event => $method) {
            $events->listen($event, self::class.'@'.$method);
        }
    }

    /**
     * Add SEOtamic fields to the collection blueprint
     *
     * @param mixed $event
     */
    public function addFields($event)
    {
        $this->blueprint = $event->blueprint;

        if ($event->entry === null) {
            return;
        }

        $site = Config::getSite();
        $enabled = collect(Config::get('statamic-analytics.sites.' . $site))->get('page_graph', false);

        if (! $enabled) {
            return;
        }

        $fields = $this->getFields();

        collect($fields)->each(function ($field) {
            $this->blueprint->ensureFieldInSection($field['handle'], $field['field'], 'Analytics');
        });
    }

    /**
     * Array of SEOtamic fields
     *
     * @return array
     */
    private function getFields()
    {
        return [
            [
                'handle' => 'ga_page_stats_field',
                'field'  => [
                    'display'     => 'Analytics',
                    'listable'    => 'hidden',
                    'type'        => 'ga_page_stats_field',
                    'localizable' => false
                ],
            ]
        ];
    }
}
