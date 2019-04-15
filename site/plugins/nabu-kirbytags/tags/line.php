<?php

return [
    'html' => function($tag) {
        return '<hr class="' . $tag->value . '">';
    }
];
