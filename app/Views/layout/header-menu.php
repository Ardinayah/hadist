<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center"><a href="<?php echo base_url('home/index') ?>"><img src="#" alt="..." width="65" class="mr-3 img-thumbnail shadow-sm"></a>
      <div class="media-body">
        <h4 class="m-0"><a href="<?php echo base_url('home/index') ?>">H#</a></h4>
        <p class="font-weight-light text-muted mb-0"> Kumpulan Kitab Dan Hadis</p>
      </div>
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-2 mb-0">Menu</p>
  <hr>
  <form  action="<?php echo base_url('home/cari')?>" action="GET" class="form-inline">
  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
        <!-- <input style="width: 250px;" class="form-control ml-2"  id="searchForm" name="keyword" type="search" placeholder="Search" aria-label="Search"> -->
        <input style="width: 180px;" class="form-control ml-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-3 my-sm-0"  type="submit">Search</button>
    </li>
    <hr>
    <li class="nav-item">
      <div class="btn-group dropdown ml-2">
          <select style="width: 250px;" class="form-control"  name="search" id="search">
            <!-- Dropdown menu links -->
            <option type="button" class="dropdown-item" value="all" selected>All</option>
            <option class="dropdown-item" value="kitab">Kitab</option>
            <option class="dropdown-item" value="penulis">Penulis</option>
          </select>

      </div>
      <hr>
    </li>
  </ul>
  </form>
  <ul class="nav flex-column bg-white mb-0">
    <div class="col">
      <li class="nav-item mt-5 ml-2">
          <a class="nav-link" href="<?php echo base_url('login') ?>">Login</a>
      </li>
    </div>
  </ul>
</div>
<!-- End vertical navbar -->


<!-- Page content holder -->
<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><small class="text-uppercase font-weight-bold">Sembunyikan</small></button>
  