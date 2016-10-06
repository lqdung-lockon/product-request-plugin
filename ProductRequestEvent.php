<?php

/*
 * This file is part of the ProductRequest
 *
 * Copyright (C) 2016 EC-CUBE VN
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\ProductRequest;

use Eccube\Event\EventArgs;

/**
 * Class ProductRequestEvent
 * @package Plugin\ProductRequest
 */
class ProductRequestEvent
{
    /** @var  \Eccube\Application $app */
    private $app;

    /**
     * ProductRequestEvent constructor.
     * @param object $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * @param EventArgs $event
     */
    public function onFrontProductDetailInitialize(EventArgs $event)
    {
    }
}
