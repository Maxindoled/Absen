<?php 
if(empty($connection)){
  header('location:../../');
} else {
  include_once 'sw-mod/sw-panel.php';
echo'
  <div class="content-wrapper">';
    switch(@$_GET['op']){ 
    default:
echo'
<section class="content-header">
  <h1>Data<small> Pesan</small></h1>
    <ol class="breadcrumb">
      <li><a href="./"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li class="active">Data Pesan</li>
    </ol>
</section>';
echo'
<section class="content">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><b>Data Pesan</b></h3>
          <div class="box-tools pull-right">';
          if($level_user==1){
            echo'
            <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i> Tambah Baru</button>';}
          else{
            echo'
            <button type="button" class="btn btn-success btn-flat access-failed"><i class="fa fa-plus"></i> Tambah Baru</button>';
          }
          echo'
          </div>
        </div>
          <div class="box-body">
          <div class="table-responsive">
          <table id="swdatatable" class="table table-striped">
            <thead>
            <tr>
              <th style="width:20px" class="text-center">No</th>
              <th>Pesan</th>
              <th class="text-center">Tanggal</th>
              <th style="width:100px">Aksi</th>
            </tr>
            </thead>
            <tbody>';
            $query="SELECT pesan_id,pesank,tanggal FROM pesan order by pesan_id DESC";
            $result = $connection->query($query);
            if($result->num_rows > 0){
            $no=0;
           while ($row= $result->fetch_assoc()) {
              $pesan_count ="SELECT pesan_id FROM pesan WHERE pesan_id='$row[pesan_id]'";
              $result_count = $connection->query($pesan_count);
              $no++;
              echo'
              <tr>
                <td class="text-center">'.$no.'</td>
                <td>'.$row['pesank'].'</td>
                <td class="text-center">'.$row['tanggal'].'</td>
                <td>
                  <div class="btn-group">';
                  if($level_user==1){
                    echo'
                    <a href="#modalEdit" class="btn btn-warning btn-xs enable-tooltip" title="Edit" data-toggle="modal"';?> onclick="getElementById('txtid').value='<?PHP echo $row['pesan_id'];?>';getElementById('txtnama').value='<?PHP echo $row['pesank'];?>';"><i class="fa fa-pencil-square-o"></i></a>
                <?php echo'
                  <button data-id="'.epm_encode($row['pesan_id']).'" class="btn btn-xs btn-danger delete" title="Hapus"><i class="fa fa-trash-o"></i></button>';}
                else {
                  echo'
                    <buton type="button" class="btn btn-xs btn-danger access-failed" title="Hapus"><i class="fa fa-trash-o"></i></button>';
                }echo'
                  </div>
                </td>
              </tr>';}}
            echo'
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div> 
</section>

<!-- Add -->
<div class="modal fade" id="modalAdd" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Baru</h4>
      </div>
      <form action="proses.php" id="validate" class="form add-pesan">
        <div class="modal-body">
          <div class="form-group">
              <label>Isi Pesan</label>
              <input type="text" class="form-control" name="pesank" id="pesank" required>
              <label>Tanggal</label>
              <input type="date" class="form-control" name="tanggal" id="tanggal" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-check"></i> Simpan</button>
          <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><i class="fa fa-remove"></i> Batal</button>
        </div>
    </form>
    </div>
  </div>
</div>

<!-- MODAL EDIT -->
<div class="modal fade" id="modalEdit" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Update Data</h4>
      </div>
      <form class="form update-Pesan" method="post">
       <input type="hidden" name="id" id="txtid" required" value="" readonly>
      <div class="modal-body">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="pesan_name" id="txtnama" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-check"></i> Simpan</button>
        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><i class="fa fa-remove"></i> Batal</button>
      </div>
    </form>
    </div>
  </div>
</div>';
break;
}?>

</div>
<?php }
include('./sw-library/sw-config.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangani form input
    $pesank = $_POST['pesank'];
    $tanggal = $_POST['tanggal'];
    $sisa = $_POST['sisa'];

    // Query untuk menyimpan data baru ke tabel "users"
    $sql = "INSERT INTO pesan (pesank, tanggal) VALUES ('$pesank', '$tanggal')";
    $result = mysqli_query($connection, $sql);

    // Setelah menyimpan data, alihkan pengguna ke halaman tampilan data (bisa juga ke halaman lain)
    header("Location: pesan.php");
    exit();
}
?>

