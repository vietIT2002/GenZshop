<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <?php
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Sản phẩm')
            include('product_listing.php');
    }
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Thể loại')
            include('theloai.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'datncc')
            include('nhacungcap_dat.php');
    }
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Nhà cung cấp')
            include('nhacungcap.php');
    }
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Khách hàng')
            include('khachhang.php');
    }
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Nhân viên')
            include('nhanvien.php');
    }
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Đổi mật khẩu')
            include('doimatkhau.php');
    }
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Tài khoản')
            include('taikhoan.php');
    }
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Hóa đơn')
            include('hoadon.php');
    }
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Danh mục')
            include('danhmucdemo.php');
    }
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Phiếu nhập')
            include('phieunhap.php');
    }
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Thống kê')
            include('thongke2.php');
    }
    //liên hệ
    if (isset($_GET['tmuc'])){
        if ($_GET['tmuc'] == 'Liên hệ')
        include('lienhee.php');
    }

    //Danh mục bài viết
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Danh mục bài viết')
            include('blog_listing.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'adddm')
            include('blog_adding.php');
    }
    if (isset($_GET['act']) && isset($_GET['dk'])) {
        if (($_GET['act'] == 'addmtc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Danh mục bài viết">Danh mục bài viết</a>
    </div>');
    }
    if (isset($_GET['act']) && isset($_GET['dk'])) {
        if (($_GET['act'] == 'addmtc') && ($_GET['dk'] == 'no'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thất bại</h2>
        
        <a href="./admin.php?tmuc=Danh mục bài viết">Danh mục bài viế</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'suadmmtc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Danh mục bài viết">Danh mục bài viết</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'suadmmtc') && ($_GET['dk'] == 'no'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Vui lòng nhập thông tin đầy đủ!!</h2>
        
        <a href="javascript:window.history.go(-1)">Quay lại</a>
    </div>');
    }
    
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'suadm')
            include('blog_editing.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xoadm')
            include('blog_deleting.php');
    }
    

    if (isset($_GET['act']))
        if ($_GET['act'] == 'add')
            include('product_adding.php');
    if (isset($_GET['act']))
        if ($_GET['act'] == 'addss')
            echo ("them thanh cong");

    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xoa')
            include('product_deleting.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'sua')
            include('product_editing.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'addtl')
            include('theloai_adding.php');
    }
    if (isset($_GET['act']) && isset($_GET['dk'])) {
        if (($_GET['act'] == 'addtltc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Thể loại">Danh sách thể loại</a>
    </div>');
    }
    if (isset($_GET['act']) && isset($_GET['dk'])) {
        if (($_GET['act'] == 'addtltc') && ($_GET['dk'] == 'no'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thất bại</h2>
        
        <a href="./admin.php?tmuc=Thể loại">Danh sách thể loại</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'suatl')
            include('theloai_editing.php');
    }
    
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xoatl')
            include('theloai_deleting.php');
    }

    //Bài blog
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Bài blog')
            include('baiblog_listing.php');
    }
     if (isset($_GET['act']))
        if ($_GET['act'] == 'addblog')
            include('baiblog_adding.php');
    if (isset($_GET['act']))
        if ($_GET['act'] == 'addblogss')
            echo ("them thanh cong");

    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xoablog')
            include('baiblog_deleting.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'suablog')
            include('baiblog_editing.php');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'addblogtc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Bài blog">Danh sách bài blog</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'addblogtc') && ($_GET['dk'] == 'no'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Vui lòng nhập đủ thông tin!!</h2>
        
        <a href="javascript:window.history.go(-1)">Quay lại</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'suablogtc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Bài blog">Cập nhật danh sách bài blog</a>
    </div>');
    }
    
    

    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'addnv')
            include('nhanvien_adding.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'suanv')
            include('nhanvien_editing.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xoanv')
            include('nhanvien_deleting.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'cthoadon')
            include('cthoadon.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'addtk')
            include('taikhoan_adding.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xoapn')
            include('phieunhap_xoa.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'ctphieunhap')
            include('ctphieunhap.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xoahd')
            include('hoadon_deleting.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'gallery_delete')
            include('gallery_delete.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xoatk')
            include('taikhoan_deleting.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'quyen')
            include('danhmucdemo.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'addquyen')
            include('danhmucdemo_adding.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'suaquyen')
            include('danhmucdemo_editting.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xoaquyen')
            include('danhmucdemo_deleting.php');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'xnhdtc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Hóa đơn">Danh sách hóa đơn</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'xnhdtc') && ($_GET['dk'] == 'no'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thất bại</h2>
        
        <a href="./admin.php?tmuc=Hóa đơn">Danh sách hóa đơn</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'khtttc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Khách hàng">Danh sách khách hàng</a>
    </div>');
    }
    //Liên hệ
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'lhtttc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Liên hệ">Danh sách liên hệ</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'lhtttc') && ($_GET['dk'] == 'no'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thất bại</h2>
        
        <a href="./admin.php?tmuc=Liên hệ">Danh sách liên hệ</a>
    </div>');
    }


    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'suatltc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Thể loại">Danh sách thể loại</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'suatltc') && ($_GET['dk'] == 'no'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Vui lòng nhập thông tin đầy đủ!!</h2>
        
        <a href="javascript:window.history.go(-1)">Quay lại</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'addtktc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Tài khoản">Danh sách Tài khoản</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'addtktc') && ($_GET['dk'] == 'no'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Vui lòng nhập thông tin đầy đủ!!</h2>
        
        <a href="javascript:window.history.go(-1)">Quay lại</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'suatktc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Tài khoản">Danh sách Tài khoản</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'suatktc') && ($_GET['dk'] == 'no'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thất bại</h2>
        
        <a href="./admin.php?tmuc=Tài khoản">Danh sách Tài khoản</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'btndmtc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Danh mục">Danh sách Danh mục</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'nccaddtc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Nhà cung cấp">Danh sách Nhà cung cấp</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'nccaddtc') && ($_GET['dk'] == 'no'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Vui lòng nhập thông tin đầy đủ!!</h2>
        
        <a href="javascript:window.history.go(-1)">Quay lại</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'addnvtc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Nhân viên">Danh sách Nhân viên</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'addnvtc') && ($_GET['dk'] == 'no'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Vui lòng nhập thông tin đầy đủ!!</h2>
        
        <a href="javascript:window.history.go(-1)">Quay lại</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'suanvtc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Nhân viên">Danh sách Nhân viên</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'suanvtc') && ($_GET['dk'] == 'no'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Vui lòng nhập thông tin đầy đủ!!</h2>
        
        <a href="javascript:window.history.go(-1)">Quay lại</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'tkmktc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Đổi mật khẩu">Danh sách Đổi mật khẩu</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'tkmktc') && ($_GET['dk'] == 'no'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thất bại</h2>
        
        <a href="./admin.php?tmuc=Đổi mật khẩu">Danh sách Đổi mật khẩu</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'addsptc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Sản phẩm">Danh sách Sản phẩm</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'addsptc') && ($_GET['dk'] == 'no'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Vui lòng nhập đủ thông tin!!</h2>
        
        <a href="javascript:window.history.go(-1)">Quay lại</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'suasptc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Sản phẩm">Danh sách Sản phẩm</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'suasptc') && ($_GET['dk'] == 'no'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Vui lòng nhập đủ thông tin!!</h2>
        
        <a href="javascript:window.history.go(-1)">Quay lại</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'btndmaddtc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Danh mục">Danh sách Danh mục</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'btndmaddtc') && ($_GET['dk'] == 'no'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Vui lòng nhập đủ thông tin!!</h2>
        
        <a href="javascript:window.history.go(-1)">Quay lại</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'btndmsuatc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Danh mục">Danh sách Danh mục</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'btndmsuatc') && ($_GET['dk'] == 'no'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thất bại!!</h2>
        
        <a href="./admin.php?tmuc=Danh mục">Danh sách Danh mục</a>
    </div>');
    }
    ?>

</body>

</html>