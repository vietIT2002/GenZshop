<?php
include('../db/dbhelper.php');
include('../common/utility.php');
 
 $limit=3;
 $page=1;
 $act='';
 $search='';
 $id='';
 $selected_sort=0;
 $add_sort_sql='';
 $price_min=1000;
 $price_max=700000;
 $add_price_sql='';
 $checkedBrand='';
 $checkedDv='';
 if(isset($_POST['checkedBrand'])){
    $checkedBrand=str_replace(",", " ", $_POST['checkedBrand']);
     if($checkedBrand!=''){
         $checkedBrand=preg_replace('/^../',' and (',$checkedBrand).' ) ';
        }
     //echo $checkedBrand;
}
if(isset($_POST['checkedDv'])){
    $checkedDv=str_replace(",", " ", $_POST['checkedDv']);
     if($checkedDv!=''){
         $checkedDv=preg_replace('/^../',' and (',$checkedDv).' ) ';
        }
     //echo $checkedDv;
}
 if(isset($_POST['price_min'])){
     $price_min=$_POST['price_min'];
     $price_max=$_POST['price_max'];
     
     $add_price_sql=' and (don_gia>='.$price_min.' and don_gia<='.$price_max.')';
 }
 if(isset($_POST['selected_sort'])){
     $selected_sort=$_POST['selected_sort'];
 }
 if($selected_sort==1){
     $add_sort_sql=' ORDER BY sanpham.don_gia DESC';
 }else if($selected_sort==2){
     $add_sort_sql=' ORDER BY sanpham.don_gia ASC';
 }else if($selected_sort==0){
    $add_sort_sql=' ORDER BY sanpham.sl_da_ban DESC';
 }
 if(isset($_POST['act'])){
     $act=$_POST['act'];
 }
 if(isset($_POST['id'])){
    $id=$_POST['id'];
}
 if(isset($_POST['search'])){
    $search=$_POST['search'];
    $search=str_replace('"','\\"',$search);
    $search=str_replace("'","\\'",$search);
}
 if(isset($_POST['page'])){
    $page=$_POST['page'];
}

if($page<=0)$page=1;
$firstIndex=($page-1)*$limit;
if($act=='category'){
    if($id>0)
    $sql='select * from sanpham where id_the_loai='.$id.' '.$checkedBrand.$checkedDv.$add_price_sql.$add_sort_sql.' limit '.$firstIndex.', '.$limit;
    else $sql='select * from sanpham where 1  '.$checkedBrand.$checkedDv.$add_price_sql.$add_sort_sql.' limit '.$firstIndex.', '.$limit;
}else if($act=='' && $search != ''){
    $sql='select * from sanpham where 1 and ten_sp like "%'.$search.'%" '.$checkedBrand.$checkedDv.$add_price_sql.$add_sort_sql.' limit '.$firstIndex.', '.$limit;
}
//echo $sql;
$list=executeResult($sql);
if(empty($list))echo '<h3>0 sản phẩm được tìm thấy.</h3>';
foreach($list as $item){
    if($item['so_luong']==0 && $item['trangthai']==0){
        echo '<div class="col-md-4 col-xs-6">
        <div class="product">
            <div class="product-img" style="height:250px">
                <img src="./img/'.$item['hinh_anh'].'" alt="" style="height:100%">
                <div class="product-label">
                    
                    <span class="new">HẾT HÀNG</span>
                </div>
            </div>
            <div class="product-body">
                <p class="product-category"><small>'.$item['sl_da_ban'].' đã bán</small></p>
                <h3 class="product-name"><a href="index.php?act=product&id='.$item['id'].'">'.$item['ten_sp'].'</a></h3>
                <h4 class="product-price">'.currency_format($item['don_gia']).'</h4>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                
            </div>
            <div class="add-to-cart">
                <button class="add-to-cart-btn"> SẢN PHẨM ĐÃ HẾT</button>
            </div>
        </div>
    </div>';
    }else if($item['trangthai']==0)
    echo'<div class="col-md-4 col-xs-6">
    <div class="product" >
        <div class="product-img" style="height:250px" onclick="location=\'index.php?act=product&id='.$item['id'].'\'">
            <img src="./img/'.$item['hinh_anh'].'" alt="" style="height:100%">
            <div class="product-label">
                
                <span class="new">NEW</span>
            </div>
        </div>
        <div class="product-body">
            <p class="product-category"><small>'.$item['sl_da_ban'].' đã bán</small></p>
            <h3 class="product-name"><a href="index.php?act=product&id='.$item['id'].'">'.$item['ten_sp'].'</a></h3>
            <h4 class="product-price">'.currency_format($item['don_gia']).'</h4>
            <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            
        </div>
        <div class="add-to-cart">
            <button class="add-to-cart-btn" onclick=" addCart('.$item['id'].',1); themThanhCong('.$item['id'].'); "><i class="fa fa-shopping-cart"></i> <span id="messAddCart'.$item['id'].'">thêm vào giỏ</span></button>
        </div>
    </div>
</div>';
}

 // phan trang 
if($id>0){
$sql='select count(id) as total from sanpham where id_the_loai='.$id.' '.$checkedBrand.$checkedDv.$add_price_sql;
}else{
$sql='select count(id) as total from sanpham where 1 and ten_sp like "%'.$search.'%"'.$checkedBrand.$checkedDv.$add_price_sql;
}
$countResult=executeSingleResult($sql);
$count=$countResult['total'];
$numberPage=0;
if($countResult!=null){
$numberPage=ceil($count/$limit);
}

echo '<div class="store-filter clearfix" style="
position: absolute;
right: 0;
bottom: -50px;
left:0;
">';
if($numberPage>1){ 
    echo '<ul class="store-pagination">';
        
            if($page>1){
                echo '<li class="phan_trang_lk" id="'.($page-1).'"><a><</a></li>';
            }else{
                echo '<li class="disabled phan_trang_lk"><a><</a></li>';
            }
        $avaiablePage=[1,$page-1,$page,$page+1,$numberPage];
        $isFirst=$isLast=false;
        for($i=1;$i<=$numberPage;$i++){
            if(!in_array($i,$avaiablePage)){
                if(!$isFirst && $page>3){
                    echo '<li class="phan_trang_lk" id="'.$i.'"><a>...</a></li>';
                    $isFirst=true;
                }
                if(!$isLast && ($page<($i))){
                    echo '<li class="phan_trang_lk" id="'.$i.'"><a>...</a></li>';
                    $isLast=true;
                }
                 continue;   
            }
            if($page==$i){
                echo '<li class="active phan_trang_lk" id="'.$i.'"><a>'.$i.'</a></li>';
            }else{
                echo '<li class="phan_trang_lk" id="'.$i.'"><a>'.$i.'</a></li>';
            }
        }
        
            if($page<$numberPage){
                echo '<li class="phan_trang_lk" id="'.($page+1).'"><a>></a></li>';
            }else{
                echo '<li class="disabled phan_trang_lk"><a>></a></li>';
            }
        echo '</ul>';
}
echo '</div>'
?>
