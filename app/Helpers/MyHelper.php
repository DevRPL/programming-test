<?php

if (!function_exists('generate_code')) {
    /**
     * description.
     *
     * @param
     *
     * @return
     */
    function generate_code($table, $string)
    {
        $num_query = \DB::table($table)->orderBy('id', 'desc')->first(['id']);
        $number_old = isset($num_query) ? preg_replace('/[^0-9]+/', '', $num_query->id) : 0;
        return str_pad($number_old + 1, 3, '0', STR_PAD_LEFT);
    }
}
