<?php

namespace Nails\Analytics\Service;

use Nails\Analytics\Constants;
use Nails\Analytics\Interfaces\Driver;
use Nails\Common\Model\BaseDriver;

/**
 * Class Drivers
 *
 * @package Nails\Analytics\Service
 */
class Drivers extends BaseDriver
{
    protected $sModule        = Constants::MODULE_SLUG;
    protected $sMustImplement = Driver::class;
}
