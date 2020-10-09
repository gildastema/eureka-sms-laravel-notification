<?php

namespace Eureka\SMS;

use Eureka\SMS\EurekaSmsNotification;
use Illuminate\Support\Facades\Facade;

/**
 * @see \Gildastema\EurekaSmsNotification\Skeleton\SkeletonClass
 */
class EurekaSmsNotificationFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return EurekaSmsNotification::class;
    }
}
