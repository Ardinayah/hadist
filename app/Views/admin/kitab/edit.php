

<?php echo form_open(base_url('admin/kitab/edit/'.$kitab['kitab_id']),' class="form-horizontal"') ?>

<input type="hidden" name="kitab_id" value="<?php echo $kitab['kitab_id'] ?>">

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Penulis <span class="text-danger">*</span></label>
  <div class="col-sm-9">
    <select name="kitab_penulis_id" class="form-control">
      <?php foreach ($penulis as $key => $penulisb) { ?>
      <option value="<?php echo $penulisb['penulis_id'] ?>" <?php if($kitab['kitab_penulis_id']==$penulisb['penulis_id']) { echo "selected"; } ?>>
        <?php echo $penulisb['penulis'] ?>
      </option>
      <?php } ?>
    </select>
  </div>
</div>


<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Judul Kitab<span class="text-danger">*</span></label>
  <div class="col-sm-9">
        <input type="text" name="kitab_nama" class="form-control" placeholder="Judul Kitab" value="<?php echo $kitab['kitab_nama'] ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Deskripsi</label>
  <div class="col-sm-9">
        <input type="text" name="kitab_desc" class="form-control" placeholder="Judul Kitab" value="<?php echo $kitab['kitab_desc'] ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right"></label>
  <div class="col-sm-9">
    <div class="btn-group">
        <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Simpan Data</button>
        <button type="reset" name="reset" class="btn btn-info btn-lg"><i class="fa fa-cut"></i> Reset</button>
        <a href="<?php echo base_url('admin/kitab') ?>" class="btn btn-secondary btn-lg" data-dismiss="modal"><i class="fa fa-times"></i> Kembali</a>
    </div>
  </div>
</div>

<?php echo form_close(); ?>