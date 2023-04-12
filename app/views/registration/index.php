<?php 
    include __DIR__ . '/../header.php';
?>
<script src='https://www.hCaptcha.com/1/api.js' async defer></script>
<section class="container-fluid row align-items-center m-0 p-0 bg-tetiare-a">
    <form class="col-md-4 mx-auto row align-content-start vh-50 was-validated" method="POST" id="registrion-form">
        <h1 class="text-center text-primary-b display-2">REGISTER</h1>
        <fieldset class="form-group p-2">
            <label class="text-primary-b fs-5" for="emailField">Email</label>
            <input class="w-100" id="emailField" type="email" name="email" placeholder="E-mail" value="<?= $_POST['email'] ?? "" ?>" required/>
        </fieldset>
        <fieldset class="form-group p-2">
            <label class="text-primary-b fs-5" for="nameField">Name</label>
            <input class="w-100" id="nameField" type="name" name="name" placeholder="name" value="<?= $_POST['name'] ?? "" ?>" required/>
        </fieldset>
        <fieldset class="form-group p-2">
            <label class="text-primary-b fs-5" for="passwordOneField">Password</label>
            <input class="w-100" id="password" type="password" name="password" placeholder="password" value="<?= $_POST['password'] ?? "" ?>" required/>
        </fieldset>
        <fieldset class="form-group p-2">
            <label class="text-primary-b fs-5" for="passwordTwoField">Confirm password</label>
            <input class="w-100" id="confirmpassword" type="password" name="confirmpassword" placeholder="password" value="<?= $_POST['confirmpassword'] ?? "" ?>" required/>
            
        </fieldset>
        <fieldset action="validate/Hcaptcha" method="post">
            <div  class="h-captcha" data-sitekey="6372cb24-fcf5-4a3b-812e-d96ab9178747"></div>
        </fieldset>
        <hr class="invisible">
        <hr class="custom-hr bg-black opacity-100">
        <input class="btn btn-primary-b fs-3 <?= (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['confirmpassword'])) ? "is-invalid" : "" ?>" type="submit" value="CREATE ACCOUNT" name="submit" />
        <?php echo($this->inputError) ?>
    </form>
</section>
<?php
    include __DIR__ . '/../footer.php';
?>
