<?php

function getThemeSettings() {
    $variable = get_field('menus', 'option');

    return [
        'menus' => $variable,
    ];
}

add_action('rest_api_init', function () {
    register_rest_route(
        'theme',
        '/settings',
        [
            'methods' => 'GET',
            'callback' => 'getThemeSettings',
        ],
    );
});
