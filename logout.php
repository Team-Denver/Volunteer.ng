<?php
session_start();
?>
<!DOCTYPE html>
<html>

<body>
    <div style="width:150px;margin:auto;height:500px;margin-top:300px">
        <?php

        session_destroy();

        echo '<meta http-equiv="refresh" content="2;url=../index.php">';
        echo '<progress max=100><strong>Progress: 60% done. </strong></progress><br>';
        echo '<span class="itext">Logging out please wait!...</span>';

        ?>
    </div>
</body>

</html>