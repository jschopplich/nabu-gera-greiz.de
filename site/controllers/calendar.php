<?php

use Kirby\Data\Json;

return function ($page) {
    $events = [];

    foreach ($page->calendar()->toStructure() as $event) {
        $events[] = [
            'structure' => $event,
            'serializedSchema' => Json::encode([
                '@context' => 'http://www.schema.org',
                '@type' => 'Event',
                'name' => $event->eventTitle()->value(),
                'url' => $page->url(),
                'description' => $event->eventDescription()->value(),
                'startDate' => $event->eventDateOption()->value() === 'date'
                    ? $event->eventStarts()->toDate('%Y-%m-%dT%H:%M')
                    : $event->eventIntervalStarts()->toDate('%Y-%m-%d'),
                'endDate' => $event->eventDateOption()->value() !== 'date'
                    ? $event->eventIntervalEnds()->toDate('%Y-%m-%d')
                    : null,
                'location' => [
                    '@type' => 'Place',
                    'name' => $event->eventLocation()->value()
                ]
            ])
        ];
    }

    return compact('events');
};
