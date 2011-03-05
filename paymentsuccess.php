<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

echo "<h2>Payment was a success</h2>";
echo "Here are the values we collected during the payment:<br/><br/>";

foreach($_POST as $name => $value) {
    echo "$name : $value<br>";
}

?>
