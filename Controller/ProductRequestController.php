<?php

/*
 * This file is part of the ProductRequest
 *
 * Copyright (C) 2016 EC-CUBE VN
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\ProductRequest\Controller;

use Eccube\Application;
use Symfony\Component\HttpFoundation\Request;

class ProductRequestController
{

    /**
     * ProductRequest画面
     *
     * @param Application $app
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Application $app, Request $request)
    {

        // add code...

        return $app->render('ProductRequest/Resource/template/index.twig', array(
            // add parameter...
        ));
    }

}
