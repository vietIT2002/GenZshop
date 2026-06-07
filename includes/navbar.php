<?php
if (!function_exists('genz_current_filename')) {
    function genz_current_filename(): string
    {
        return basename($_SERVER['PHP_SELF'] ?? '');
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

if (!function_exists('genz_nav_context')) {
    function genz_nav_context(): array
    {
        $currentAct = $_GET['act'] ?? '';
        $currentId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $searchTerm = trim((string)($_GET['search'] ?? ''));
        $activeCategoryId = genz_active_category_id($currentAct, $currentId);

        return [
            'filename' => genz_current_filename(),
            'act' => $currentAct,
            'id' => $currentId,
            'search' => $searchTerm,
            'activeCategoryId' => $activeCategoryId,
        ];
    }
}

if (!function_exists('genz_is_nav_active')) {
    function genz_is_nav_active(string $menuKey, array $context): bool
    {
        $filename = $context['filename'] ?? genz_current_filename();
        $currentAct = $context['act'] ?? '';
        $currentId = (int)($context['id'] ?? 0);
        $searchTerm = trim((string)($context['search'] ?? ''));
        $activeCategoryId = (int)($context['activeCategoryId'] ?? 0);
        $isShoppingSearch = $filename === 'index.php' && $currentAct === '' && $searchTerm !== '';

        if ($menuKey === 'home') {
            return $filename === 'index.php'
                && $currentAct === ''
                && $currentId === 0
                && $searchTerm === '';
        }

        if ($menuKey === 'category') {
            return $isShoppingSearch
                || (in_array($currentAct, ['category', 'product'], true) && $activeCategoryId === 0);
        }

        if (strpos($menuKey, 'category:') === 0) {
            $categoryId = (int)substr($menuKey, strlen('category:'));
            return in_array($currentAct, ['category', 'product'], true) && $activeCategoryId === $categoryId;
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

$genzHeaderCategories = $genzHeaderCategories ?? executeResult('select id, ten_tl from theloai');
$navContext = genz_nav_context();
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
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->