<?php
/**
 * Created by PhpStorm.
 * User: q
 * Date: 09/12/18
 * Time: 12:44
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Don't allow direct access

$min_disp = 10;
$disp = max(round($args["current_points"], 10, PHP_ROUND_HALF_UP), $min_disp);

?><div class='loyalty-points-display'>
    <h1>WMC Training Rewards</h1>
    <div class="points">
        <?php
        foreach (range(1, $disp) as $i) {
            ?>
            <div class="point <?= ($args["current_points"]>=$i) ? "fill" : "" ?>">
                <?php
                if ($args["current_points"] < $i) {
                    echo $i;
                }
                ?>
            </div>
            <?php
        }
        ?>
    </div>
</div>