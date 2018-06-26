<?php

namespace Lym125\Sms\Chuanglan;

use Exception as BaseException;

class Exception extends BaseException
{
    public function __construct(string $message = 'Chuanglan error.')
    {
        parent::__construct($message);
    }
}
