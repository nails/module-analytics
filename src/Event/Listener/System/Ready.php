<?php

namespace Nails\Analytics\Event\Listener\System;

use Nails\Analytics\Constants;
use Nails\Common\Events;
use Nails\Common\Events\Subscription;
use Nails\Common\Exception\NailsException;
use Nails\Factory;
use ReflectionException;

/**
 * Class Ready
 *
 * @package Nails\Analytics\Event\Listener\System
 */
class Ready extends Subscription
{
    /**
     * Ready constructor.
     *
     * @throws NailsException
     * @throws ReflectionException
     */
    public function __construct()
    {
        $this
            ->setEvent(Events::SYSTEM_READY)
            ->setNamespace(Events::getEventNamespace())
            ->setCallback([$this, 'execute']);
    }

    // --------------------------------------------------------------------------

    public function execute(): void
    {
        /** @var \Nails\Analytics\Service\Drivers $oDrivers */
        $oDrivers = Factory::service('Drivers', Constants::MODULE_SLUG);
        foreach ($oDrivers->getAll() as $oDriver) {
            /** @var \Nails\Analytics\Interfaces\Driver $oInstance */
            $oInstance = $oDrivers->getInstance($oDriver);
            $oInstance->boot();
        }
    }
}
