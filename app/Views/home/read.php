<div class="mb-5 col-12">
	<h1 class="text-white" >Isi Kitab Ayat</h1>	
</div>
	<?php foreach($hadis as $haditsb)  { ?>
	<div class="card mt-3 ">
		<div class="card-body text-right "> 	
			<p class='text-left'><?php echo  $haditsb['hadits_kitab_ayat']; ?> </p><br>
			<p><?php echo  $haditsb['hadits_sabda'];?> 	<?php echo   $haditsb['hadits_dari']; ?></p>	
			<p><?php $haditsb['hadits_kata']; ?> </p><br>
			<p class='text-left'> <?php echo  $haditsb['hadits_arti_indo'];?> </p><br>
			<p class='text-left'><?php echo  $haditsb['hadits_arti_ing'];?> </p><br>
			<p class='text-left'><?php echo $haditsb['hadits_arti_arab'];?> </p>
		</div>
	</div>
	<?php	} ?>