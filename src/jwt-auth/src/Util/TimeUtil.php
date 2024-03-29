<?php

declare(strict_types=1);
/**
 * This file is part of MineAdmin.
 *
 * @link     https://www.mineadmin.com
 * @document https://doc.mineadmin.com
 * @contact  root@imoi.cn
 * @license  https://github.com/mineadmin/MineAdmin/blob/master/LICENSE
 */

namespace Xmo\JWTAuth\Util;

use Carbon\Carbon;

class TimeUtil
{
    /**
     * Get the Carbon instance for the current time.
     *
     * @return Carbon
     */
    public static function now()
    {
        return Carbon::now('UTC');
    }

    /**
     * Get the Carbon instance for the timestamp.
     *
     * @param int $timestamp
     *
     * @return Carbon
     */
    public static function timestamp($timestamp)
    {
        return Carbon::createFromTimestampUTC($timestamp)->timezone('UTC');
    }

    /**
     * Checks if a timestamp is in the past.
     *
     * @param int $timestamp
     * @param int $leeway
     *
     * @return bool
     */
    public static function isPast($timestamp, $leeway = 0)
    {
        return static::timestamp($timestamp)->addSeconds($leeway)->isPast();
    }

    /**
     * Checks if a timestamp is in the future.
     *
     * @param int $timestamp
     * @param int $leeway
     *
     * @return bool
     */
    public static function isFuture($timestamp, $leeway = 0)
    {
        return static::timestamp($timestamp)->subSeconds($leeway)->isFuture();
    }
}
