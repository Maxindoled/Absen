<?php 
if ($mod ==''){
    header('location:../404');
    echo'kosong';
}else{
    include_once 'sw-mod/sw-header.php';
if(!isset($_COOKIE['COOKIES_MEMBER'])){
 echo'    
    <style>
        #appCapsule{
            background-image: url(./sw-mod/sw-assets/img/bg2.png);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
 <!-- App Capsule -->
    <div style="margin-top: -50px" id="appCapsule">
        <div class="section mt-2 text-center">
            <img style="margin-top: 120px" width="140" src="sw-mod/sw-assets/img/logo.png" alt="">
        </div>
        <div style="margin-top: 50px;" class="section mb-5 p-3">
            <form id="form-login">
                <div class="card">
                    <div class="card-body">
                        <p style="text-align: center; font-size: 12px;">Masukan Email dan Password anda</p>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">Email</label>
                                <input style="font-size: 12px;" type="email" class="form-control" id="email" name="email" placeholder="Email Anda">
                                <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                            </div>
                        </div>
        
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password1">Password</label>
                                <input style="font-size: 12px;" type="password" class="form-control" id="password" name="password" placeholder="Kata sandi Anda">
                                <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark btn-block mt-2"><ion-icon name="log-in-outline"></ion-icon> Masuk</button>
                    </div>
                </div>


                <!-- <div class="form-links mt-2">
                <div>
                    <a href="registrasi">Mendaftar</a>
                </div>
                <div><a href="forgot" class="text-muted">Lupa Password?</a></div>
            </div> -->



            </form>
        </div>
        <div style="text-align: center;" class="bottom">
            <div class="center">
                <p style="font-size:10px;">2023 @ MaxindoLED</p>
            </div>
        </div>
    </div>
    <!-- * App Capsule -->';}
  else{

  echo'<!-- App Capsule -->
    <div style="margin-top: 55px;" id="appCapsule">
        <!-- Wallet Card -->
        <div class="section wallet-card-section pt-1">
            <div class="wallet-card">
                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title"> Selamat '.$salam.'</span>
                        <h6 class="total">'.ucfirst($row_user['employees_name']).'</h6>
                    </div>
                </div>
                <!-- * Balance -->
                <!-- Wallet Footer -->
                <div class="wallet-footer">
                    <div class="item">
                        <a href="./absent">
                            <div class="icon-wrapper bg-dark">
                                <ion-icon name="camera-outline"></ion-icon>
                            </div>
                            <strong>Absen</strong>
                        </a>
                    </div>


                    <div class="item">
                        <a href="./cuty">
                            <div class="icon-wrapper bg-warning">
                               <ion-icon name="calendar-outline"></ion-icon>
                            </div>
                            <strong>Cuti</strong>
                        </a>
                    </div>
                   
                    <div class="item">
                        <a href="./history">
                            <div class="icon-wrapper bg-success">
                               <ion-icon name="document-text-outline"></ion-icon>
                            </div>
                            <strong>History</strong>
                        </a>
                    </div>

                    <div class="item">
                        <a href="./profile">
                            <div class="icon-wrapper bg-secondary">
                               <ion-icon name="person-outline"></ion-icon>
                            </div>
                            <strong>Profil</strong>
                        </a>
                    </div>


                </div>
                <!-- * Wallet Footer -->
            </div>
        </div>
        <!-- Wallet Card -->

    <!-- Label Absensi Hari ini -->
    <div class="section">
        <div class="row mt-2">';
            if($result_absent->num_rows > 0){
                $row_absent     = $result_absent->fetch_assoc();
                echo'
                <div class="col-6">
                    <div class="stat-box bg-dark">
                        <div class="title text-white">Absen Masuk</div>
                        <div class="value text-white">'.$row_absent['time_in'].'</div>
                    </div>
                </div>';

                if($row_absent['time_out']=='00:00:00'){
                echo'
                <div class="col-6">
                    <a href="./absent"><div class="stat-box bg-warning">
                        <div class="title text-white">Absen Pulang</div>
                        <div class="value text-white">-</div>
                    </div></a>
                </div>';
                }else{
                echo'
                <div class="col-6">
                    <div class="stat-box bg-warning">
                        <div class="title text-white">Absen Pulang</div>
                        <div class="value text-white">'.$row_absent['time_out'].'</div>
                    </div>
                </div>';}
            } 
            else{
                echo'
                <div class="col-6">
                    <a href="./absent"><div class="stat-box bg-dark">
                        <div class="title text-white">Absen Masuk</div>
                        <div class="value text-white">-</div>
                    </div></a>
                </div>

                <div class="col-6">
                    <div class="stat-box bg-warning">
                        <div class="title text-white">Absen Pulang</div>
                        <div class="value text-white">-</div>
                    </div>
                </div>
                ';
            }   
        echo' 
        </div>
    </div>


    <div class="section mt-2">
        <div style="font-size: 12px;" class="section-title mb-1">Absen Bulan
            <select style="font-size: 12px;" class="select select-change text-dark" required>';
                if($month ==1){echo'<option value="01" selected>Januari</option>';}else{echo'<option value="01">Januari</option>';}
                if($month ==2){echo'<option value="02" selected>Februari</option>';}else{echo'<option value="02">Februari</option>';}
                if($month ==3){echo'<option value="03" selected>Maret</option>';}else{echo'<option value="03">Maret</option>';}
                if($month ==4){echo'<option value="04" selected>April</option>';}else{echo'<option value="04">April</option>';}
                if($month ==5){echo'<option value="05" selected>Mei</option>';}else{echo'<option value="05">Mei</option>';}
                if($month ==6){echo'<option value="06" selected>Juni</option>';}else{echo'<option value="06">Juni</option>';}
                if($month ==7){echo'<option value="07" selected>Juli</option>';}else{echo'<option value="07">Juli</option>';}
                if($month ==8){echo'<option value="08" selected>Agustus</option>';}else{echo'<option value="08">Agustus</option>';}
                if($month ==9){echo'<option value="09" selected>September</option>';}else{echo'<option value="09">September</option>';}
                if($month ==10){echo'<option value="10" selected>Oktober</option>';}else{echo'<option value="10">Oktober</option>';}
                if($month ==11){echo'<option value="12" selected>November</option>';}else{echo'<option value="12">November</option>';}
                if($month ==12){echo'<option value="12" selected>Desember</option>';}else{echo'<option value="12">Desember</option>';}
              echo'
            </select><span style="font-size: 12px;" class="text-dark">'.$year.'</span>
        </div>
        <div class="transactions">
            <div class="row">
                <div class="load-home" style="display:contents"></div>   
            </div>
            </div>
        </div>

      <div class="section mt-2 mb-3">
            <div style="font-size: 12px;" class="section-title">1 Minggu Terakhir</div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-dark rounded bg-dark">
                        <thead>
                            <tr>
                                <th class="text-center text-warning" style="font-size: 12px;" scope="col">Tanggal</th>
                                <th class="text-center text-warning" style="font-size: 12px;" scope="col">Jam Masuk</th>
                                <th class="text-center text-warning" style="font-size: 12px;" scope="col">Jam Pulang</th>
                            </tr>
                        </thead>
                        <tbody>';
                        $query_absen="SELECT presence_date,time_in,time_out FROM presence WHERE MONTH(presence_date) ='$month' AND employees_id='$row_user[id]' ORDER BY presence_id DESC LIMIT 6";
                        $result_absen = $connection->query($query_absen);
                        if($result_absen->num_rows > 0){
                            while ($row_absen= $result_absen->fetch_assoc()) {
                            echo'
                            <tr>
                                <th class="text-center text-light" scope="row">'.tgl_ind($row_absen['presence_date']).'</th>
                                <td class="text-center text-light">'.$row_absen['time_in'].'</td>
                                <td class="text-center text-light">'.$row_absen['time_out'].'</td>
                            </tr>';
                        }}
                        echo'
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
    </div>';

    }
  include_once 'sw-mod/sw-footer.php';
}
