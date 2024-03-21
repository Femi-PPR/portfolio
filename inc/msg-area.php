<?php
require_once "alerts.php";
if (!isset($alertMsgs))
    $alertMsgs = [["type" => "success", "msg" => "Success"]];
?>

<div class="message-area">
    <?php
    foreach ($alertMsgs as $alertMsg) {
        echo dispAlert($alertMsg["type"], $alertMsg["msg"]);
    }

    ?>
</div>