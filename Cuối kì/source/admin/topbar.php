<style>
  .nav {
    background-color: #0b1749;
  }
  .name-logo {
    font-size: 20px;
    padding: 7px 11px;
  }
	.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 7px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
}
</style>

<nav class="nav navbar navbar-light fixed-top " style="padding:0;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  			<div class="logo">
  				<span class="fa fa-plane-departure"></span>
  			</div>
  		</div>
      <div class="name-logo col-md-4 float-left text-white">
        <large><b>Gold Dragon</b></large>
      </div>
	  	<div class="name-logo col-md-2 float-right text-white">
	  		<a href="../logout.php" class="text-white"><?php echo $_SESSION['admin_name'] ?> <i class="fa fa-power-off"></i></a>
	    </div>
    </div>
  </div>
  
</nav>