
<div class="col-6 center ">
<form  method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email adres</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Wachtwoord</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Controle</label>
  </div>
  <button type="submit" class="btn btn-primary" formaction="./index.php?content=login_script">inloggen</button>
  <button type="submit" class="btn btn-primary margin" formaction="./index.php?content=registreren">acount maken</button>
</form>
</div>

