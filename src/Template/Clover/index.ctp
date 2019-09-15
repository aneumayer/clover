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
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

// Add the custom scripts for the tag cloud
$this->Html->css('jqcloud.css', ['block' => 'css']);
$this->Html->script('jqcloud-1.0.4.min.js', ['block' => 'script']);
?>

<center>
    <h1>Welcome to our clover patch!</h1>
    <br>
    <p>
        <a href="./generate" target="_blank" class="btn btn-success">Get a Clover</a>
        <a href="./event"  class="btn btn-success">Found a Clover</a>
        <a href="./history" class="btn btn-success">Check a Clover</a>
    </p>
    <br>
    <!--- Clover Patch --->
    <div id="container" style="width: 600px; height: 400px;"></div>
    <script>
        var myTags = [
            <?php 
                $samlpe_size = 200;
                for ($i = 1; $i <= $samlpe_size; $i++) {
                    $weight = mt_rand(1, 10);
                    echo "{
                        text: \"a\",
                        html: { title: \"Clover\", \"class\": \"clover-font\" },
                        weight: $weight, 
                        link: \"./view/public_id/#\"
                    }";
                    if ($i < $samlpe_size) echo ",";
                }
            ?>
        ];
        $("#container").jQCloud(myTags);
    </script>
    <!--- Add a counter --->
</center>
