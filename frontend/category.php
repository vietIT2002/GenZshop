<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Trang Chủ</a></li>
							<li><a href="?act=category">Danh Mục Sản Phẩm</a></li>
							<li class="active"><?php echo ($id==0) ? '' : $title;?></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
        <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Sản phẩm giới hạn</h3>
							<div class="checkbox-filter" id="chkBrand">

                                    <?php
										$list=['ÁO HOODIE NIKE','ÁO THUN UT HOKUSAI','ÁO KHOÁC TOTODAY','QUẦN CARGO','NÓN BUCKET','KHĂN CASHMERE', 'QUẦN NAM NỮ GUTDEN', 'QUẦN RABBIT', 'ÁO BLACK CARTOON'];
										foreach($list as $key => $value){
											echo '<div class="input-checkbox">
                                            <input class="checkBrand" type="checkbox" id="'.$key.'" value="'.$value.'">
                                            <label for="'.$key.'">
                                                <span></span>
                                                '.$value.'
                                            </label>
                                        </div>';
										}
									?>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Giá</h3>
							<small>Chọn khoảng giá</small><br><br>
							<div class="price-filter">
							
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<br/><br>
								<button class="btn" id="btn_gia">Áp Dụng</button>
							</div>
						</div>
						<!-- /aside Widget -->			
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sắp Xếp:
									<select class="input-select" id="sap_xep">
										<option value="-1">--Chọn--</option>
										<option value="0">Bán Chạy</option>
										<option value="1">Giá cao</option>
                                        <option value="2">Giá thấp</option>
									</select>
								</label></div>
                                        <!--
								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>     -->
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row" id="phan_trang">
							<!-- product -->
							
							<!-- /product -->

								
							
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<script type="text/javascript">
		$(document).ready(function(){
			load_data();
	
			function load_data(page){
				var selected=$('#sap_xep').val();
				var price_min=$('#price-min').val();
				var price_max=$('#price-max').val();
				var checkedBrand=[];
				$('.checkBrand').each(function(){
					if($(this).is(':checked')){
						checkedBrand.push('or ten_sp like "%'+$(this).val()+'%"');
					}
				});
				checkedBrand=checkedBrand.toString();
				var checkedDv=[];
				$('.checkDv').each(function(){
					if($(this).is(':checked')){
						checkedDv.push('or ten_sp like "%'+$(this).val()+'%"');
					}
				});
				checkedDv=checkedDv.toString();
				$.ajax({
					url:"frontend/ajax.php",
					method:"POST",

					data:{
						page:page,'act':'<?=$act?>',
						'id':'<?=$id?>',
						'search':'<?=$search?>',
						'selected_sort':selected,
						'price_min':price_min,
						'price_max':price_max,
						'checkedBrand':checkedBrand,
						'checkedDv':checkedDv},
					success:function(data){
						 $('#phan_trang').html(data);
					}
				})
			}
			$(document).on('click', '.phan_trang_lk',function(){
				var page=$(this).attr("id");
				load_data(page);
			});
			$('#sap_xep').change(function(){
				load_data(1);
			});
			$('#btn_gia').click(function(){
				load_data(1);
			});
			$('#chkBrand').change(function(){
				load_data(1);
			});
			$('#chkDv').change(function(){
				load_data(1);
			});
		});
		
</script>