<div class="container-fluid">
  <h1>Data Karyawan</h1> <hr>
  <div class="card-body">
    <a href="<?php echo base_url(); ?>karyawan/add" class="btn btn-info btn-sm">Add Data</a><br><br>
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