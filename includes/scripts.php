<?php
$extraScripts = $extraScripts ?? [];
?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/nouislider.min.js"></script>
<script type="text/javascript" src="js/jquery.zoom.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<?php foreach ($extraScripts as $scriptPath): ?>
    <script type="text/javascript" src="<?= htmlspecialchars($scriptPath, ENT_QUOTES, 'UTF-8') ?>"></script>
<?php endforeach; ?>
