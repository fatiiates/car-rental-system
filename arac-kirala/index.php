<?php
require_once('../header.php');
 ?>
<div class="d-flex justify-content-center align-items-center text-center w-100 ">
   <div class="container row justify-content-center min-vh-100" style="padding-top: 150px;">
     <h1>Araç kiralamak için bize istek gönderin.</h1>

     <div class="col-md-8">
       <?php if (!empty($_GET['message'])): ?>
         <div class="alert alert-<?php echo $_GET['alertClass']  ?> alert-dismissible fade show" role="alert">
           <?php echo $_GET['message']  ?>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
       <?php endif; ?>
       <div class="card col-md-12 p-0 border-dark mb-3 ">
         <div class="card-header bg-dark text-light">Mesaj Hazırla</div>
         <form class="" action="post/usr/arac-kirala.php" method="post">
            <div class="card-body row text-dark align-items-center justify-content-center">
               <div class="form-group col-md-8">
                 <label for="gonderen">Ad - Soyad</label>
                 <input type="text" class="form-control" id="gonderen" name="gonderen" placeholder="Adınız ve Soyadınız" required>
               </div>
               <div class="form-group col-md-8">
                 <label for="mail">E-posta</label>
                 <input type="email" class="form-control" id="mail" name="mail" placeholder="E-postanız" required>
               </div>
               <div class="form-group col-md-8">
                 <label for="telefon">Telefon Numarası</label>
                 <input type="text" class="form-control" id="telefon" name="telefon" placeholder="Telefon Numaranız" required>
               </div>
               <div class="form-group col-md-8">
                 <label for="icerik">Mesajınız</label>
                 <textarea class="form-control" id="icerik" name="icerik" rows="8" cols="80" placeholder="Mesajınız" required></textarea>
               </div>
               <div class="form-group col-md-8">
                 <button class="btn btn-outline-primary" type="submit" value="true" name="gonder_mesaj">Mesajı Gönder</button>
               </div>
             </div>
           </form>
         </div>
     </div>
   </div>
 </div>
 <?php require_once('../footer.php'); ?>
