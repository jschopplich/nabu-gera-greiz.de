<?php

return function ($kirby) {
    $collection = $kirby
        ->page('aktuelles')
        ->children()
        ->listed()
        ->filterBy('template', 'article');

    $waldhaus = $kirby
        ->page('projekte/naturschutzinformation-waldhaus')
        ->children()
        ->listed()
        ->filterBy('template', 'article');

    return $collection
        ->add($waldhaus)
        ->sortBy(fn($child) => $child->date()->toDate(), 'desc');
};
