<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/responsive.css" />
    <script
      src="https://kit.fontawesome.com/d8ab9fc50e.js"
      crossorigin="anonymous"
    ></script>
    <title>Kantorku</title>
  </head>
  <body>
    <main class="login">
      <div class="row">
        <div class="col">
          <div class="card-login">
            <a href="index.html"
              ><i class="fas fa-arrow-left back-login">&emsp;Kembali</i></a
            >
            <div class="ml-login">
              <div class="brand-login">
                <img src="assets/images/logo.png" alt="" />
                <div class="brand-text">KantorKu</div>
              </div>
              <div class="login-head">
                <h5 class="title-login">Masukan Identitas Anda</h5>
                <p class="p-hp">
                  Pastikan anda sundah dapat hak akses ke dalam website ini ya
                  !!
                </p>
              </div>
              <form action="loginp.php" method="POST" class="login-form">
                <p class="label-form">Usernaname</p>
                <input
                  class="form-control m-0"
                  type="email"
                  name="username"
                  id="username"
                  placeholder="example@company.com"
                  required
                />
                <p class="label-form">Password</p>
                <input
                  class="form-control m-0 mb-3"
                  placeholder="Masukan Password Anda..."
                  type="password"
                  name="pw"
                  id="pw"
                  required
                />
                <button type="submit" class="btn btn-custom full">Log In</button>
              </form>
              <a href="#" class="mt-3 lupa">Lupa Password ?</a>
            </div>
          </div>
        </div>
        <div class="col login-img-wrapper">
          <img src="assets/images/login-img.png" alt="login" />
        </div>
      </div>
    </main>
    <!-- Optional JavaScript -->
    <!-- Option 1: Bootstrap Bundle with Popper.js -->
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"
      integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
