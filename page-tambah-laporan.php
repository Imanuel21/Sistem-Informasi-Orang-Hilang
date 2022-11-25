<?php
session_start();
$_SESSION["idPelapor"] = $_SESSION["idUser"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

*:focus{
    outline: none;
}

body{
    width: 100%;
    background: #fff;
    position: relative;
    font-family: 'roboto', sans-serif;
}

.navbar{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 50px;
    background: #fff;
    border-bottom: 1px solid #dfdfdf;
    display: flex;
    justify-content: center;
    padding: 5px 0;
}

.nav-wrapper{
    width: 100%;
    max-width: 1000px;
    height: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.brand-img{
    height: 100%;
    margin-top: 5px;
}

.search-box{
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    width: 200px;
    height: 25px;
    background: #fafafa;
    border: 1px solid #dfdfdf;
    border-radius: 2px;
    color: rgba(0, 0, 0, 0.5);
    text-align: center;
    text-transform: capitalize;
}

.search-box::placeholder{
    color: rgba(0, 0, 0, 0.5);
}

.nav-items{
    height: 22px;
    position: relative;
}

.icon{
    height: 100%;
    cursor: pointer;
    margin: 0 10px;
    display: inline-block;
}

.user-profile{
    width: 22px;
    border-radius: 50%;
    background-image: url(img/profile-pic.png);
    background-size: cover;
    /* Importing fonts from Google */
}
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

/* Reseting */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    min-height: 100vh;
    background: linear-gradient(to bottom, #fff, #fff);
}

.wrapper {
    max-width: 450px;
    margin: 100px auto;
    padding: 20px 30px;
    min-height: 300px;
    background-color: #fff;
    border-top: 1px solid #ffffff6e;
    border-left: 1px solid #ffffff6e;
    border-radius: 15px;
    border: 1px solid #dfdfdf;
}

.wrapper .h5 {
    color: #404258;
    text-align: center;
    margin-bottom: 1.9rem;
}

.wrapper .form-group {
    border-bottom: 1px solid #ccc;
    margin-bottom: 1.9rem;
}

.wrapper .form-group:hover {
    border-bottom: 1px solid #eee;
}

.wrapper .form-group .icon {
    color: #e8e8e8;
}

.wrapper .form-group .form-control {
    background: inherit;
    border: none;
    border-radius: 0px;
    box-shadow: none;
    color: #404258;
}

.wrapper .form-group input::placeholder {
    color: #404258;
}

.wrapper .form-group input:focus::placeholder {
    opacity: 0;
}

.wrapper .form-group .fa-phone {
    transform: rotate(90deg);
}


.wrapper .option {
    color: #ccc;
    display: block;
    position: relative;
    padding-left: 25px;
    margin-bottom: 12px;
    cursor: pointer;
    user-select: none
}

.wrapper .option:hover {
    color: #eee;
}

.wrapper .option input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0
}

.wrapper .checkmark {
    position: absolute;
    top: 3px;
    left: 0;
    height: 18px;
    width: 18px;
    background-color: inherit;
    border: 2px solid #ccc;
    border-radius: 2px
}

.wrapper .option input:checked~.checkmark {
    transition: 300ms ease-in-out all
}

.wrapper .checkmark:after {
    content: "\2713";
    position: absolute;
    display: none;
    font-weight: 600;
    color: #FFF;
    font-size: 0.9rem;
}

.wrapper .option input:checked~.checkmark:after {
    display: block
}

.wrapper .option .checkmark:after {
    left: 2px;
    top: -4px;
    width: 5px;
    height: 10px
}

.wrapper .btn.btn-primary {
    position: relative;
    color: #eee;
    padding: 0.3rem 1rem;
    border-radius: 20px;
    border: 1px solid #ddd;
    background-color: inherit;
    box-shadow: none;
    overflow: hidden;
}

.wrapper .btn.btn-primary:hover {
    background-color: #b4b4b433;
    color: #fff;
}

.wrapper .terms {
    color: #bbb;
    font-size: 0.85rem;
    text-align: center;
}

.wrapper .terms a {
    text-decoration: none;
    color: #eee;
}

.wrapper .terms a:hover {
    color: #fff;
}

.wrapper .connect {
    position: relative;
}

.wrapper .connect::after {
    content: "or";
    position: absolute;
    top: -12px;
    width: 80px;
    left: 39%;
    text-align: center;
    color: #eee;
    z-index: 100;
    background-color: rgba(255, 255, 255, 0.315);
    background-color: #1f5588;
}

.wrapper .social-links {
    margin-top: 50px;
    position: relative;
    list-style: none;
    display: flex;
    justify-content: space-around;
}

.wrapper .social-links li a {
    font-size: 1.2rem;
    width: 50px;
    height: 50px;
    background-color: #ffffff17;
    border: 1px solid #ffffff66;
    border-right: 1px solid #ffffff33;
    border-bottom: 1px solid #ffffff33;
    display: flex;
    text-decoration: none;
    justify-content: center;
    align-items: center;
    color: #fff;
    border-radius: 6px;
    box-shadow: 0 5px 30px #004683e0;
    transition: 0.5s;
    overflow: hidden;
}

.wrapper .social-links li a:hover {
    transform: translateY(-20px);
}

.wrapper .social-links li a::before,
.wrapper .btn.btn-primary::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 25px;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.6);
    transform: skew(45deg) translateX(130px);
    transition: .5s;
    opacity: 0;
}

