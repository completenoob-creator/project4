<?php
if(!(isset($_GET["content"]) && isset($_GET["id"]) && isset($_GET["pwh"]))){
    header("Location: ./index.php?content=message&alert=hacker-alert");
}
?>

<form action="./index.php?content=activate_script" method="POST">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="exampleInputPassword1">Wachtwoord</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Wachtwoordcheck</label>
                <input type="password" name="passwordcheck" class="form-control" id="exampleInputPassword1">
            </div>
            <!-- id en pwh in het geheim meesturen -->
            <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
            <input type="hidden" name="pwh" value="<?php echo $_GET["pwh"]; ?>">
            <button type="submit" class="btn btn-danger">Activeren</button>
        </div>
    </div>
</form>