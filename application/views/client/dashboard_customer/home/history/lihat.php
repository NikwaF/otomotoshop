<?php
	foreach($orderitems as $item):
?>
<div id="lihat<?= $item['orders_id'];?>" class="modal fade" role="dialog">
<input type="hidden" id="productsid" value="<?= $item['orders_id']; ?>">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
  <div>
</div>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">List Order Products</h4>
    </div>
      <div class="modal-body">
        <div class="form-group">
		<?php foreach($orderitems as $items): ?>
		<?php if($items['orders_id'] == $item['orders_id']): ?>
            <p style="font-size:18px; font-weight:800;"><?= $items['nama_products']; ?> x<?= $items['quantity']?></p>
		<?php endif; ?>
		<?php endforeach; ?>
        </div>
      </div>
      <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
      </div>
  </div>
</div>
</div>
 <?php endforeach; ?>