<!-- Home Page Content -->
<div class="container-fluid" style="background-color:#e6e6e6;">
	<div class="container">
		<div class="row">
			<div id="homePageSlider" class="col-lg-12 col-md-12 col-sm-12">
				<img src="{{ URL::asset('assets/frontend/images/product1.jpg') }}" />
				<img src="{{ URL::asset('assets/frontend/images/product2.jpg') }}" />
				<img src="{{ URL::asset('assets/frontend/images/product3.jpg') }}" />
				<!-- <div>
					<img src="{{ URL::asset('assets/frontend/images/product1.jpg') }}" />
				</div>
				<div>
					<img src="{{ URL::asset('assets/frontend/images/product2.jpg') }}" />
				</div>
				<div>
					<img src="{{ URL::asset('assets/frontend/images/product3.jpg') }}" />
				</div> -->
			</div>
		</div>
		<div class="row flashSales">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<h2>All flash sales sorted by 
					<span class="themeColor fiterOption">Recommended <i class="fa fa-caret-down"></i></span>
				</h2>
				<ul class="flashSalesDropDown">
					<li>Recommended</li>
					<li>Ending Soon</li>
					<li>Newest</li>
					<li>Coming Soon</li>
				</ul>
			</div>
		</div>
		<div class="row package themeFont">
			<div class="col-sm-12 col-md-7 col-lg-7 pImage">
				<img src="{{ URL::asset('assets/frontend/images/product1.jpg') }}" class="imgResponsive" />
			</div>
			<div class="col-sm-12 col-md-5 col-lg-5 pImageInfo">
				<div class="width100per productInfo">
					<div class="productTimelySale">
						<p>Ends in <span class="time">3</span> days</p>
					</div>
					<div class="productDetails marTop20">
						<div class="productDetailsTitle col-md-3">
							<p class="fontBold">Title</p>
							<p class="fontBold">Country/City</p>
							<p class="fontBold">Highlight</p>
						</div>
						<div class="productDetailsInfo col-md-6">
							<p>Product 1</p>
							<p>Malaysia/Kuala Lumpur</p>
							<p>Very Adeventours</p>
						</div>
					</div>
					<div class="productDiscount">
						<div class="col-md-6 discount">
							<p class="themeColor marBot0 fontBold">Up to</p>
							<p class="themeColor fontBold">-70%</p>
						</div>
						<div class="col-md-6 discountInfo">
							<p class="marBot0">MYR 800 <span class="themeColor beforeDiscount">MYR 1000</span></p>
							<p>/per room per night</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row package themeFont marTop20">
			<div class="col-sm-12 col-md-7 col-lg-7 pImage">
				<img src="{{ URL::asset('assets/frontend/images/product2.jpg') }}" class="imgResponsive" />
			</div>
			<div class="col-sm-12 col-md-5 col-lg-5 pImageInfo">
				<div class="width100per productInfo">
					<div class="productTimelySale">
						<p>Ends in <span class="time">4</span> days</p>
					</div>
					<div class="productDetails marTop20">
						<div class="productDetailsTitle col-md-3">
							<p class="fontBold">Title</p>
							<p class="fontBold">Country/City</p>
							<p class="fontBold">Highlight</p>
						</div>
						<div class="productDetailsInfo col-md-6">
							<p>Product 2</p>
							<p>Malaysia/Kuala Lumpur</p>
							<p>Very Adeventours</p>
						</div>
					</div>
					<div class="productDiscount">
						<div class="col-md-6 discount">
							<p class="themeColor marBot0 fontBold">Up to</p>
							<p class="themeColor fontBold">-50%</p>
						</div>
						<div class="col-md-6 discountInfo">
							<p class="marBot0">MYR 800 <span class="themeColor beforeDiscount">MYR 900</span></p>
							<p>/per room per night</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>