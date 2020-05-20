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
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item h-100 active">
        <div class="d-flex justify-content-center align-items-center h-100">
          <div class="content text-dark col-md-8">
            <h3>HAKKIMIZDA</h3>
            <br>
            <i>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum"</i>
          </div>
        </div>
      </div>
      <div class="carousel-item h-100">
        <div class="d-flex justify-content-center align-items-center h-100">
          <div class="content text-dark col-md-8">
            <h3>misyonke</h3>
            <br>
            <i>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum"</i>
          </div>
        </div>
      </div>

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
