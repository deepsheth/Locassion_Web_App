function submitSignup() {
	console.log("Yea but we getting here tho?");
	name = $('#icon_username').val();
    email = $('#icon_email').val();
    password = $('#icon_password').val();
    

    console.log("Name: " + name);
    console.log("Email: " + email);
    console.log("Password: lol nah I'm not logging that");

    var http = new XMLHttpRequest();
    var url = "../php/signUp.php";
    var params = "name=" + name + "&email=" + email + "&password=" + password; //leaving out invites for now
    params = params.replace(" ","%20");//replace with command that actually encodes the string
    console.log(params);
    http.open("POST",url,true);
    http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //http.setRequestHeader("Content-length",params.length);
    //http.setRequestHeader("Connection","close");
    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200){
            alert(http.responseText);
        }
    }
    http.send(params);

    post();

}

function post() {
    $.post('signUp.php', {
        name: name,
        email: email,
        password: password,
    }, function (data) {
        $('#submission').html(data);
    });
}