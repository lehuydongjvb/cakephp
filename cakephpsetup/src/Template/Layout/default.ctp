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

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <<!-- ?= $this->meta('') ?> -->

    <?= $this->html->css('bootstrap.min.css') ?>
    <?= $this->html->css('bootstrap-datetimepicker.css') ?>
    <?= $this->html->css('cake.generic.css') ?>
    <?= $this->html->css('datepicker.min.css') ?>
    <?= $this->html->css('font-awesome.css') ?>
    <?= $this->html->css('font-awesome.min.css') ?>
    <?= $this->html->css('formValidation.min.css') ?>
    <?= $this->html->css('jquery.ui.timepicker.css') ?>
    <?= $this->html->css('jquery-ui.css') ?>
    <?= $this->html->css('style.css') ?>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <?= $this->html->script('bootstrap.min.js') ?>
    <?= $this->html->script('bootstrap-datepicker.min.js') ?>
    <?= $this->html->script('bootstrap-datetimepicker.js') ?>
    <?= $this->html->script('bootstrapValidator.js') ?>
    <?= $this->html->script('datetimepicker.js') ?>
    <?= $this->html->script('formValidation.min.js') ?>
    <?= $this->html->script('jquery.timepicker.js') ?>
    <?= $this->html->script('jquery.ui.position.min.js') ?>
    <?= $this->html->script('jquery.ui.timepicker.js') ?>
    <?= $this->html->script('jquery.validate.min.js') ?>
    <?= $this->html->script('jquery-2.1.3.js') ?>
    <?= $this->html->script('jquery-ui.js') ?>
    <?= $this->html->script('multiselect.js') ?>

   
    <?= $this->Element('header') ?>
</head>
<body>
     
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    <footer>
        <?= $this->Element('footer') ?>
    </footer>
</body>
</html>
