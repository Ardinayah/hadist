<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- <title><?php // echo $title ?></title> -->
  <title>Hasil Pencarian</title>

  <!--CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/nav.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/font-awesome.min.css">
  <!-- CSS BOOTSTRAP -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/bootstrap/css/bootstrap.min.css">
  </style>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

<div class="container">	
<div class="mb-5 col-12">
		<h1 class="text-white" >Result</h1>
		<p><a class="text-white" style="text-decoration: none;" href="<?php echo base_url('home/index') ?>">Home</a></p>	
</div>

    <?php if(count($data)>0) 
		foreach($data as $haditsb)  { ?>
    <div class="card mt-3">
      <div class="card-body text-right">

		    <p class="text-left"><?= $haditsb['kitab_nama']; ?></p>
		    <p class="text-left"><?= $haditsb['hadits_kitab_ayat']; ?>.<?= $haditsb['hadits_judul']; ?> </p><p class="text-right"> <?= $haditsb['hadits_dari']; ?></p>
			  <p> <?= $haditsb['hadits_kata']; ?>  </p><br>
			  <p class="text-left"> <?=  $haditsb['hadits_arti_indo']; ?></p><br>
			  <p class="text-left"> <?= $haditsb['hadits_arti_ing']; ?> </p><br>
        <p class="text-left"> <?=  $haditsb['hadits_arti_arab'];?> </p>
      </div>
    </div>
    <?php }  else {
        echo "  <div class='card mt-3'>
                  <div class='card-body'>Data tidak ditemukan</div>
                </div>
            "; 
     } ?>

