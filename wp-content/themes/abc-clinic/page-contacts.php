<?php get_header(); ?>
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-12">
					<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<p id="breadcrumbs" class="mb-3">','</p>' );
					}
					?>
                </div>
            </div>
        </div>
    </section>
<section>
	<?php $contacts = get_field( 'contacts', 59 ); ?>
	<div class="container">
		<div class="row">
			<div class="col-12"><h2 class="slide_h2 mt-2 mb-2">Контакты</h2></div>
			<div class="col-md-7">
				<div id="map" style="width: 100%; height: 400px"></div>
			</div>
			<div class="col-md-5 mt-5 mt-md-0">
				<div class="row">
					<div class="col-2 mb-4"><img
							src="<?php echo __PATH_IMG; ?>/marker-map.png"
							alt="Точка на карте" class="bounceIn wow" data-wow-delay="0s"></div>
					<div class="col-10 adr mb-4">
						<p class="adress m-0">Адрес:</p>
						<p class="m-0"><?php echo $contacts['adress']; ?></p>
					</div>
					<div class="col-2 mb-4"><img
							src="<?php echo __PATH_IMG; ?>/phone_call.png"
							alt="Точка на карте" class="bounceIn wow" data-wow-delay="0.1s"></div>
					<div class="col-10 adr mb-4">
						<p class="adress m-0">Номер телефона:</p>
						<p class="m-0"><?php echo $contacts['phone']; ?></p>
					</div>
					<div class="col-2 mb-4"><img src="<?php echo __PATH_IMG; ?>/time.png"
					                             alt="Точка на карте" class="bounceIn wow" data-wow-delay="0.2s">
					</div>
					<div class="col-10 adr mb-4">
						<p class="adress m-0">График работы:</p>
						<p class="m-0">Пн. - Пт.: 8.00 - 20.00 </br>
							Cб. - Вс.: 8.00 - 16.00</p>
					</div>
				</div>
                <input type="hidden" id="phone">

			</div>
		</div>
	</div>
</section>
<?php get_footer();
