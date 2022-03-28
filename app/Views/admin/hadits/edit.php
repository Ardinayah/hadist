<?php //echo 'aaaa =>'. $hadits1["hadits_id"]; ?>

<?php echo form_open(base_url('admin/hadits/edit/'.$hadits['hadits_id']),' class="form-horizontal"') ?>

<input type="hidden" name="hadits_id" value="<?php echo $hadits['hadits_id'] ?>">

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Riwayat</label>
  <div class="col-sm-9">
    <select name="hadits_riwayat_id" class="form-control">
      <?php foreach ($riwayat as $key => $riwayatb) { ?>
      <option value="<?php echo $riwayatb['riwayat_id'] ?>" <?php if($hadits['riwayat_id']==$riwayatb['riwayat_id']) { echo "selected"; } ?>>
        <?php echo $riwayatb['riwayat'] ?>
      </option>
      <?php } ?>
    </select>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Judul</label>
  <div class="col-sm-9">
    <input type="text" name="hadits_judul" class="form-control" placeholder="Judul" value="<?php echo $hadits['hadits_judul'] ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Sabda</label>
  <div class="col-sm-9">
    <input type="text" name="hadits_sabda" class="form-control" placeholder="Sabda" value="<?php echo $hadits['hadits_sabda'] ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Dari</label>
  <div class="col-sm-9">
    <input type="text" name="hadits_dari" class="form-control" placeholder="Dari" value="<?php echo $hadits['hadits_dari'] ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Kata <span class="text-danger">*</span></label>
  <div class="col-sm-9">
    <input type="text" name="hadits_kata" class="form-control" placeholder="Kata" value="<?php echo $hadits['hadits_kata'] ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Arti indo <span class="text-danger">*</span></label>
  <div class="col-sm-9">
    <input type="text" name="hadits_arti_indo" class="form-control" placeholder="Arti indo" value="<?php echo $hadits['hadits_arti_indo'] ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Arti ing <span class="text-danger">*</span></label>
  <div class="col-sm-9">
    <input type="text" name="hadits_arti_ing" class="form-control" placeholder="Arti ing" value="<?php echo $hadits['hadits_arti_ing'] ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Arti Arab <span class="text-danger">*</span></label>
  <div class="col-sm-9">
    <input type="text" name="hadits_arti_arab" class="form-control" placeholder="Arti Arab" value="<?php echo $hadits['hadits_arti_arab'] ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Kitab Ayat<span class="text-danger">*</span></label>
  <div class="col-sm-9">
    <input type="text" name="hadits_kitab_ayat" class="form-control" placeholder=" Kitab Ayat" value="<?php echo $hadits['hadits_kitab_ayat'] ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Nasab <span class="text-danger">*</span></label>
  <div class="col-sm-9">
    <input type="text" name="hadits_nasab" class="form-control" placeholder="Nasab" value="<?php echo $hadits['hadits_nasab'] ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Deskripsi <span class="text-danger">*</span></label>
  <div class="col-sm-9">
    <input type="text" name="hadits_desc" class="form-control" placeholder="Deskripsi" value="<?php echo $hadits['hadits_desc'] ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Penulis Kitab <span class="text-danger">*</span></label>
  <div class="col-sm-9">
    <select name="hadits_penulis_id" class="form-control">
      <?php foreach ($penulis as $key => $penulisb) { ?>
      <option value="<?php echo $penulisb['penulis_id'] ?>" <?php if($hadits['hadits_penulis_id']==$penulisb['penulis_id']) { echo "selected"; } ?>>
        <?php echo $penulisb['penulis'] ?>
      </option>
      <?php } ?>
    </select>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Kitab <span class="text-danger">*</span></label>
  <div class="col-sm-9">
    <select name="hadits_kitab_id" class="form-control">
      <?php foreach ($kitab as $key => $kitabb) { ?>
      <option value="<?php echo $kitabb['kitab_id'] ?>" <?php if($hadits['hadits_kitab_id']==$kitabb['kitab_id']) { echo "selected"; } ?>>
        <?php echo $kitabb['kitab_nama'] ?>
      </option>
      <?php } ?>
    </select>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right"></label>
  <div class="col-sm-9">
    <div class="btn-group">
        <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Simpan Data</button>
        <button type="reset" name="reset" class="btn btn-info btn-lg"><i class="fa fa-cut"></i> Reset</button>
        <a href="<?php echo base_url('admin/hadits') ?>" class="btn btn-secondary btn-lg" data-dismiss="modal"><i class="fa fa-times"></i> Kembali</a>
    </div>
  </div>
</div>

<?php echo form_close(); ?>