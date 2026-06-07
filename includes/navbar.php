<?php
if (!function_exists('genz_current_filename')) {
    function genz_current_filename(): string
    {
        $scriptName = $_SERVER['SCRIPT_NAME'] ?? $_SERVER['PHP_SELF'] ?? '';
        return basename($scriptName);
    }
}

if (!function_exists('genz_active_category_id')) {
    function genz_active_category_id(string $currentAct, int $currentId): int
    {
        if ($currentAct === 'product' && $currentId > 0) {
            $productCategory = executeSingleResult('select id_the_loai from sanpham where id=' . $currentId);
            return (int)($productCategory['id_the_loai'] ?? 0);
        }

        if ($currentAct === 'category' && $currentId > 0) {
            return $currentId;
        }

        return 0;
    }
}

if (!function_exists('genz_is_nav_active')) {
    function genz_is_nav_active(string $menuKey, array $context): bool
    {
        $filename = $context['filename'] ?? genz_current_filename();
        $currentAct = $context['act'] ?? '';
        $currentId = (int)($context['id'] ?? 0);
        $activeCategoryId = (int)($context['activeCategoryId'] ?? 0);

        if ($menuKey === 'home') {
            return $filename === 'index.php' && $currentAct === '' && $currentId === 0;
        }

        if ($menuKey === 'category') {
            return in_array($currentAct, ['category', 'product'], true) && $activeCategoryId === 0;
        }

        if (strpos($menuKey, 'category:') === 0) {
            $categoryId = (int)substr($menuKey, strlen('category:'));
            return in_array($currentAct, ['category', 'product'], true) && $activeCategoryId === $categoryId;
        }

        if ($menuKey === 'blog') {
            return in_array($filename, ['Blog.php', 'blog1.php', 'blog2.php', 'blog3.php', 'blog4.php'], true);
        }

        if ($menuKey === 'contact') {
            return $filename === 'Lienhe.php';
        }

        if ($menuKey === 'warranty') {
            return $filename === 'BaoHanh.php';
        }

        if ($menuKey === 'brand') {
            return $filename === 'thuonghieu.php';
        }

        return false;
    }
}

if (!function_exists('genz_nav_item_class')) {
    function genz_nav_item_class(bool $isActive): string
    {
        return $isActive ? ' class="active"' : '';
    }
}

$currentFilename = genz_current_filename();
$currentAct = $act ?? ($_GET['act'] ?? '');
$currentId = (int)($id ?? ($_GET['id'] ?? 0));
$genzHeaderCategories = $genzHeaderCategories ?? executeResult('select id, ten_tl from theloai');
$activeCategoryId = genz_active_category_id($currentAct, $currentId);
$navContext = [
    'filename' => $currentFilename,
    'act' => $currentAct,
    'id' => $currentId,
    'activeCategoryId' => $activeCategoryId,
];
?>
<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li<?= genz_nav_item_class(genz_is_nav_active('home', $navContext)) ?>><a href="index.php">TRANG CH&#7910;</a></li>
                <li<?= genz_nav_item_class(genz_is_nav_active('category', $navContext)) ?>><a href="?act=category">T&#217;Y CH&#7884;N</a></li>
                <?php foreach ($genzHeaderCategories as $item): ?>
                    <?php $categoryId = (int)$item['id']; ?>
                    <li<?= genz_nav_item_class(genz_is_nav_active('category:' . $categoryId, $navContext)) ?>><a href="?act=category&id=<?= $categoryId ?>"><?= $item['ten_tl'] ?></a></li>
                <?php endforeach; ?>
                <li<?= genz_nav_item_class(genz_is_nav_active('blog', $navContext)) ?>><a href="Blog.php">BLOG</a></li>
                <li<?= genz_nav_item_class(genz_is_nav_active('brand', $navContext)) ?>><a href="thuonghieu.php">TH&#431;&#416;NG HI&#7878;U</a></li>
                <li<?= genz_nav_item_class(genz_is_nav_active('warranty', $navContext)) ?>><a href="BaoHanh.php">B&#7842;O H&#192;NH</a></li>
                <li<?= genz_nav_item_class(genz_is_nav_active('contact', $navContext)) ?>><a href="Lienhe.php">LI&#202;N H&#7878;</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->