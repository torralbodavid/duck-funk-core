<?php

/*
 * Feel free to modify Duck Funk CMS parameters here.
 */
return [

    /*
     * The hotel name
     */
    'name' => 'Duck Funk',

    /*
     * Keko naming
     */
    'keko' => 'Duck',

    /*
     * The route the CMS core will get to build the website.
     */
    'route' => '/',

    /*
     * The route the CMS core will get to build the housekeeping.
     */
    'housekeeping_route' => '/labs',

    /*
     * The view template the CMS core will get to build the website.
     *
     * As default, Duck Funk Core will get fuse template.
     */
    'template' => 'fuse',

    'hotel' => env('HOTEL_DOMAIN', 'https://www.habbo.com/'),

    /*
     * Emulator connection params
     */
    'host_server' => '127.0.0.1',
    'port_server' => '3000',

    /*
     * RCON connection params
     */
    'host_rcon' => '127.0.0.1',
    'port_rcon' => '3001',
    'auth_key_rcon' => env('RCON_AUTH_KEY', 'IA1LLX4QZI7U63AKQEULQ3D84SYAKTO7'),

    /*
     * Welcome params
     */

    'welcome_enabled' => env('RCON_AUTH_KEY', true),
];
