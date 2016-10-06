<?php

/*
 * This file is part of the ProductRequest
 *
 * Copyright (C) 2016 EC-CUBE VN
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\ProductRequest\ServiceProvider;

use Monolog\Handler\FingersCrossed\ErrorLevelActivationStrategy;
use Monolog\Handler\FingersCrossedHandler;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Plugin\ProductRequest\Form\Type\ProductRequestConfigType;
use Silex\Application as BaseApplication;
use Silex\ServiceProviderInterface;
use Symfony\Component\Translation\Loader\YamlFileLoader;

/**
 * Class ProductRequestServiceProvider
 * @package Plugin\ProductRequest\ServiceProvider
 */
class ProductRequestServiceProvider implements ServiceProviderInterface
{
    /**
     * @param BaseApplication $app
     */
    public function register(BaseApplication $app)
    {
        // プラグイン用設定画面
        $app->match('/'.$app['config']['admin_route'].'/plugin/ProductRequest/config', 'Plugin\ProductRequest\Controller\ConfigController::index')->bind('plugin_ProductRequest_config');

        // 独自コントローラ
        $app->match('/plugin/[code_name]/hello', 'Plugin\ProductRequest\Controller\ProductRequestController::index')->bind('plugin_ProductRequest_hello');

        // Form
        $app['form.types'] = $app->share($app->extend('form.types', function ($types) use ($app) {
            $types[] = new ProductRequestConfigType($app);

            return $types;
        }));

        // Form Extension

        // Repository

        // Service

         // メッセージ登録
         $app['translator'] = $app->share($app->extend('translator', function ($translator, BaseApplication $app) {
             $translator->addLoader('yaml', new YamlFileLoader());
             $file = __DIR__.'/../Resource/locale/message.'.$app['locale'].'.yml';
             $exist = file_exists($file);
             if ($exist) {
                 $translator->addResource('yaml', $file, $app['locale']);
             }

             return $translator;
         }));

        // load config
        // $conf = $app['config'];
        // $app['config'] = $app->share(function () use ($conf) {
        //     $confarray = array();
        //     $path_file = __DIR__ . '/../Resource/config/path.yml';
        //     if (file_exists($path_file)) {
        //         $config_yml = Yaml::parse(file_get_contents($path_file));
        //         if (isset($config_yml)) {
        //             $confarray = array_replace_recursive($confarray, $config_yml);
        //         }
        //     }

        //     $constant_file = __DIR__ . '/../Resource/config/constant.yml';
        //     if (file_exists($constant_file)) {
        //         $config_yml = Yaml::parse(file_get_contents($constant_file));
        //         if (isset($config_yml)) {
        //             $confarray = array_replace_recursive($confarray, $config_yml);
        //         }
        //     }

        //     return array_replace_recursive($conf, $confarray);
        // });

        // ログファイル設定
        $app['monolog.ProductRequest'] = $app->share(function ($app) {
            $logger = new $app['monolog.logger.class']('plugin.ProductRequest');

            $file = $app['config']['root_dir'].'/app/log/ProductRequest.log';
            $RotateHandler = new RotatingFileHandler($file, $app['config']['log']['max_files'], Logger::INFO);
            $RotateHandler->setFilenameFormat(
                'ProductRequest_{date}',
                'Y-m-d'
            );

            $logger->pushHandler(
                new FingersCrossedHandler(
                    $RotateHandler,
                    new ErrorLevelActivationStrategy(Logger::INFO)
                )
            );

            return $logger;
        });
    }

    /**
     * @param BaseApplication $app
     */
    public function boot(BaseApplication $app)
    {
    }
}
