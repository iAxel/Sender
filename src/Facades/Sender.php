<?php

namespace iAxel\Sender\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \iAxel\Sender\Sender
 *
 * @method static bool sms(string $phone, string $text)
 */
class Sender extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return \iAxel\Sender\Sender::class;
    }
}
