<?php
/**
 * User: sasik
 * Date: 2/26/16
 * Time: 1:43 PM
 */

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;

class EventsController extends BaseController
{
    public function store(Request $request)
    {
        $attributes = $request->all();
    }
}