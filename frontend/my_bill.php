<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Trang chủ</a></li>
							<li class="active" >Đơn hàng của tôi</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
<!-- ĐƠN HÀNG CỦA TÔI -->
<div class="container" style="margin: 40px auto;">
    <div class="row">
        <div class="col col-lg-2 col-sm-12">
            <div class="row">
                <p>Tài khoản của<p>
                <strong><?=$_SESSION['ten_dangnhap']?></strong>
            </div>
            <div>
                
                <ul class="footer-links">
									<li style="padding-bottom: 10px;"><a href="?act=my_account"><i class="fa fa-user-o" style="color:black; padding-right: 8px;"></i>Tài Khoản Của Tôi</a></li>
									<li ><a href="?act=my_bill" style="color:#D10024;"><i class="fa fa-bars" style="color:black; padding-right: 8px;"></i>Đơn Hàng Của Tôi</a></li>
									
								</ul>
            </div>
        </div>
        <div class="col col-lg-10 col-sm-12" style="border-left: 1px solid #e1e1e1;">
                            <div class="section-title" style="text-align:center">
								<h3 class="title" style="font-size: 35px;">Đơn hàng của tôi</h3>
							</div>
                            <table class="table">
                                <thead >
                                    <tr>
                                        <th scope="col" width="130px">Mã đơn hàng</th>
                                        <th scope="col" style="text-align:center" width="180px">Ngày mua</th>
                                        <th scope="col" style="text-align:center">Sản phẩm</th>
                                        <th scope="col" width="110px">Tổng tiền</th>
                                        <th scope="col" width="180px">Trạng thái đơn hàng</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align:center">
                                <?php
                                    $sql='SELECT * from hoadon where id_khachhang='.$info['id'].' ORDER BY hoadon.ngay_tao DESC';
                                    $listBill=executeResult($sql);
                                    
                                    foreach($listBill as $value){
                                        $ten_sp=$trangthai='';
                                        $sl_sp=0;
                                        
                                        $ten_sp=executeSingleResult('SELECT sanpham.ten_sp FROM cthoadon, sanpham WHERE cthoadon.id_sanpham=sanpham.id AND id_hoadon='.$value['id'].' LIMIT 0, 1')['ten_sp'];
                                        $sl_sp=executeSingleResult('SELECT COUNT(id_sanpham) AS sl_sp FROM cthoadon WHERE id_hoadon='.$value['id'])['sl_sp'];
                                        if($sl_sp>1) $ten_sp=$ten_sp.', ... và '.($sl_sp-1).' sản phẩm khác.';
                                        echo '<tr height=80px>
                                        <td align=center ><a href="index.php?act=bill_detail&id='.$value['id'].'"><strong style="color:deepskyblue;"><u>HĐ'.$value['id'].'</u></strong></a></td>
                                        <td>'.$value['ngay_tao'].'</td>
                                        <td>'.$ten_sp.'</td>
                                        <td>'.currency_format($value['tong_tien']).'</td>';
                                        if($value['trang_thai']==0){ 
                                            echo'<td align=center style="color:red">Đang xử lý</td>
                                                    <td align:right; ><a onclick="huydonhang('.$value['id'].')" style="color:#d10024"><u>Hủy</u></a></td>';
                                        }
                                             else {
                                                 echo '<td align=center style="color:#07ea03">Thành công</td><td></td>';}
                                        
                                    echo'</tr>';
                                    }
                                ?>
                                </tbody>
                                
                            </table>
        </div>
    </div>
</div>
<!-- /ĐƠN HÀNG CỦA TÔI -->