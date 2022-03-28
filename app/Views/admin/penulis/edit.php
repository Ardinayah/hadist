

<?php echo form_open(base_url('admin/penulis/edit/'.$penulis['penulis_id']),' class="form-horizontal"') ?>

<input type="hidden" name="penulis_id" value="<?php echo $penulis['penulis_id'] ?>">

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Penulis<span class="text-danger">*</span></label>
  <div class="col-sm-9">
        <input type="text" name="penulis" class="form-control" placeholder="Penulis" value="<?php echo $penulis['penulis'] ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Deskripsi<span class="text-danger">*</span></label>
  <div class="col-sm-9">
        <input type="text" name="penulis_desc" class="form-control" placeholder="Deskripsi" value="<?php echo $penulis['penulis_desc'] ?>">
  </div>
</div>


<div class="form-group row">
  <label class="col-sm-3 control-label text-right"></label>
  <div class="col-sm-9">
    <div class="btn-group">
        <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Simpan Data</button>
        <button type="reset" name="reset" class="btn btn-info btn-lg"><i class="fa fa-cut"></i> Reset</button>
        <a href="<?php echo base_url('admin/penulis') ?>" class="btn btn-secondary btn-lg" data-dismiss="modal"><i class="fa fa-times"></i> Kembali</a>
    </div>
  </div>
</div>

<?php echo form_close(); ?>