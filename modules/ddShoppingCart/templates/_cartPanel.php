<img class="ico-carrito" src="<?php echo image_path('ico-cart.png')?>" alt="Carrito de Compras" width="24" height="24" />
<h1>Carrito de Compras</h1>
<a href="<?php echo url_for('dd_shopping_cart') ?>">
	<?php echo $cart->getNbItems() ?> items
</a>