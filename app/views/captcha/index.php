<?php 
require_once (__DIR__."/../../dbconfig.php");
?>

<h1>hcaptcha script</h1>

<script src='https://www.hCaptcha.com/1/api.js' async defer></script>

<form action="validate/Hcaptcha" method="post">

<div  class="h-captcha" data-sitekey="6372cb24-fcf5-4a3b-812e-d96ab9178747"></div>
<input type="submit" value="Submit">
</form>

<h1>recaptcha v3 script</h1>


<script src="https://www.google.com/recaptcha/api.js"></script>

<form  id="demo-form" action="/validate/Gcaptcha" method="post">


<button class="g-recaptcha" 
        data-sitekey="<?php
        print_r($reCAPTCHASiteKeyV3);
        ?>" 
        data-callback='onSubmit' 
        data-action='submit'>Submit</button>

<!-- <input type="submit" value="Submit"> -->
</form>

<script>
   function onSubmit(token) {
    console.log(token);
     document.getElementById("demo-form").submit();
   }
 </script>
