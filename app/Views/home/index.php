<div class="row">
	<div class="mb-5 col-12">
		<h1 class="text-white" >Kitab-Kitab</h1>		
	<?= $pager->makeLinks($varpage['halnow'],$varpage['halperpage'],$varpage['haltotal'], 'bootstrap_pagination'); ?>

	</div>	
	<?php $no=1; foreach($kitab as $haditsb => $value) { ?>
	<div id="search_section">
		<div class="card mt-3 ml-3" style="width: 300px;">
			<div   class="card-body">
				<h5 class="card-title"><a href="<?php echo base_url('home/read/'.$value['kitab_id']) ?>"><?php echo $value['kitab_nama'] ?></a></h5>
				<p class="card-text"><?php echo $value['rmd'] ?></p>
				<a href="<?php echo base_url('home/read/'.$value['kitab_id']) ?>"><?php echo $value['kitab_nama'] ?></a>
			</div>
		</div>			
	</div> 
	<?php $no++; } ?>

</div>


