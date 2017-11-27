function registerValidation(event) {
    document.getElementById('register-password').style.borderColor = "black";
    document.getElementById('register-name').style.borderColor = "black";
    document.getElementById('register-email').style.borderColor = "black";
    var x = nameValidation();
    var y = emailValidation();
    var z = passwordValidation();
    if(!x || !y ||  !z){
    	event.preventDefault();
    }else{
    	return true;
    };
}

function addValidation(event) {
    document.getElementById('get_image_name').style.borderColor = "black";
    document.getElementById('get_link').style.borderColor = "black";
    var x = linkValidation();
    var y = fileValidation();
    if(!x || !y ||  !z){
        event.preventDefault();
    }else{
        return true;
    };
}

function fileValidation() {
    var fileName = document.getElementById("get_image_name").value;
    if (fileName == "") {
        swal({
          title: "File not found in the directory.",
          text: "Image name cannot be blank!",
          icon: "error",
        });
        document.getElementById('get_image_name').style.borderColor = "red";
        return false;
    };
    var xhr = new XMLHttpRequest();
    var path = "/assets/images/logos/";
    var urlToFile = path.concat(fileName);
    xhr.open('HEAD', urlToFile, false);
    xhr.send();
     
    if (xhr.status == "404") {
        swal({
          title: "File not found in the directory.",
          text: "Put a valid image into the directory assets/images/logos",
          icon: "error",
        });
        document.getElementById('get_image_name').style.borderColor = "red";
        return false;
    } else {
        return true;
    };
}

function linkValidation(){
    var url = document.getElementById("get_link").value;
    if (url == "") {
        swal({
          title: "Enter a valid link",
          text: "Link box can't be empty!",
          icon: "error",
        });
        document.getElementById('get_image_name').style.borderColor = "red";
        return false;
    };
    var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
                              '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name and extension
                              '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
                              '(\\:\\d+)?'+ // port
                              '(\\/[-a-z\\d%@_.~+&:]*)*'+ // path
                              '(\\?[;&a-z\\d%@_.,~+&:=-]*)?'+ // query string
                              '(\\#[-a-z\\d_]*)?$','i');
    if (pattern.test(url)) {
        return true;
    } else {
        swal({
          title: "Enter a valid link",
          text: "The link you provided is invalid!",
          icon: "error",
        });
        document.getElementById('get_image_name').style.borderColor = "red";
        return false;
    };
}

function nameValidation() {
    var name = document.getElementById("register-name").value;
    var filter = /^\w+$/;
    if (name == "") {
        swal({
          title: "Enter a valid username",
          text: "Username cannot be empty!",
          icon: "error",
        });
        document.getElementById('register-name').style.borderColor = "red";
        return false;
    };
    if (!filter.test(name)) {
        swal({
          title: "Enter a valid username",
          text: "Username must contain only letters, numbers and underscores!",
          icon: "error",
        });
        document.getElementById('register-name').style.borderColor = "red";
        return false;
    };    
    return true;
}

function emailValidation() {
    var email = document.getElementById("register-email").value;
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (email == "" || !filter.test(email)) {
        swal({
          title: "Enter a valid email adress",
          text: "Provided email adress is invalid",
          icon: "error",
        });
        document.getElementById('register-email').style.borderColor = "red";
        return false;
    };
    return true;
}

function passwordValidation() {
    var password = document.getElementById("register-password").value;
    var length = document.getElementById("register-password").value.length;
    var name = document.getElementById("register-name").value;
    if (password == "") {
        swal({
          title: "Enter a valid password",
          text: "Password is mandatory to proceed",
          icon: "error",
        });
        document.getElementById('register-password').style.borderColor = "red";
        return false;
    };

    if(length<6 || password == name){
        swal({
          title: "Enter a valid password",
          text: "Password must be longer than 6 characters and must differ from username!",
          icon: "error",
        });
        document.getElementById('register-password').style.borderColor = "red";
        return false;
    }

    var filter = /[0-9]/;
    if(!filter.test(password)) {
        swal({
          title: "Enter a valid password",
          text: "Password must contain at least one number (0-9), at least one letter and at least one capital letter!",
          icon: "error",
        });
        document.getElementById('register-password').style.borderColor = "red";
        return false;
    }

    var filter = /[a-z]/;
    if(!filter.test(password)) {
        swal({
          title: "Enter a valid password",
          text: "Password must contain at least one number (0-9), at least one letter and at least one capital letter!",
          icon: "error",
        });
        document.getElementById('register-password').style.borderColor = "red";
        return false;
    }

    var filter = /[A-Z]/;
    if(!filter.test(password)) {
        swal({
          title: "Enter a valid password",
          text: "Password must contain at least one number (0-9), at least one letter and at least one capital letter!",
          icon: "error",
        });
        document.getElementById('register-password').style.borderColor = "red";
        return false;
    }
    return true;
}