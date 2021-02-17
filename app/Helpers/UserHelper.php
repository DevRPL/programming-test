<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('site_permission')) {
    /**
     * description.
     *
     * @param
     *
     * @return
     */
    function site_permission($name, $code)
    {
        abort_unless(\Gate::allows($name), $code);
    }
}


if (!function_exists('user')) {
    /**
     * description.
     *
     * @param
     *
     * @return
     */
    function user()
    {
        return Auth::user();
    }
}


if (!function_exists('get_role')) {
    /**
     * description.
     *
     * @param
     *
     * @return
     */
    function get_role()
    {
        return Auth::user()->roles()->first();
    }
}


if (!function_exists('get_session')) {
    /**
     * description.
     *
     * @param
     *
     * @return
     */
    function get_session()
    {
        return \DB::table('sessions')->where('user_id', Auth::user()->id)->first();
    }
}