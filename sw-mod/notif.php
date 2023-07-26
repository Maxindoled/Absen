<?php 
    if ($mod ==''){
        header('location:../404');
        echo'kosong';
    }
    else{
        include_once 'sw-mod/sw-header.php';
        if(!isset($_COOKIE['COOKIES_MEMBER']) && !isset($_COOKIE['COOKIES_COOKIES'])){
                setcookie('COOKIES_MEMBER', '', 0, '/');
                setcookie('COOKIES_COOKIES', '', 0, '/');
                // Login tidak ditemukan
                setcookie("COOKIES_MEMBER", "", time()-$expired_cookie);
                setcookie("COOKIES_COOKIES", "", time()-$expired_cookie);
                session_destroy();
                header("location:./");
        }else{
            echo'
                <div style="margin-top: 40px; margin-left: 16px;" class="left">
                    <h4>Notifikasi</h4>
                </div>
            ';
            $query="SELECT pesan_id,pesank,tanggal FROM pesan order by pesan_id DESC";
            $result = $connection->query($query);
            while ($row= $result->fetch_assoc()):
                
                echo'
                <!-- App Capsule -->
                <div style="margin-top: 10px;" class="left">
                    <div class="section">
                        <div class="card bg-warning">
                            <div class="card-body">
                                <p class="text-dark">'.$row['pesank'].'</p>
                                <p style="font-size: 10px; margin-top: -20px;">'.$row['tanggal'].'</p>
                                <a herf="" class="btn btn-dark"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                '; 
            endwhile;

        }
        include_once 'sw-mod/sw-footer.php';
    } 
?>