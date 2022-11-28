<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
    <!--Stylesheet-->
    <style media="screen">
      /* Importing fonts from Google */
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
    background: linear-gradient(to bottom, white, white);
}

.wrapper {
    max-width: 450px;
    margin: 50px auto;
    padding: 20px 30px;
    min-height: 300px;
    background-color: white;
    box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
    border-radius: 15px;
}

.wrapper .h5 {
    color: black;
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
    color: #e9e9e9;
}

.wrapper .form-group input::placeholder {
    color: black;
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
button{
    margin-top: 10px;
    width: 100%;
    background-color: #4169E1;
    color: #black;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border: none;
    cursor: pointer;
}
      form * {
        font-family: "Poppins", sans-serif;
        color: #black;
        letter-spacing: 0.5px;
        outline: none;
        border: none;
      }
      form h3 {
        font-size: 32px;
        font-weight: 500;
        line-height: 42px;
        text-align: center;
      }
    </style>
  </head>
  <body>
  <div class="wrapper">
        <form action="action-page-register.php" method="GET">
        <h3>Registrasi</h3>
        <br></br>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="nik" placeholder="NIK">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="nama" placeholder="Nama">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="alamat" placeholder="Alamat">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="hp" placeholder="No.HP">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <!-- <div class="btn btn-primary mb-3" style="text-align: center;" >Daftar</div> -->
            <button>Daftar</button>
            <br></br>
            <center><p>Pastikan anda menginput data dengan benar!</p></center>
        </form>
    </div>
  </body>
</html>