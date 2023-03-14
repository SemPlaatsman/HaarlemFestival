<?php 
    include __DIR__ . '/../header.php';
?>
    <section class="container-fluid row align-items-center m-0 p-0 bg-tetiare-a h-100" id="login-container">
        <form class="col-md-4 mx-auto row align-content-start vh-50" method="POST" id="login-form">
            <h1 class="text-center text-primary-b display-2">LOGIN</h1>
            <fieldset class="form-group p-2">
                <label class="text-primary-b fs-5" for="emailField">Email:</label>
                <input class="w-100" id="emailField" type="email" name="email" value="<?= $_POST['email'] ?? "" ?>" />
            </fieldset>
            <fieldset class="form-group p-2">
                <label class="text-primary-b fs-5" for="passwordField">Password:</label>
                <input class="w-100" id="passwordField" type="password" name="password" />
            </fieldset>
            <hr class="invisible">
            <hr class="custom-hr bg-black opacity-100">
            <input class="btn btn-primary-b fs-3 <?= (isset($_POST['username']) && isset($_POST['password'])) ? "is-invalid" : "" ?>" type="submit" value="LOGIN" name="submit" />
            <p class="text-center invalid-feedback text-light fs-6 p-1 my-0 mt-3 bg-danger rounded">Invalid username/password combination!</p>
        </form>
    </section>
<?php
    include __DIR__ . '/../footer.php';
?>