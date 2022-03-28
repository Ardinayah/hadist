<p>
	<a class="btn btn-success btn-lg" href="<?php echo base_url('admin/penulis/tambah') ?>">
		Tambah Penulis
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
			<th width="20%">Penulis</th>
			<th width="20%">Deskripsi</th>
			<th width="15%"></th>

		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($penulis as $penulisb) { ?>
		<tr>
			<td class="text-center"><?php echo $no ?></td>
			<td><?php echo $penulisb['penulis'] ?></td>
			<td><?php echo $penulisb['penulis_desc'] ?></td>
			<td>
				<a class="btn btn-warning btn-sm" href="<?php echo base_url('admin/penulis/edit/'.$penulisb['penulis_id']) ?>">
					Edit
				</a>
				<a class="btn btn-danger btn-sm" href="<?php echo base_url('admin/penulis/delete/'.$penulisb['penulis_id']) ?>" onclick="return confirm('Yakin ingin menghapus penulis ini?')">
					Hapus
				</a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>