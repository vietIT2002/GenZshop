<?php
     session_start();
     require_once('../db/dbhelper.php');
     require_once('../common/utility.php');
     if(isset($_POST['id'])) {
         $id=$_POST['id'];
         $sql='select so_luong from sanpham where id='.$id;
         $soLuong=executeSingleResult($sql)['so_luong'];
        if(isset($_POST['act'])){
            $act=$_POST['act'];
            if($act==0) $qtyAdd=-1;
            else if($act==1) {
                if(isset($_POST['qtyAdd']))$qtyAdd=$_POST['qtyAdd'];
                    else $qtyAdd=1;
            }else if($act==-1){
                unset ($_SESSION['cart'][$id]);
                die();
            }
        }
         $sql='select * from sanpham where id='.$id;
         $pro=executeSingleResult($sql);
         if(!isset($_SESSION['cart'])){
            $cart[$id]=array(
                'name'=>$pro['ten_sp'],
                'img'=>$pro['hinh_anh'],
                'price'=>$pro['don_gia'],
                'qty'=>$qtyAdd
            );
         }else{
             $cart=$_SESSION['cart'];
            if(array_key_exists($id,$cart)){
                if(((int)$cart[$id]['qty']+(int)$qtyAdd)>$soLuong) die();
                $cart[$id]=array(
                    'name'=>$pro['ten_sp'],
                    'img'=>$pro['hinh_anh'],
                    'price'=>$pro['don_gia'],
                    'qty'=>(int)$cart[$id]['qty']+(int)$qtyAdd
                );
            }else{
                $cart[$id]=array(
                    'name'=>$pro['ten_sp'],
                    'img'=>$pro['hinh_anh'],
                    'price'=>$pro['don_gia'],
                    'qty'=>($qtyAdd)
                );
            }
         }
         $_SESSION['cart']=$cart;
         $qty=0;
         foreach($cart as $value){
             $qty += (int)$value['qty'];
         }
         //echo '<prE>';
         //print_r($_SESSION['cart']);
         echo $qty;
     }
?>