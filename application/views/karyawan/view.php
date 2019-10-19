<div class="container-fluid">
  <h1>Data Karyawan</h1> <hr>
  <div class="card-body">
    <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#karyawanModal">Add Data</a><br><br>
    <!-- <a href="<?php echo base_url(); ?>karyawan/add" class="btn btn-info btn-sm">Add Data</a><br><br> -->
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
          <th width='20px'>NO</th>
          <th>NIK</th>
          <th>NAMA</th>
          <th>DIVISI</th>
          <th>ACTION</th>
        </tr>
        <?php
          $no = 1;
          foreach($karyawan as $k) { ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $k->nik; ?></td>
              <td><?php echo $k->nama; ?></td>
              <td><?php echo $k->division; ?></td>
              <td>
                <a href="<?php echo base_url(); ?>karyawan/edit/<?php echo $k->nik; ?>" class="btn btn-primary btn-sm">Edit</a>
                <a href="<?php echo base_url(); ?>karyawan/delete/<?php echo $k->nik; ?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
            </tr>
            <?php
            $no++;
          }
          ?>

      </table>
    </div>
  </div>
</div>

<div class="modal" id="karyawanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Data Karyawan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form id='form-add' action="<?php echo base_url(); ?>karyawan/addData" method="POST">
        <div class="modal-body">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="NIK" name="NIK" placeholder="NIK">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">NAMA</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="NAMA" name="NAMA" placeholder="NAMA">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">DIVISI</label>
            <div class="col-sm-10">
              <select name="DIVISI" class="form-control">
                <?php
                  foreach ($divisi as $d) {
                    echo "<option value='$d->id'>$d->divisi</option>";
                  }
                ?>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input type='submit' class="btn btn-primary" value='SUBMIT'/>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $("#form-add").submit(function(e) {
    e.preventDefault();

    $.ajax({
      url : '<?php echo base_url(); ?>karyawan/addData',
      type : 'post',
      data : $(this).serialize(),
      success : function(e){
        console.log(e);
      }
    }); 

  });
</script>