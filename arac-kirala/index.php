<?php
require_once('../header.php');
 ?>
<div class="d-flex justify-content-center align-items-center text-center w-100 ">
   <div class="container row justify-content-center min-vh-100" style="padding-top: 150px;">
     <h1>Araç kiralamak için bize istek gönderin.</h1>
     <div class="card col-md-8 p-0 border-dark mb-3 ">
       <div class="card-header bg-dark text-light">Mesaj Hazırla</div>
       <form class="" action="index.html" method="post">
          <div class="card-body row text-dark align-items-center justify-content-center">
             <div class="form-group col-md-8">
               <label for="arac_plaka">Ad - Soyad</label>
               <input type="text" class="form-control" id="arac_plaka" placeholder="Adınız ve Soyadınız" required>
             </div>
             <div class="form-group col-md-8">
               <label for="arac_tur">E-posta</label>
               <input type="text" class="form-control" id="arac_plaka" placeholder="E-postanız" required>
             </div>
             <div class="form-group col-md-8">
               <label for="arac_tur">Telefon Numarası</label>
               <input type="email" class="form-control" id="arac_plaka" placeholder="Telefon Numaranız" required>
             </div>
             <div class="form-group col-md-8">
               <label for="arac_tur">Mesajınız</label>
               <textarea class="form-control" id="arac_plaka" name="name" rows="8" cols="80" placeholder="Mesajınız" required></textarea>

             </div>
             <div class="form-group col-md-8">
               <button class="btn btn-outline-primary" type="submit" name="ekle_arac_secenek">Mesajı Gönder</button>
             </div>
           </div>
         </form>
       </div>
   </div>

 </div>
 <?php require_once('../footer.php'); ?>
