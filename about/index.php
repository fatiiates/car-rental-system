<?php
require_once('../header.php');
?>
<style media="screen">
  .carousel-control-prev-icon{
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='black' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e")
  }
  .carousel-control-next-icon{
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='black' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e")
  }
  .carousel-indicators li {
    background-color: black;
  }
  .carousel-indicators .active {
    background-color: #03a9f4!important;
  }
</style>
<div class="w-100 h-100 bg-light d-flex justify-content-center align-items-center text-center">
  <div id="carouselSlider" class="carousel slide d-block w-100" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselSlider" data-slide-to="0" class="active"></li>
      <li data-target="#carouselSlider" data-slide-to="1" ></li>
      <li data-target="#carouselSlider" data-slide-to="2" ></li>
    </ol>
    <div class="carousel-inner">
      <?php
      $keys = ['HAKKIMIZDA' => 'HAKKIMIZDA',
               'MISYON' => 'MİSYON',
               'VIZYON' => 'VİZYON'];

      foreach ($keys as $key => $value) {

        $conn=mysqli_connect($serverName,$userID,$userPass,$database);

        $query = "SELECT ayar_deger FROM site_ayar WHERE ayar_tip = ?";
        $result = $conn->prepare($query);
        $result->bind_param('s', $key);
        $result->execute();
        $result->bind_result($ayar_deger);
        $result->fetch();
        ?>
        <div class="carousel-item <?php echo $key == "HAKKIMIZDA" ? 'active':'' ?> h-100">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-dark col-md-8">
              <h3><?php echo $value ?></h3>
              <br>
              <i><?php echo $ayar_deger ?></i>
            </div>
          </div>
        </div>
        <?php
        mysqli_close($conn);
      } ?>
    </div>
    <a class="carousel-control-prev" href="#carouselSlider" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselSlider" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<?php
require_once('../footer.php');

 ?>
