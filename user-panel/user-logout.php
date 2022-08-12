<?php include "../conf.php" ?>
<?php if (isset($_SESSION['auth'])) : ?>
    <?php
    session_destroy();
    header("Location: ../no-panel-interface/index.php");
    ?>
    <?php endif; ?>