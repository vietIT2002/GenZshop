<?php
$cart = $_SESSION['cart'] ?? [];
$shippingFee = 15000;
$freeShippingThreshold = 1000000;
$subtotal = 0;
$cartItems = [];

foreach ($cart as $key => $value) {
    $productId = (int)$key;
    $qty = max(1, (int)($value['qty'] ?? 1));
    $price = (int)($value['price'] ?? 0);
    $lineTotal = $price * $qty;
    $subtotal += $lineTotal;

    $stockRow = executeSingleResult('SELECT so_luong FROM sanpham WHERE id=' . $productId);
    $stock = (int)($stockRow['so_luong'] ?? 0);

    $cartItems[] = [
        'id' => $productId,
        'name' => $value['name'] ?? '',
        'img' => $value['img'] ?? '',
        'price' => $price,
        'qty' => $qty,
        'size' => $value['size'] ?? '--',
        'stock' => $stock,
        'lineTotal' => $lineTotal,
    ];
}

$shippingCost = ($subtotal === 0 || $subtotal >= $freeShippingThreshold) ? 0 : $shippingFee;
$total = $subtotal + $shippingCost;
$freeShippingRemaining = max(0, $freeShippingThreshold - $subtotal);
?>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="index.php">Trang chủ</a></li>
                    <li class="active">Giỏ hàng</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /BREADCRUMB -->

<div class="section cart-page">
    <div class="container">
        <div class="cart-page-heading">
            <span class="cart-eyebrow">GenZShop checkout</span>
            <h1>Giỏ hàng</h1>
        </div>

        <?php if (empty($cartItems)) { ?>
            <section class="cart-empty" aria-label="Giỏ hàng trống">
                <div class="cart-empty-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                <h2>Giỏ hàng của bạn đang trống</h2>
                <p>Khám phá các mẫu áo thun, áo khoác và phụ kiện mới nhất tại GenZShop.</p>
                <a class="cart-continue-btn" href="index.php">Tiếp tục mua sắm</a>
            </section>
        <?php } else { ?>
            <div class="cart-layout">
                <section class="cart-list-panel" aria-label="Sản phẩm trong giỏ hàng">
                    <div class="cart-list-head" aria-hidden="true">
                        <span>Sản phẩm</span>
                        <span>Giá</span>
                        <span>Size</span>
                        <span>Số lượng</span>
                        <span></span>
                    </div>

                    <div class="cart-items">
                        <?php foreach ($cartItems as $item) { ?>
                            <article class="cart-item">
                                <div class="cart-product-cell">
                                    <img class="cart-product-img" src="./img/<?= htmlspecialchars($item['img']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                                    <div class="cart-product-info">
                                        <h2><?= htmlspecialchars($item['name']) ?></h2>
                                        <p>Mã sản phẩm #<?= $item['id'] ?></p>
                                        <strong class="cart-mobile-price"><?= currency_format($item['lineTotal']) ?></strong>
                                    </div>
                                </div>

                                <div class="cart-price-cell">
                                    <strong><?= currency_format($item['price']) ?></strong>
                                </div>

                                <div class="cart-size-cell">
                                    <span><?= htmlspecialchars($item['size']) ?></span>
                                </div>

                                <div class="cart-qty-cell">
                                    <div class="cart-qty-control">
                                        <button type="button" onclick="updateCartItem(<?= $item['id'] ?>,0);" aria-label="Giảm số lượng <?= htmlspecialchars($item['name']) ?>">-</button>
                                        <input type="number" id="soLuong<?= $item['id'] ?>" value="<?= $item['qty'] ?>" readonly aria-label="Số lượng <?= htmlspecialchars($item['name']) ?>">
                                        <button type="button" onclick="updateCartItem(<?= $item['id'] ?>,1);" aria-label="Tăng số lượng <?= htmlspecialchars($item['name']) ?>">+</button>
                                    </div>
                                    <span class="cart-stock-note">Còn <span id="sl_tonkho<?= $item['id'] ?>"><?= $item['stock'] ?></span> sản phẩm</span>
                                    <p class="cart-qty-error" id="tbQty<?= $item['id'] ?>"></p>
                                </div>

                                <div class="cart-remove-cell">
                                    <button class="delete cart-remove-button" onclick="updateCartItem(<?= $item['id'] ?>,-1);" type="button" aria-label="Xóa <?= htmlspecialchars($item['name']) ?> khỏi giỏ hàng">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </article>
                        <?php } ?>
                    </div>
                </section>

                <aside class="cart-summary-panel" aria-label="Tóm tắt đơn hàng">
                    <div class="cart-summary-title">
                        <h2>Tóm tắt đơn hàng</h2>
                        <span><?= count($cartItems) ?> sản phẩm</span>
                    </div>

                    <div class="cart-summary-row">
                        <span>Tạm tính</span>
                        <strong><?= currency_format($subtotal) ?></strong>
                    </div>
                    <div class="cart-summary-row">
                        <span>Phí giao hàng</span>
                        <strong><?= $shippingCost === 0 ? 'Miễn phí' : currency_format($shippingCost) ?></strong>
                    </div>

                    <?php if ($freeShippingRemaining > 0) { ?>
                        <div class="cart-shipping-progress">
                            <div class="cart-shipping-progress-bar" style="width: <?= min(100, (int)(($subtotal / $freeShippingThreshold) * 100)) ?>%;"></div>
                        </div>
                        <p class="cart-shipping-note">Mua thêm <?= currency_format($freeShippingRemaining) ?> để được miễn phí vận chuyển.</p>
                    <?php } else { ?>
                        <p class="cart-shipping-note is-free"><i class="fa-solid fa-circle-check"></i> Đơn hàng được miễn phí vận chuyển.</p>
                    <?php } ?>

                    <div class="cart-summary-total">
                        <span>Tổng tiền</span>
                        <strong><?= currency_format($total) ?></strong>
                    </div>

                    <button id="btnThanhToanThanhCong" class="cart-success-btn" onclick="showSuccessToast()">Đặt hàng thành công</button>
                    <?php if (isset($_SESSION['ten_dangnhap']) && !empty($_SESSION['ten_dangnhap'])) { ?>
                        <button class="cart-checkout-btn" type="button" onclick="thanhtoan('<?= $_SESSION['ten_dangnhap'] ?>');thanhToanThanhCong();">Tiến hành thanh toán</button>
                    <?php } else { ?>
                        <a class="cart-checkout-btn" href="index.php?act=login">Vui lòng đăng nhập để thanh toán</a>
                    <?php } ?>

                    <a class="cart-continue-link" href="index.php"><i class="fa-solid fa-arrow-left"></i> Tiếp tục mua sắm</a>
                </aside>
            </div>
        <?php } ?>
    </div>
</div>
<script>
function updateCartItem(idPro, act) {
    var qtyInput = document.getElementById('soLuong' + idPro);
    var nextAct = act;

    if (nextAct === 0 && qtyInput && parseInt(qtyInput.value, 10) <= 1) {
        nextAct = -1;
    }

    if (nextAct === -1 && !confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')) {
        return;
    }

    $.post('frontend/addCart.php', { id: idPro, act: nextAct })
        .done(function(data) {
            if (data !== '') {
                $('#qtyPro').text(data);
            }
            location.reload();
        })
        .fail(function() {
            alert('Không thể cập nhật giỏ hàng. Vui lòng thử lại.');
        });
}
</script>