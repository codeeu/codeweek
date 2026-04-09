<?php

return [
    /*
     * Controls whether the Resources dropdown should be rendered from Nova-managed
     * database tables when present.
     *
     * When disabled, the frontend always uses the static Blade markup fallback.
     */
    'resources_dropdown_use_nova' => env('RESOURCES_DROPDOWN_USE_NOVA', true),
];

