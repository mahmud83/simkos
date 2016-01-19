<?php 
$this->title = 'Pembayaran Sewa Kamar Kos';
$this->params['breadcrumbs'][] = $this->title;
 ?>
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Pembayaran Sewa Kamar Kos</h3>
      <div class="pull-right">
      	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
      </div>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="table_sewa" class="table table-bordered table-striped">
        <thead>
          	<tr>
	            <th>NO</th>
	            <th>Nama</th>
	            <th>Kamar</th>
	            <th>Harga</th>
	            <th>Tanggal Booking</th>
	            <th>Alat yang dibawa</th>
	            <th>Keterangan</th>
	            <th></th>
          	</tr>
        </thead>
        <tbody>
        <?php $no=1; foreach ($data['pembayaran'] as $pembayaran): ?>
        	<tr>
	            <td><?=$no++?></td>
	            <td><?=$pembayaran['nama']?></td>
	            <td><?=$pembayaran['kamar']?></td>
	            <td>Rp. <?=number_format($pembayaran['harga'],0,',','.')?></td>
	            <td><?=date('d-m-Y', strtotime($pembayaran['tanggal_book']))?></td>
	            <td><?=$pembayaran['alat']?></td>
	            <td><?=$pembayaran['keterangan']?></td>
	            <td>
	            	<button onclick="bayar(<?=$pembayaran['id']?>)" class="btn btn-primary"><i class="fa fa-money"></i> Bayar</button>
	            </td>
          	</tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
          	<tr>
	            <th>NO</th>
	            <th>Nama</th>
	            <th>Kamar</th>
	            <th>Harga</th>
	            <th>Tanggal Booking</th>
	            <th>Alat yang dibawa</th>
	            <th>Keterangan</th>
	            <th></th>
          	</tr>
        </tfoot>
      </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->

<div class="modal" id="modalpembayaran">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Pembayaran</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label>Tanggal Jatuh Tempo:</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="tanggal_jatuh_tempo" />
            </div>
          </div>
          <div class="form-group">
            <label>Tanggal Pembayaran:</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="tanggal_pembayaran" />
            </div>
          </div>
          <div class="form-group">
            <label>Diskon:</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-times"></i>
              </div>
              <input type="text" class="form-control pull-right" id="diskon" />
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary">Simpan Pembayaran</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">
	function bayar (sewa_id) {
		window.sewa_id = sewa_id;
		$.getJSON('Cgetonesewa', {sewa_id: sewa_id}, function(json) {
		});
		$("#modalpembayaran").modal('show');
	}
</script>