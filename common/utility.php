<?php
//Phân Trang
function paginarion($numberPage, $page, $addition){
    if($numberPage>1){ 
        echo '<ul class="store-pagination">';
            
                if($page>1){
                    echo '<li ><a href="?page='.($page-1).$addition.'"><</a></li>';
                }else{
                    echo '<li class="disabled"><a class="page-link" href="#"><</a></li>';
                }
            $avaiablePage=[1,$page-1,$page,$page+1,$numberPage];
            $isFirst=$isLast=false;
            for($i=1;$i<=$numberPage;$i++){
                if(!in_array($i,$avaiablePage)){
                    if(!$isFirst && $page>3){
                        echo '<li><a href="?page='.($page-2).$addition.'">...</a></li>';
                        $isFirst=true;
                    }
                    if(!$isLast && ($page<($i))){
                        echo '<li><a href="?page='.($page+2).$addition.'">...</a></li>';
                        $isLast=true;
                    }
                     continue;   
                }
                if($page==$i){
                    echo '<li class="active"><a href="?page='.$i.$addition.'">'.$i.'</a></li>';
                }else{
                    echo '<li ><a href="?page='.$i.$addition.'">'.$i.'</a></li>';
                }
            }
            
                if($page<$numberPage){
                    echo '<li ><a  href="?page='.($page+1).$addition.'">></a></li>';
                }else{
                    echo '<li class="disabled"><a  href="#">></a></li>';
                }
            echo '</ul>';
}}
//Phan Trang

// Định dạng tiền 
if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = ' đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}
