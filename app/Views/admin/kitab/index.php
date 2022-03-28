<p>
	<a class="btn btn-success btn-lg" href="<?php echo base_url('admin/kitab/tambah') ?>">
		Tambah Kitab
	</a>
</p>

<?php $session = \Config\Services::session();
if($session->getFlashdata('sukses')) { ?>
<p class="alert alert-success"><?php echo $session->getFlashdata('sukses'); ?></p>
<?php } ?>

<table class="table table-bordered table-hover">
	<thead>
		<tr class="bg-info">
			<th class="text-center" width="5%">NO</th>
			<th width="20%">Kitab</th>
			<th width="20%">Deskripsi</th>
			<th width="20%">Penulis</th>
			<th width="10%"></th>

		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($kitab as $kitaba) { ?>
		<tr>
			<td class="text-center"><?php echo $no ?></td>
			<td><?php echo $kitaba['kitab_nama'] ?></td>
			<td><?php echo $kitaba['kitab_desc'] ?></td>
			<td><?php echo $kitaba['penulisnya'] ?></td>
			<td>
				<a class="btn btn-warning btn-sm" href="<?php echo base_url('admin/kitab/edit/'.$kitaba['kitab_id']) ?>">
					Edit
				</a>
				<a class="btn btn-danger btn-sm" href="<?php echo base_url('admin/kitab/delete/'.$kitaba['kitab_id']) ?>" onclick="return confirm('Yakin ingin menghapus penulis ini?')">
					Hapus
				</a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>