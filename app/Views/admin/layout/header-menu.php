<?php 
$session        = \Config\Services::session();
use App\Models\User_model;
$model          = new User_model();
$user_login     = $model->detail($session->get('id_user'));
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
<!-- Just an image -->
  <a class="navbar-brand" href="#">
    <img src="#" width="30" height="30" alt="" loading="lazy">
  </a>
  <!----- End ----->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
        <li class="nav-item active">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/hadits') ?>">Hadits</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/penulis') ?>">Penulis</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/kitab') ?>">Kitab</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/riwayat') ?>">Riwayat</a>
          </li>
        <!-- <ul>
            <a class="nav-link text-success" href="<?php echo base_url('admin/dasbor/akun') ?>"><?php echo $user_login['username'] ?> (<?php echo $session->get('username') ?>)</a> 
          </li>
        </ul> -->
          <li class="nav-item ml-5">
            <a class="nav-link text-warning " href="<?php echo base_url('login/logout') ?>">Logout</a>
          </li>
          <li class="nav-item ml-5">
          <input id="myInput" type="text" placeholder="Search..">
          </li>

    </div>
  </div>
</nav>