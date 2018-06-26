<?php

namespace Lym125\Sms\Chuanglan;

use Illuminate\Support\Facades\Facade as BaseFacade;

class Facade extends BaseFacade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'sms.chuanglan';
    }
}
