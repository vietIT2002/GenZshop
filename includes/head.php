<?php
$pageTitle = $pageTitle ?? $title ?? 'GenZShop';
$extraStyles = $extraStyles ?? [];
$preloadAssets = $preloadAssets ?? [];
$extraHeadContent = $extraHeadContent ?? '';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="icon" href="img/GENZSHOP1.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

    <?php foreach ($preloadAssets as $asset): ?>
        <?php if (is_array($asset)): ?>
            <link rel="preload" href="<?= htmlspecialchars($asset['href'] ?? '', ENT_QUOTES, 'UTF-8') ?>" as="<?= htmlspecialchars($asset['as'] ?? 'style', ENT_QUOTES, 'UTF-8') ?>"<?php if (!empty($asset['type'])): ?> type="<?= htmlspecialchars($asset['type'], ENT_QUOTES, 'UTF-8') ?>"<?php endif; ?><?php if (!empty($asset['crossorigin'])): ?> crossorigin<?php endif; ?>>
        <?php else: ?>
            <link rel="preload" href="<?= htmlspecialchars($asset, ENT_QUOTES, 'UTF-8') ?>" as="style">
        <?php endif; ?>
    <?php endforeach; ?>

    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/slick.css">
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css">
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/header12.css?v=20260607-7">
    <link type="text/css" rel="stylesheet" href="css/responsive.css?v=20260607-4">
    <link type="text/css" rel="stylesheet" href="css/genzshop-ui.css?v=20260607-1">

    <?php foreach ($extraStyles as $stylePath): ?>
        <link rel="stylesheet" href="<?= htmlspecialchars($stylePath, ENT_QUOTES, 'UTF-8') ?>">
    <?php endforeach; ?>

    <?= $extraHeadContent ?>
    <script type="text/javascript" src="js/jquery1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
