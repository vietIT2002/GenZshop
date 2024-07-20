
<?php
session_start();
    include('../db/dbhelper.php');
    if(isset($_SESSION['ten_dangnhap'])){
        $ten_dangnhap=$_SESSION['ten_dangnhap'];
        $sql='select * from khachhang where ten_dangnhap="'.$ten_dangnhap.'"';
        $infoCus=executeSingleResult($sql);
        $tong_tien=0;
        if(isset($_SESSION['cart'])) $cart=$_SESSION['cart'];
         
        foreach($cart as $value){
            $tong_tien+=$value['qty']*$value['price'];
        }
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $ngay_tao_HD=date('Y/m/d H:i:s');
        $sql='insert into hoadon (id_khachhang, tong_tien, ngay_tao) value ("'.$infoCus['id'].'", "'.$tong_tien.'", "'.$ngay_tao_HD.'")';
        execute($sql);
        $id_hoadon=executeSingleResult('SELECT id FROM hoadon ORDER BY ngay_tao DESC LIMIT 0, 1')['id'];
        foreach($cart as $key => $value){
            execute('INSERT INTO cthoadon (id_hoadon, id_sanpham, so_luong) VALUE ("'.$id_hoadon.'", "'.$key.'", "'.$value['qty'].'")');
            $sl=executeSingleResult('SELECT so_luong FROM sanpham WHERE id='.$key)['so_luong'];
            $sldabancu=executeSingleResult('SELECT sl_da_ban FROM sanpham WHERE id='.$key)['sl_da_ban'];
            execute('UPDATE sanpham SET so_luong="'.($sl-$value['qty']).'", sl_da_ban="'.($value['qty']+$sldabancu).'" WHERE id='.$key);
            
        }
        $tong_tien_muahang=executeSingleResult('select tong_tien_muahang as s from khachhang where id='.$infoCus['id'])['s'];//TỔng tiền hiện tại khách hàng đã mua
        execute('UPDATE khachhang SET tong_tien_muahang="'.($tong_tien_muahang+$tong_tien).'" WHERE id='.$infoCus['id']);//Cập nhật lại tổng tiền mau hàng
        //Cập nhật lại sô lượng sản phẩm theo thể loại
        $listCate=executeResult('SELECT * FROM theloai WHERE 1');
        foreach($listCate as $item){
            $tongSPtheoTheLoai=executeSingleResult('SELECT SUM(so_luong) AS sl FROM sanpham WHERE id_the_loai='.$item['id'])['sl'];
            execute('UPDATE theloai SET tong_sp="'.$tongSPtheoTheLoai.'" WHERE id='.$item['id']);
        }
        unset($_SESSION['cart']);
       
    }
?>