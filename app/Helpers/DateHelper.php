<?php

if (!function_exists('utc_now')) {
    function utc_now()
    {
        date_default_timezone_set('UTC');
        $now = new \DateTime();

        return $now->format(\DateTime::ATOM);
    }
}

if (!function_exists('date_iso')) {
    function date_iso($date)
    {
        $now = new \DateTime($date);
        $now->setTimezone(new \DateTimeZone('UTC'));

        return $now->format('Y-m-d\TH:i:s.u\Z');
    }
}

if (!function_exists('msectime')) {
    function msectime()
    {
        list($msec, $sec) = explode(' ', microtime());

        return $sec.'000';
    }
}

if (!function_exists('get_date_range')) {
    function get_date_range($mode, $index = 0, $start = null, $end = null)
    {
        $date_start = !is_null($start) ? \Carbon\Carbon::createFromFormat('d/m/Y', $start)->startOfDay() : now();
        $date_end = !is_null($end) ? \Carbon\Carbon::createFromFormat('d/m/Y', $end)->endOfDay() : now();

        if ($mode == 'day') {
            $date_start = $date_start->startOfDay()->subDay($index);
            $date_end = $date_end->endOfDay()->subDay($index);
        } elseif ($mode == 'week') {
            $date_start = $date_start->startOfWeek()->subWeek($index);
            $date_end = $date_end->endOfWeek()->subWeek($index);
        } elseif ($mode == 'month') {
            $date_start = $date_start->startOfMonth()->subMonth($index);
            $date_end = $date_end->endOfMonth()->subMonth($index);
        }

        return compact('date_start', 'date_end');
    }
}

if (!function_exists('get_date_ranges')) {
    function get_date_ranges($mode)
    {
        if ($mode == 'day') {
            $i = 29;
        } elseif ($mode == 'week') {
            $i = 3;
        } elseif ($mode == 'month') {
            $i = 11;
        }

        while ($i >= 0) {
            $date_ranges[] = get_date_range($mode, $i);
            $i--;
        }

        return $date_ranges;
    }
}

if (!function_exists('get_start_of_month')) {
    function get_start_of_month()
    {
        return \Carbon\Carbon::now()->startOfMonth();
    }
}

if (!function_exists('strtotimejkt')) {
    function strtotimejkt(string $date)
    {
        return strtotime($date.' Asia/Jakarta');
    }
}

if (!function_exists('carbon_datetime_format')) {
    function carbon_datetime_format($format, $date)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)
            ->format($format);
    }
}

if (!function_exists('carbon_date_format')) {
    function carbon_date_format($format, $date)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d', $date)
            ->format($format);
    }
}


if (!function_exists('get_of_day')) {
    function get_of_day($start)
    {
        return \Carbon\Carbon::createFromFormat('d/m/Y', $start);
    }
}

if (!function_exists('get_start_of_week')) {
    function get_start_of_week()
    {
        return \Carbon\Carbon::now()->startOfWeek();
    }
}

if (!function_exists('get_end_of_week')) {
    function get_end_of_week()
    {
        return \Carbon\Carbon::now()->endOfWeek();
    }
}

if (!function_exists('today')) {
    function today()
    {
        return \Carbon\Carbon::today();
    }
}

if (!function_exists('carbon_parse')) {
    function carbon_parse($param, $format)
    {
        return \Carbon\Carbon::parse($param)->format($format);
    }
}
