<p>
	<a class="btn btn-success btn-lg" href="<?php echo base_url('admin/riwayat/tambah') ?>">
		Tambah Riwayat
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
			<th width="20%">Riwayat</th>
			<th width="20%">Deskripsi</th>
			<th width="15%"></th>

		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($riwayat as $riwayatb) { ?>
		<tr>
			<td class="text-center"><?php echo $no ?></td>
			<td><?php echo $riwayatb['riwayat'] ?></td>
			<td><?php echo $riwayatb['riwayat_desc'] ?></td>
			<td>
				<a class="btn btn-warning btn-sm" href="<?php echo base_url('admin/riwayat/edit/'.$riwayatb['riwayat_id']) ?>">
					Edit
				</a>
				<a class="btn btn-danger btn-sm" href="<?php echo base_url('admin/riwayat/delete/'.$riwayatb['riwayat_id']) ?>" onclick="return confirm('Yakin ingin menghapus riwayat ini?')">
					Hapus
				</a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>