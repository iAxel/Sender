<?php

if (! function_exists('sms')) {

    /**
     * @param string $phone
     * @param string $text
     *
     * @return bool
     */
    function sms(string $phone, string $text): bool
    {
        return app(\iAxel\Sender\Sender::class)->sms($phone, $text);
    }
}
