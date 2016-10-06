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

use Eccube\Plugin\AbstractPluginManager;

/**
 * Class PluginManager
 * @package Plugin\ProductRequest
 */
class PluginManager extends AbstractPluginManager
{
    /**
     * プラグインインストール時の処理
     *
     * @param array  $config
     * @param object $app
     * @throws \Exception
     */
    public function install($config, $app)
    {
        $this->migrationSchema($app, __DIR__.'/Migration', $config['code']);
    }

    /**
     * プラグイン削除時の処理
     *
     * @param array  $config
     * @param object $app
     */
    public function uninstall($config, $app)
    {
        $this->migrationSchema($app, __DIR__.'/Migration', $config['code'], 1);
    }

    /**
     * プラグイン有効時の処理
     *
     * @param array  $config
     * @param object $app
     * @throws \Exception
     */
    public function enable($config, $app)
    {
    }

    /**
     * プラグイン無効時の処理
     *
     * @param array  $config
     * @param object $app
     */
    public function disable($config, $app)
    {
    }

    /**
     * @param array  $config
     * @param object $app
     */
    public function update($config, $app)
    {
    }
}
