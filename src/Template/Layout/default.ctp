<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
$app_name = "Kindness Clovers";
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <title><?= $app_name . ': ' . $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon', '/img/favicon.ico', array('type' => 'icon')) ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('main.css') ?>
    <?= $this->Html->script('jquery-3.4.1.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a href="./" class="navbar-brand"><?= $app_name ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./resources">Resources</a>
                </li>
            </ul>
            <a href="https://www.connectionsinc.org" class="navbar-brand">
                <img src="./img/connections-logo.png" class="conn-logo">
            </a>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
