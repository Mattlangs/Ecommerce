
<div class="banner">
<div class="w3l_banner_nav_right">

			<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_veg">
				<h3 class="w3l_fruit">Fruits & Vegetables</h3>
				<div class="w3ls_w3l_banner_nav_right_grid1 w3ls_w3l_banner_nav_right_grid1_veg">
                <?php if (isset($products) && !empty($products)) : ?>
            <?php foreach ($products as $product) : ?>
					<div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="tag"><img src="images/tag.png" alt=" " class="img-responsive"></div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="#"><img src="<?=base_url() ?>images/<?=$product['image'];?>" alt=" " class="img-responsive" /></a>
											<p><?php echo $product['name'];?></p>
											<h4>₱<?php echo $product['price'];?> </h4><h4><?php echo $product['quantity'];?> stock</h4>
										</div>
										<div class="snipcart-details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Vegetables" />
													<input type="hidden" name="amount" value="10.00" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
	                </div>
                    <?php endforeach; ?>
        <?php else : ?>
            <p>No products available.</p>
        <?php endif; ?>
                    <div class="clearfix"> </div>
    </div>
    </div>
    </div>
        <div class="clearfix"></div>
        </div>

				


	


