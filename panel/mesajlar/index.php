<?php
require_once('../header.php');
require_once('../sidebar.php');
?>
  <div class="admin-panel bg-light float-left h-100 p-5" >
    <div class="admin-panel-content bg-light w-100 h-100 p-5">
      <div class="col-md-12 border-left border-danger border-width-10 p-5">
          <h1 class="border-bottom border-danger pb-3">
            MESAJLAR
          </h1>
          <p class=" font-weight-light font-italic pt-3">Bu sekmede gönderilen kiralama mesajlarını yönetebilirsiniz.</p>
      </div>
      <div class="col-md-12 mt-5">
        <div class="card border-danger mb-3 ">
          <div class="card-header bg-danger text-light">Mesajlar</div>
            <div class="card-body text-danger">
              <div class="table-responsive" style="overflow-x:auto;overflow-y:auto;">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th></th>
                      <th>#</th>
                      <th>İçerik</th>
                      <th>Gönderim Tarihi</th>
                      <th>Gönderen</th>
                      <th>Mail</th>
                      <th>Telefon</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <button class="btn btn-success" type="button" name="button">Okundu ol. iş.</button>
                      </td>
                      <th>1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                      <td>@mdo</td>
                      <td>@mdo</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
require_once('../footer.php');
 ?>
