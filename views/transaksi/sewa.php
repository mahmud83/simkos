<?php 
$this->title = 'Form entry data Sewa';
$this->params['breadcrumbs'][] = $this->title;
 ?>
<div class="box box-default">
	<div class="box-header with-border">
	  <h3 class="box-title">Form Sewa</h3>
	  <div class="alert alert-success">Pilih Pemohon, jika belum ada silakan <a href="../pemohon/create">tambahkan pemohon terlebih dahulu</a></div>
	  <div class="box-tools pull-right">
	    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
	  </div>
	</div><!-- /.box-header -->
	<form action="csimpansewa" method="post">
	<div class="box-body">
	  <div class="row">
	    <div class="col-md-6">
	      <div class="form-group">
	        <label>Pemohon</label>
	        <select class="form-control select2" name="Sewa[pemohon_id]" id="pemohon_id">
	        <option value="" selected="" disabled="">- Pilih Pemohon -</option>
	        <?php foreach ($data['pemohon'] as $pemohon): ?>
	         <option value="<?php echo $pemohon['id'] ?>"><?php echo $pemohon['nomor_identitas']." / ".$pemohon['nama']; ?></option>
	        <?php endforeach; ?>
	        </select>
	      </div><!-- /.form-group -->
	    </div><!-- /.col -->
	    <div class="col-md-6">
	      <div class="form-group">
	        <label>Kamar</label>
	        <select class="form-control select2" name="Sewa[kamarkos_id]" id="kamarkos_id">
	        <option value="" selected="" disabled="">- Pilih Kamar -</option>
	        <?php foreach ($data['kamar'] as $kamar): ?>
	         <option value="<?php echo $kamar['id'] ?>"><?php echo $kamar['kamar']; ?></option>
	        <?php endforeach; ?>
	        </select>
	      </div><!-- /.form-group -->
	    </div><!-- /.col -->
	  </div><!-- /.row -->
	  <div class="row">
	  	<div class="col-md-3">
	  		<div class="form-group">
	            <label>Tanggal Sewa</label>
	            <div class="input-group">
	              <div class="input-group-addon">
	                <i class="fa fa-calendar"></i>
	              </div>
	              <input type="text" name="Sewa[tanggal_book]" class="tanggal form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask />
	            </div><!-- /.input group -->
	        </div><!-- /.form group -->
	  	</div>
	  	<div class="col-md-9">
	  		<div class="form-group">
	            <label>Peralatan yang dibawa</label>
	            <div class="input-group">
	              <div class="input-group-addon">
	                <i class="fa fa-list"></i>
	              </div>
	              <input type="text" name="Sewa[alat]" class="form-control" />
	            </div><!-- /.input group -->
	        </div><!-- /.form group -->
	  	</div>
	  </div>
	  <div class="row">
	  	<div class="col-md-12">
	  		<div class="form-group">
	            <div class="form-group">
                  <label>Keterangan</label>
                  <textarea class="form-control" name="Sewa[keterangan]" rows="3" placeholder="Keterangan atau lain lain"></textarea>
                </div>
	        </div><!-- /.form group -->
	  	</div>
	  </div>
	</div><!-- /.box-body -->
	<div class="box-footer">
		<button class="btn btn-lg btn-warning" type="reset"><i class="fa fa-times"></i> Batal </button>
		<button class="pull-right btn btn-lg btn-success" type="submit"><i class="fa fa-save"></i> Simpan </button>&nbsp;
	</div>
	</form>
</div><!-- /.box -->
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Seluruh Data Sewa Kamar Kos</h3>
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
	            <th>Status Pembayaran</th>
          	</tr>
        </thead>
        <tbody>
        <?php $no=1; foreach ($data['sewa'] as $sewa): ?>
        	<tr>
	            <td><?=$no++?></td>
	            <td><?=$sewa['nama']?></td>
	            <td><?=$sewa['kamar']?></td>
	            <td>Rp. <?=number_format($sewa['harga'],0,',','.')?></td>
	            <td><?=date('d-m-Y', strtotime($sewa['tanggal_book']))?></td>
	            <td><?=$sewa['alat']?></td>
	            <td><?=$sewa['keterangan']?></td>
	            <td><?php echo $sewa['status_pembayaran']=="T" ? '<label class="label label-success">Sudah Bayar</label>' : '<label class="label label-danger"><a style="color:#fff" href="pembayaran">Belum Bayar</a></label>' ?></td>
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
	            <th>Status Pembayaran</th>
          	</tr>
        </tfoot>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->