.wrapper .social-links li a:hover:before,
.wrapper .btn.btn-primary:hover::before {
    opacity: 1;
    transform: skew(45deg) translateX(-130px);
}

@media(max-width: 460px) {
    .wrapper {
        margin: 15px;
        padding: 20px;
    }

    .wrapper .connect::after {
        left: 38%;
    }
}

@media(max-width: 345px) {
    .wrapper .connect::after {
        left: 32%;
    }
}
.button{
    margin-top: 10px;
    width: 100%;
    background-color: #b4b4b433;
    color: #FFF;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 60;
    border: none;
    cursor: pointer;
}
.kembali{
    margin-top: 40px;
    width: 150px;
    background-color: #404258;
    color: #FFF;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 60;
    border: none;
    cursor: pointer;
    float: right;
    display: block;
}
.tambah{
    margin-top: 40px;
    width: 150px;
    background-color: #404258;
    color: #FFF;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 60;
    border: none;
    cursor: pointer;
    float: left;
    display: block;
 }
    </style>
</head>
<body>
<nav class="navbar">
    <div class="nav-wrapper">
        <img src="img/logo.PNG" class="brand-img" alt="">
        <input type="text" class="search-box" placeholder="search">
        <div class="nav-items">
        <a href="main-page.php"><img src="img/home.PNG" class="icon" alt="" /></a>
            <!-- <img src="img/messenger.PNG" class="icon" alt=""> -->
            <img src="img/add.PNG" class="icon" alt="">
            <!-- <img src="img/explore.PNG" class="icon" alt=""> -->
            <img src="img/notif.png" class="icon" alt="">
            <div class="icon user-profile"></div>
        </div>
    </div>
</nav>
<div class="wrapper">
        <form action="action-page-tambah-laporan.php" method="POST" enctype="multipart/form-data">
            <div class="h5 font-weight-bold text-center mb-3">Tambah Orang Hilang</div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="nik" placeholder="NIK">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="alamat" placeholder="Alamat">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="date" data-date-format="YYYY-MMM-DD" title="Tanggal Lahir" class="form-control" name="ttl" placeholder="Tanggal Lahir">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="ciri" placeholder="Ciri-ciri">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="agama" placeholder="Agama">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="status" value="Menghilang" placeholder="Status">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="deskripsi" placeholder="Deskripsi">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="file" class="form-control" name="myfile" enctype="multipart/form-data">
            </div>
            <!-- <div class="btn btn-primary mb-3" style="text-align: center;" >Daftar</div> -->
            <!-- <div class="button"> -->
                
            <button class="tambah" name="btn">Tambahkan</button>
                    
                    
                
            <!-- </div> -->
            
        </form>
        <a href="main-page.php"><button class="kembali">Kembali</button></a>
    </div>
</body>
</html>