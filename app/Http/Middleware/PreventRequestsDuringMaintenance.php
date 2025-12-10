<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\HandleCors;

class PreventRequestsDuringMaintenance extends \Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance
{
    /**
     * The URIs that should be reachable even during maintenance mode.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
