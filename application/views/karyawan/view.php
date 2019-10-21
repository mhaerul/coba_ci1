<div class="container-fluid">
  <h1>Data Karyawan</h1> <hr>
  <div class="card-body">
    <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#karyawanModal" onclick="$('#form-add')[0].reset();">Add Data</a><br><br>
    <div id='data'></div>
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
      <form id='form-add' action="./karyawan/addData" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="NIK" name="NIK" placeholder="NIK" onkeyup="this.value = this.value.toUpperCase();" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">NAMA</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="NAMA" name="NAMA" placeholder="NAMA" onkeyup="this.value = this.value.toUpperCase();" required>
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
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">FOTO</label>
            <div class="col-sm-10">
              <input type="file" id="berkas" name="berkas" required>
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

<div class="modal" id="karyawanModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Karyawan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form id='form-edit' action="./karyawan/editData" method="POST">
        <div class="modal-body">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="NIK2" name="NIK" placeholder="NIK" onkeyup="this.value = this.value.toUpperCase();" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">NAMA</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="NAMA2" name="NAMA" placeholder="NAMA" onkeyup="this.value = this.value.toUpperCase();" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">DIVISI</label>
            <div class="col-sm-10">
              <select name="DIVISI" class="form-control" id='DIVISI2'>
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
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      async:false,
      success : function(e){
        load_data();
        $(".close").click();
        console.log(e);
      }
    }); 
  });

  function load_data() {
    $.ajax({
      url : '<?php echo base_url(); ?>karyawan/loadData',
      success : function(e) {
        $("#data").html(e);
      }
    });
  }

  load_data();

  function hapus(id) {
    if (confirm("Delete this data?")) {
      $.ajax({
        url : '<?php echo base_url(); ?>karyawan/hapus/'+id,
        success : function(e) {
          load_data();
          console.log(e);
        }
      });
    }
  }

  function editData(nik) {
    $.ajax({
      url : '<?php echo base_url(); ?>karyawan/getData/'+nik,
      success : function(e) {
        var data = $.parseJSON(e);
        console.log(data);
        $("#NIK2").val(data[0].nik);
        $("#NAMA2").val(data[0].nama);
        $("#DIVISI2").val(data[0].divisi)
      }
    });
  }
</script>