<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Slot extends Model
{
    public static function create_slots($time_start, $time_end, $duration)
    {
        $timestamp_start = Carbon::createFromFormat('Y,m,d,H,m', $time_start)->timestamp;
        $timestamp_end = Carbon::createFromFormat('Y,m,d,H,m', $time_end)->timestamp;

        while ($timestamp_start + $duration < $timestamp_end) {
            $slot = new self;
            $slot->start = $timestamp_start;
            $timestamp_start += $duration;
            $slot->end = $timestamp_start;
            $slot->provider_id = 5;
            $slot->save();
        }
    }

    public static function prepare_date($date, $time)
    {
        return str_replace('-', ',', $date).','.str_replace(':', ',', $time);
    }

    public static function prepare_to_filter($time)
    {
        return Carbon::createFromFormat('Y,m,d,H,m', $time)->timestamp;
    }
    
}
