<div id="catalogo">
	<!--Carrito -->
	<div class="top"> 
		<h1>Carrito de Compras</h1>
		<br clear="all" />
	</div> 
	
	<!--Listado -->
	<div class="carrito-row"> 
		<div class="articulo"> <b>Productos</b></div> 
		<div class="cant"> <b>Cant</b>.</div>
		<div class="precio"> <b>Precio $</b></div>
		<br clear="all" />
	</div> 
	<?php if($cart->isEmpty()): ?>
	<p class="carrito-row">Carrito vacio.</p>
	<?php else: ?>
	<?php   foreach ($cart->getItems() as $item): ?>
	<?php      $product = $item->getObject(); ?>
	<div class="carrito-row"> 
		<div class="articulo"><a href="<?php echo url_for('product_show', $product) ?>"><?php echo $product->getName() ?></a></div> 
		<div class="cant">
			<form action="<?php echo url_for('dd_shopping_cart_set_item_quantity', array('item_id' => $product->getId())) ?>" method="post">
				<input type="text" class="field" size="6" name="quantity" value="<?php echo $item->getQuantity() ?>" />
			</form>
		</div>
		<div class="precio"><?php echo $item->getPrice() ?></div>
		<div class="eliminar">
			<img width="24" height="24" alt="Eliminar" src="<?php echo image_path('ico-cart-borrar.png')?>" class="ico"> 
			<a href="<?php echo url_for('dd_shopping_cart_delete_item', array('item_id' => $item->getId())) ?>" onclick="return confirm('Estás seguro?');">Eliminar</a>
		</div>
		<br clear="all" />
	</div>
	<?php   endforeach;?>
	<?php endif; ?>
	<div id="carrito-row-total">
		<div class="total">TOTAL</div>
		<div class="precio-total"><?php echo number_format($cart->getTotal(), 2) ?></div>
		<br clear="all" />
	</div>
	 
	<br clear="all" />
         
	<div class="bt-pedido"><input type="submit" value="Realizar Pedido"></div>
	<!--End Carrito-->
	
	<br clear="all" />
</div>