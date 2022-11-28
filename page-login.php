<!-- HARUS PAKAI SECTION SUPAYA BISA NGAMBIL DATA USER -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Design by foolishdeveloper.com -->
    <title>LOGIN</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
    <!--Stylesheet-->
    <style media="screen">
      *,
      *:before,
      *:after {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }
      body {
        background-color: white;
      }
      .background {
        width: 430px;
        height: 520px;
        position: absolute;
        transform: translate(-50%, -50%);
        left: 50%;
        top: 50%;
      }
      .background .shape {
        height: 200px;
        width: 200px;
        position: absolute;
        border-radius: 50%;
      }
      form {
        height: 520px;
        width: 400px;
        background-color: white;
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        border-radius: 10px;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
        padding: 50px 35px;
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

      label {
        display: block;
        margin-top: 30px;
        font-size: 16px;
        font-weight: 500;
      }
      input {
        display: block;
        height: 50px;
        width: 100%;
        background-color: #DCDCDC;
        border-radius: 3px;
        padding: 0 10px;
        margin-top: 8px;
        font-size: 14px;
        font-weight: 300;
      }
      ::placeholder {
        color: #black;
      }
      button {
        margin-top: 50px;
        width: 100%;
        background-color: #4169E1;
        color: black;
        padding: 15px 0;
        font-size: 18px;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
      
    </style>
  </head>
  <body>
    <div class="background">
      <div class="shape"></div>
      <div class="shape"></div>
    </div>
    <form action="action-page-login.php" method="POST">
      <h3>Login</h3>

      
      <input type="text" placeholder="Username, NIK" name="username"/>

      
      <input type="password" placeholder="Kata Sandi"  name="password" />



      <button>Masuk</button>
      <br></br>
      <center><p>Jika belum mempunyai akun silahkan mendaftar akun dulu di bawah ini</p></center>
      <center><a href="page-register.php">Daftar</a></center>
      </div>
    </form>
  </body>
</html>
