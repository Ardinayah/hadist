

<?php $session = \Config\Services::session();
if($session->getFlashdata('sukses')) { ?>
<p class="alert alert-success"><?php echo $session->getFlashdata('sukses'); ?></p>
<?php } ?>

<table class="table table-bordered table-hover">
	<div class="container">
		<thead>
			<tr class="bg-info">
				<th class="text-center" width="1%">NO</th>
				<th width="20%">Judul</th>
				<th width="20%">Sabda</th>
				<th width="20%">Dari</th>
				<th width="20%">Kata</th>
				<th width="20%">Arti Indonesia</th>
				<th width="20%">Arti Inggirs</th>
				<th width="20%">Arti Arab</th>
				<th width="20%">Riwayat</th>
				<th width="20%">Kitab</th>
				<th width="20%">Penulis Kitab</th>
				<th width="20%">Kitab Ayat</th>
				<th width="20%">Nasab</th>
				<th width="20%">Deskripsi</th>
				<th width="10%"></th>
			</tr>
		</thead>
		<tbody id="myTable" >
			<?php $no=1; foreach($hadits as $haditsb) { ?>
				
			<tr>
				<td class="text-center"><?php echo $no ?></td>
				<td><?php echo $haditsb['hadits_judul'] ?></td>
				<td><?php echo $haditsb['hadits_sabda'] ?></td>
				<td><?php echo $haditsb['hadits_dari'] ?></td>
				<td><?php echo $haditsb['hadits_kata'] ?></td>
				<td><?php echo $haditsb['hadits_arti_indo'] ?></td>
				<td><?php echo $haditsb['hadits_arti_ing'] ?></td>
				<td><?php echo $haditsb['hadits_arti_arab'] ?></td>
				<td><?php echo $haditsb['riwayat'] ?></td>
				<td><?php echo $haditsb['kitab_nama'] ?></td>
				<td><?php echo $haditsb['penulis'] ?></td>
				<td><?php echo $haditsb['hadits_kitab_ayat'] ?></td>
				<td><?php echo $haditsb['hadits_nasab'] ?></td>
				<td><?php echo $haditsb['hadits_desc'] ?></td>
				<td>
					<a class="btn btn-warning btn-sm" href="<?php echo base_url('admin/hadits/edit/'.$haditsb['hadits_id']) ?>">
						Edit
					</a>
					<a class="btn btn-danger btn-sm" href="<?php echo base_url('admin/hadits/delete/'.$haditsb['hadits_id']) ?>" onclick="return confirm('Yakin ingin menghapus hadits ini?')">
						Hapus
					</a>
				</td>
			</tr>
			<?php $no++; } ?>
			</tbody>
		<p>
			<a class="btn btn-success btn-sl" href="<?php echo base_url('admin/hadits/tambah') ?>">
				Tambah Hadits
			</a>
		</p>
	</div>
</table>