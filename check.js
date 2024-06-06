function signup() {
            var user = document.forms[0].elements[0].value;
            var pass = document.forms[0].elements[1].value;
            var repass = document.forms[0].elements[2].value;
            var email = document.forms[0].elements[3].value;
            var check = document.getElementById("terms");

            if (user.length == 0) 
                window.alert("Please enter a username");
            else if (pass.length == 0)
                window.alert("Please enter a password");
            else if (pass.length < 8)
                window.alert("Password must be 8 characters minimum");
            else if (repass != pass)
                window.alert("Password does not match");
            else if (email.length == 0)
                window.alert("Please enter an email");
            else if (email.indexOf("@",1) == -1)
                window.alert("Please check your email");
            else 
                document.forms[0].submit();
        }