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

class ConfigController
{

    /**
     * ProductRequest用設定画面
     *
     * @param Application $app
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Application $app, Request $request)
    {

        $form = $app['form.factory']->createBuilder('productrequest_config')->getForm();

        if ('POST' === $request->getMethod()) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $data = $form->getData();

                // add code...
            }
        }

        return $app->render('ProductRequest/Resource/template/admin/config.twig', array(
            'form' => $form->createView(),
        ));
    }

}
