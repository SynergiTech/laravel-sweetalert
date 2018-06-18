<?php

namespace SynergiTech\SweetAlert;

use Illuminate\Support\Facades\Facade;

class SweetAlert extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'synergitech.sweetalert';
    }
}
