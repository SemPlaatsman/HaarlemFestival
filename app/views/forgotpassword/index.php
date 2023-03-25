<?php 
    include __DIR__ . '/../header.php';
?>
    <section class="container-fluid row align-items-center m-0 p-0 bg-tetiare-a">
        <form class="col-md-4 mx-auto row align-content-start vh-50" method="POST" id="login-form">
            <h1 class="text-center text-primary-b display-2">FORGOT PASSWORD</h1>
            <fieldset class="form-group p-2">
                <label class="text-primary-b fs-5" for="emailField">Fill in your email to get a link to reset your password.</label>
                <input class="w-100" id="emailField" type="email" name="email" placeholder="E-mail" value="<?= $_POST['email'] ?? "" ?>" />
            </fieldset>
            <hr class="invisible">
            <hr class="custom-hr bg-black opacity-100">
            <input class="btn btn-primary-b fs-3 <?= (isset($_POST['email'])) ? "is-invalid" : "" ?>" type="submit" value="SENT" name="submit" />
        </form>
    </section>
<?php
    include __DIR__ . '/../footer.php';
?>