<?php

return function ($site) {
    return $site
        ->find('aktuelles')
        ->children()
        ->listed()
        ->filterBy('template', 'article')
        ->sortBy(fn($child) => $child->date()->toDate(), 'desc');
};
