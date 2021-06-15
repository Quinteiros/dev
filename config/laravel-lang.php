<?php

/* ------------------------------------------------------------------------------
 |  USAGE => ttps://github.com/ARCANEDEV/LaravelLang/blob/master/_docs/3-Usage.md
 | ------------------------------------------------------------------------------
 */


return [

    /* -----------------------------------------------------------------
     |  The vendor path
     | -----------------------------------------------------------------
     */

    /** @link      https://github.com/Laravel-Lang/lang */
    'vendor'    => [
        base_path('vendor/laravel-lang/lang/locales'),
    ],

    /* -----------------------------------------------------------------
     |  Supported locales
     | -----------------------------------------------------------------
     | If you want to limit your translations, set your supported locales list.
     */

    'locales'   => [
        'fr', 'pt', 'en'
    ],

    /* -----------------------------------------------------------------
     |  Check Settings
     | -----------------------------------------------------------------
     */

    'check'     => [
        'ignore'  => [
            'validation.custom',
            'validation.attributes',
        ],
    ],

];
