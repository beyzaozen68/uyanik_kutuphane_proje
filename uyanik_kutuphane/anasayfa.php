<?php
include("function.php");

if (!$_SESSION['login']) {
    header("Location:/panelgiris.php");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css" integrity="sha512-IuO+tczf4J43RzbCMEFggCWW5JuX78IrCJRFFBoQEXNvGI6gkUw4OjuwMidiS4Lm9Q2lILzpJwZuMWuSEeT9UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js" integrity="sha512-KBeR1NhClUySj9xBB0+KRqYLPkM6VvXiiWaSz/8LCQNdRpUm38SWUrj0ccNDNSkwCD9qPA4KobLliG26yPppJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css" integrity="sha512-1k7mWiTNoyx2XtmI96o+hdjP8nn0f3Z2N4oF/9ZZRgijyV4omsKOXEnqL1gKQNPy2MTSP9rIEWGcH/CInulptA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
   
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            
                
            
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" data-widget="control-sidebar" data-slide="true" role="button">
                        <i class="fa-regular fa-circle-xmark"></i>
                        <span id="geri">Çıkış</span>
                    </a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <i class="fa-solid fa-house"></i>
                <span class="brand-text font-weight-light">Uyanık Kütüphane</span>
            </a>
       
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="#" class="d-block">
                        <i class="fa-solid fa-heart"></i>
                        <span>Hoşgeldiniz</span>
                    </a>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item"> 
                        <a href="kitap_ekle/kutuphane.php" class="nav-link">
                            <i class="nav-icon fas fa-tachometre-alt"></i>
                            <i class="fa-solid fa-list"></i>
                            <p>Kütüphane Arşivi</p>
                            <span class="badge badge-info right"></span>
                        </a>
                    </li>
                    <li class="nav-item"> 
                        <a href="emanet/emanetlistesi.php" class="nav-link">
                            <i class="nav-icon fas fa-tachometre-alt"></i>
                            <i class="fa-solid fa-book-open"></i>
                            <p>Ödünç Kitap</p>
                            <span class="badge badge-info right"></span>
                        </a>
                    </li>
                    <li class="nav-item"> 
                        <a href="deneme/denemelistesi.php" class="nav-link">
                            <i class="nav-icon fas fa-tachometre-alt"></i>
                            <i class="fa-solid fa-swatchbook"></i>
                            <p>Denemeler</p>
                            <span class="badge badge-info right"></span>
                        </a>
                    </li>
                    <li class="nav-item"> 
                        <a href="talep/taleplistesi.php" class="nav-link">
                            <i class="nav-icon fas fa-tachometre-alt"></i>
                            <i class="fa-solid fa-bell"></i>
                            <p>Talepler</p>
                            <span class="badge badge-info right"></span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Rafta Olan Kitap Sayısı</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h3 id = "kitap_sayisi"><?=getBookCount();?></h3>
                            <div class="small text-white"></div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Mevcut Deneme Sayısı</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h3 id = "deneme_sayisi"><?=getTrialCount();?></h3>

                            <div class="small text-white"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Mevcut Talep Sayısı</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <h3 id = "deneme_sayisi"><?=getRequestCount();?></h3>
                                        <div class="small text-white"></div>
                                    </div>
                                </div>
                            </div>
                        </div>           
        </section>
        <section class="content">
            <canvas id="myChart" width="50" height="50"></canvas>
        </section>
    </div>
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>anasayfa</b>
        </div>
        <strong><a href="#"></a></strong>
    </footer>
    </div>
</body>
</html>