document.getElementById("login-form").addEventListener("submit", function(e) {
    e.preventDefault();
    var username = document.getElementById("usernameField").value;
    var password = document.getElementById("passwordField").value;

    var data = {
        username: username,
        password: password
    };

    var xhr = new XMLHttpRequest();
    var loc = window.location.pathname;
    var dir = loc.substring(0, loc.lastIndexOf('/'));
    console.log(window.location.pathname);
    xhr.open("POST", "../views/login/login.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.status === "success") {
                // redirect to the home page
                window.location.href = "/home";
            } else {
                // display an error message
                alert(response.message);
            }
        }
    };
    xhr.send(JSON.stringify(data));
});