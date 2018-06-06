var user_type;
var visa_value = '';
var visa_id1 = '';
var c = 0;
var d = 0;

function visa_id(country_id) {
    visa_value = country_id;
    c = c + 1;
    visa_country(visa_id1);
}

function visa_doc_id(country_id) {
    visa_value = country_id;
    c = c + 1;
    visa_document(visa_id1);
}

function visa_user_doc_id(country_id) {
    visa_value = country_id;
    c = c + 1;
    visa_user_document(visa_id1);
}

function val_reset() {
    c = 0;
    d = 0;
}

function val_set() {
    d = d + 1;

}

function visa_document(country_id) {
    visa_id1 = country_id;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            if (d > 0) {
                document.getElementById('select1').innerHTML = this.responseText;
            }
            if (c == 0) {
                document.getElementById('select').innerHTML = this.responseText;
            }
        }
    };
    if (c == 0) {
        xmlhttp.open("GET", "get_doc_visa_type.php?data=" + country_id, true);
        xmlhttp.send();
    }
    view_documents(visa_id1, visa_value);

}

function visa_user_document(country_id) {
    visa_id1 = country_id;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {



            document.getElementById('select').innerHTML = this.responseText;

        }
    };
    if (c == 0) {
        xmlhttp.open("GET", "get_user_visa_type.php?data=" + country_id, true);
        xmlhttp.send();
    }
    view_user_documents1(visa_id1, visa_value);

}


function visa_country(country_id, message) {
    visa_id1 = country_id;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('select').innerHTML = this.responseText;
        }
    };
    if (c == 0) {
        xmlhttp.open("GET", "get_visa_type.php?data=" + country_id, true);
        xmlhttp.send();
    }
    view_customers(visa_id1, visa_value);

}

function spcl_event() {


    setTimeout(function () {
        if ($('#span_error').length > 0) {
            $('#span_error').fadeOut();
            window.history.replaceState({}, document.title, "/" + "visa_processing/view_country.php?message=");
        }
    }, 5000);
    setTimeout(function () {
        if ($('#span_error_visa').length > 0) {
            $('#span_error_visa').fadeOut();
            window.history.replaceState({}, document.title, "/" + "visa_processing/view_visa_type.php?message=");
        }
    }, 5000)


}

function admin_login() {


    if ($('#admin_login_form').valid()) {

        var email = document.getElementById('email').value;
        var pass = document.getElementById('pass').value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                if (this.responseText == 'admin_login.php') {
                    document.getElementById("sp1").innerHTML = "Inncorrect Id/Password";
                    document.getElementById("sp1").style.color = 'white';

                }

                else {


                    window.location.href = this.responseText;
                }

            }
        };
        var query = "{\"email\":\"" + email + "\",\"pass\":\"" + pass + "\"}";

        xmlhttp.open("GET", "admin_login_check.php?data=" + query, true);
        xmlhttp.send();
    }

}


function view_admin() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var x = this.responseText;

            var obj = JSON.parse(x);
            var table = "<table  class='table  table-bordered ' ui-jq='footable'>";
            table = table + "<tbody>";
            table = table + "<thead>";
            table = table + " <tr>";
            table = table + "<th data-breakpoints='xs'>Email-ID</th>";
            table = table + "<th>Mobile Number</th>";
            table = table + " <th>Type</th>";
            table = table + "<th data-breakpoints='xs'>Delete</th>";
            table = table + "<th data-breakpoints='xs sm md' >Edit</th>";
            table = table + "</tr>";
            table = table + " </thead>";
            for (var i = 0; i < obj.length; i++) {
                var ar = obj[i];


                table = table + "<tr data-expanded='true'>";
                table = table + "<td >" + ar["email"] + "</td>";
                table = table + "<td >" + ar["mobile_num"] + "</td>";
                table = table + "<td >" + ar["type"] + "</td>";
                table = table + "<td><a href='admin_delete.php?email=" + ar["email"] + "' onclick='return confirm(\"Are You Sure Want to delete?\")'><h6 id='del'>Delete</h6></a></td>";
                table = table + "<td><a href='admin_update.php?email=" + ar["email"] + "'><h6 id='update'>Edit</h6></a></td>";
                table = table + "</tr>";

            }
            table = table + "</tbody>";
            table = table + "</table>";
            document.getElementById("sp2").innerHTML = table;
        }

    };
    xmlhttp.open("GET", "add_admin_logic.php", true);
    xmlhttp.send();


}

function update_admin() {
    if ($("#update_form").valid()) {
        var email, number, type;
        email = document.getElementById("email").value;
        number = document.getElementById("number").value;
        type = document.getElementById("type").value;
        var s = "{\"email\":\"" + email + "\",\"number\":\"" + number + "\",\"type\":\"" + type + "\"}";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == "Entry Updated") {
                    window.location.href = "view_admin.php";
                }
                else {
                    document.getElementById("sp1").innerHTML = this.responseText;

                }
            }
        };
        xmlhttp.open("GET", "admin_update_submit.php?string=" + s, true);
        xmlhttp.send();
    }
}

function add_admin() {
    var form = $('#add_admin_form');
    if (form.valid()) {
        var email, password, confirmpassword, number, type, otp;
        email = document.getElementById("email").value;
        password = document.getElementById("password").value;
        confirmpassword = document.getElementById("confirmpassword").value;
        number = document.getElementById("number").value;
        type = document.getElementById("type").value;
        otp = 0;
        var s = "{\"email\":\"" + email + "\",\"password\":\"" + password + "\",\"confirmpassword\":\"" + confirmpassword + "\",\"number\":\"" + number + "\",\"type\":\"" + type + "\",\"otp\":\"" + otp + "\"}";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("sp1").innerHTML = this.responseText;
                window.location.href = "view_admin.php";
            }
        };
        xmlhttp.open("GET", "add_admin_query.php?ins_query=" + s, true);
        xmlhttp.send();
    }
}

function change_password() {
    if ($('#change_password_form').valid()) {
        var email, password, newpassword, confirmpassword;
        email = document.getElementById("email").value;
        password = document.getElementById("password").value;
        newpassword = document.getElementById("newpassword").value;
        confirmpassword = document.getElementById("confirmpassword").value;
        var s = "{\"email\":\"" + email + "\",\"password\":\"" + password + "\",\"newpassword\":\"" + newpassword + "\",\"confirmpassword\":\"" + confirmpassword + "\"}";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (password === newpassword) {
                document.getElementById("sp1").innerHTML = " New Password and Old password are Same So can't updated";
            }
            else {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("sp1").innerHTML = this.responseText;
                    if (this.responseText == 'Password Changed') {
                        window.location.href = "logout.php";
                    }
                    else {
                        document.getElementById("sp1").innerHTML = this.responseText;
                    }
                }
            }

        };
        xmlhttp.open("GET", "change_password_update.php?ins_query=" + s, true);
        xmlhttp.send();
    }
}

function forget_password() {

    if ($("#forget_password_form").valid()) {
        var email = document.getElementById('email').value;
       // var type = document.getElementById('type').value;


        var s = '{"email":"' + email +  '"}';
        var xmlhttp;

        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                var output = this.responseText;
                alert(this.responseText);

                if (output == 1) {
                    document.getElementById('sp1').innerHTML = 'Email does not Exist';
                    document.getElementById('sp1').className = 'text-danger';
                }
                else if (output == 2) {
                    window.location.href = "enter_otp.php?q=" + email ;
                }

            }
            else {
                document.getElementById('sp1').innerHTML = 'Processing...';
            }
        };

        xmlhttp.open('GET', 'forget_password_submit.php?q=' + s, true);
        xmlhttp.send();
    }
}

function check_OTP() {
    if ($("#otp_form").valid()) {
        var email = document.getElementById('email').value;
        var otp = document.getElementById('otp').value;
        //var type = document.getElementById('type').value;
        //alert(type);
        var s = '{"email":"' + email + '","otp":"' + otp +  '"}';

        var xmlhttp;
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                var output = this.responseText;
                alert(this.responseText);

                if (output == 1) {
                    alert(output);
                    document.getElementById('sp1').innerHTML = 'OTP does not Match';
                    document.getElementById('sp1').className = 'text-danger';
                }
                else if (output == 2) {
                    window.location.href = "set_new_password.php?q=" + email;
                }

            }
            else {

                document.getElementById('sp1').innerHTML = 'Processing...';
            }
        };
        xmlhttp.open('GET', 'otp_submit.php?q=' + s, true);
        xmlhttp.send();
    }
}

function set_new_password() {
    if ($("#set_password_form").valid()) {
        var email = document.getElementById("email").value;
        var new_pass = document.getElementById("new_pass").value;
       // var type = document.getElementById("type").value;
        var s = '{"email":"' + email + '","new_pass":"' + new_pass + '"}';
        var xmlhttp;
        alert(s);
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                var output = this.responseText;
                alert(output);
                if (output == 1) {
                    
                    window.location.href = 'admin_login.php';
                }


                else {
                    document.getElementById('sp1').innerHTML = this.responseText;
                }
            }
        };
        xmlhttp.open('GET', 'set_new_password_submit.php?q=' + s, true);
        xmlhttp.send();
    }
}


function add_news() {
    if ($('#add_news_form').valid()) {
        var caption, desc;
        caption = document.getElementById("caption").value;
        desc = document.getElementById("desc").value;
        var intro = document.getElementById("intro").value;
        var spcl = document.getElementById("key_point").value;
        var s = "{\"caption\":\"" + caption + "\",\"desc\":\"" + desc + "\",\"intro\":\"" + intro + "\",\"spcl\":\"" + desc + "\"}";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("sp1").innerHTML = this.responseText;
                window.location.href = "view_news.php";
            }
        };
        alert(s);
        xmlhttp.open("GET", "add_news_query.php?ins_query=" + s, true);
        xmlhttp.send();
    }
}

function view_news() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var x = this.responseText;
            var obj = JSON.parse(x);
            var table = "<table class='table table-bordered table-responsive 'ui-jq='footable'>";
            table = table + "<tbody>";
            table = table + "<thead>";
            table = table + " <tr>";

            table = table + "<th data-breakpoints='xs'>Sr.No</th>";
            table = table + "<th>Caption</th>";
            table = table + "<th>Description</th>";
            table = table + "<th>Date</th>";
            table = table + "<th>DELETE</th>";
            table = table + "<th>EDIT</th>";
            table = table + "</tr>";
            table = table + "</thead>";
            for (var i = 0; i < obj.length; i++) {
                var ar = obj[i];
                table = table + "<tr>";
                table = table + "<td>" + (i + 1) + "</td>";
                table = table + "<td >" + ar["caption"] + "</td>";
                table = table + "<td >" + ar["desc"] + "</td>";
                table = table + "<td>" + ar["date"] + "</td>";
                table = table + "<td ><a href='news_delete.php?id=" + ar["id"] + "' onclick='return confirm(\"Are You Sure Want to delete?\")'>Delete</a></td>";
                table = table + "<td ><a href='news_update.php?id=" + ar["id"] + "'>Update</a></td>";
                table = table + "</tr>";

            }

            table = table + "</tbody>";
            table = table + "</table>";
            document.getElementById("sp2").innerHTML = table;
        }
        else {
            document.getElementById("sp2").innerHTML = "Loading...";
        }
    };
    xmlhttp.open("GET", "add_news_logic.php", true);
    xmlhttp.send();


}

function update_news() {

    if ($("#update_form").valid()) {

        var id, caption, desc;
        id = document.getElementById("id").value;
        caption = document.getElementById("caption").value;
        desc = document.getElementById("description").value;
        var s = "{\"id\":\"" + id + "\",\"caption\":\"" + caption + "\",\"description\":\"" + desc + "\"}";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == "Entry Updated") {
                    window.location.href = "view_news.php";
                }
                else {
                    document.getElementById("sp1").innerHTML = this.responseText;

                }
            }
        };
        xmlhttp.open("GET", "news_update_submit.php?string=" + s, true);
        xmlhttp.send();
    }
}

function add_country() {
    if ($("#add_country_form").valid()) {
        var country_code, country_name;
        country_code = document.getElementById("country_code").value;
        country_name = document.getElementById("country_name").value;
        var s = "{\"country_code\":\"" + country_code + "\",\"country_name\":\"" + country_name + "\"}";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("sp1").innerHTML = this.responseText;
                window.location.href = "view_country.php?message=";
            }
        };
        xmlhttp.open("GET", "add_country_query.php?ins_query=" + s, true);
        xmlhttp.send();

    }
}


function view_country() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var x = this.responseText;
            if (x == 'No Entries Yet!!') {
                document.getElementById("error_message").innerHTML = this.responseText;
            }
            else {
                var obj = JSON.parse(x);
                var table = "<table class='table table-bordered table-responsive 'ui-jq='footable'>";
                table = table + "<tbody>";
                table = table + "<thead>";
                table = table + "<tr>";
                table = table + "<th>Sr.no</th>";
                table = table + "<th>Country Code</th>";
                table = table + "<th>Country Name</th>";

                table = table + "<th>DELETE</th>";
                table = table + "<th>EDIT</th>";
                table = table + "</tr>";
                table = table + "</thead>";
                for (var i = 0; i < obj.length; i++) {
                    var ar = obj[i];
                    table = table + "<tr>";
                    table = table + "<td>" + (i + 1) + "</td>";
                    table = table + "<td>" + ar["country_code"] + "</td>";
                    table = table + "<td>" + ar["country_name"] + "</td>";
                    table = table + "<td><a href='country_delete.php?id=" + ar["id"] + "' onclick='return confirm(\"Are You Sure Want to delete?\")'>Delete</a></td>";
                    table = table + "<td><a href='country_update.php?id=" + ar["id"] + "'>Update</a></td>";
                    table = table + "</tr>";

                }

                table = table + "</tbody>";
                table = table + "</table>";
                document.getElementById("sp2").innerHTML = table;
            }
        }

    };
    xmlhttp.open("GET", "add_country_logic.php", true);
    xmlhttp.send();


}

function update_country() {

    if ($("#update_form").valid()) {

        var id, code, name;
        id = document.getElementById("id").value;
        code = document.getElementById("country_code").value;
        name = document.getElementById("country_name").value;
        var s = "{\"id\":\"" + id + "\",\"country_code\":\"" + code + "\",\"country_name\":\"" + name + "\"}";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == "Entry Updated") {
                    window.location.href = "view_country.php?message=";
                }
                else {
                    document.getElementById("sp1").innerHTML = this.responseText;

                }
            }
        };
        xmlhttp.open("GET", "country_update_submit.php?string=" + s, true);
        xmlhttp.send();
    }
}

function view_visa_type(country_id) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var x = this.responseText;
            if (x == 'No Entries Yet!!') {
                document.getElementById("sp2").innerHTML = this.responseText;
            }
            else {
                var obj = JSON.parse(x);
                var table = "<table class='table table-bordered table-responsive 'ui-jq='footable'>";
                table = table + "<tbody>";
                table = table + "<thead>";
                table = table + "<tr>";
                table = table + "<th>Sr.No</th>";
                table = table + "<th>Country Name</th>";
                table = table + "<th>Visa Type</th>";
                table = table + "<th>DELETE</th>";
                table = table + "<th>EDIT</th>";
                table = table + "</tr>";
                table = table + "</thead>";
                for (var i = 0; i < obj.length; i++) {
                    var ar = obj[i];
                    table = table + "<tr>";
                    table = table + "<td>" + (i + 1) + "</td>";
                    table = table + "<td>" + ar["country"] + "</td>";
                    table = table + "<td>" + ar["visa_type"] + "</td>";
                    table = table + "<td><a href='visa_type_delete.php?id=" + ar["id"] + "' onclick='return confirm(\"Are You Sure Want to delete?\")'>Delete</a></td>";
                    table = table + "<td><a href='visa_type_update.php?id=" + ar["id"] + "'>Update</a></td>";
                    table = table + "</tr>";

                }

                table = table + "</tbody>";
                table = table + "</table>";
                document.getElementById("sp2").innerHTML = table;
            }
        }

    };
    xmlhttp.open("GET", "visa_type_logic.php?data=" + country_id, true);
    xmlhttp.send();


}

function update_visa_type() {

    if ($("#update_form").valid()) {

        var description, id, type, country;
        id = document.getElementById("id").value;
        type = document.getElementById("type").value;
        country = document.getElementById("country").value;

        description = document.getElementById("description").value;
        var s = "{\"id\":\"" + id + "\",\"type\":\"" + type + "\",\"country\":\"" + country + "\",\"description\":\"" + description + "\"}";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == "Entry Updated") {
                    window.location.href = "view_visa_type.php?message=";
                }
                else {
                    alert(this.responseText);
                }
            }
        };
        xmlhttp.open("GET", "visa_type_update_submit.php?string=" + s, true);
        xmlhttp.send();
    }
}

function add_visa() {

    if ($("#add_visa_form").valid()) {
        var country = document.getElementById("country").value;
        var visa_type = document.getElementById("visa_type").value;
        var description = document.getElementById("description").value;
        var s = "{\"visa_type\":\"" + visa_type + "\",\"country\":\"" + country + "\",\"description\":\"" + description + "\"}";


        var xmlhttp;
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                document.getElementById("sp1").innerHTML = this.responseText;
                document.getElementById("country").innerHTML = "";
                document.getElementById("visa_type").innerHTML = "";
                document.getElementById("description").innerHTML = "";
                window.location.href = "view_visa_type.php?message=";


            }
        };
        xmlhttp.open('GET', 'add_visa_type.php?query=' + s, true);
        xmlhttp.send();

    }
}


function add_document() {
    if ($("#add_document_form").valid()) {
        var formdata = new FormData();
        var controls = document.getElementById('add_document_form').elements;
        for (var i = 0; i < controls.length; i++) {
            if (controls[i].type === "file") {
                if (controls[i].files.length > 0) {
                    formdata.append(controls[i].name, controls[i].files[0]);
                }
            }
            else {
                formdata.append(controls[i].name, controls[i].value);
            }
        }

        var xmlhttp;

        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {

            if (this.status == 200 && this.readyState == 4) {
                document.getElementById("sp1").innerHTML = this.responseText;
                if (this.responseText == 'Documents Added Successfully') {
                    window.location.href = "view_document.php";
                }
                else {
                    document.getElementById("sp1").innerHTML = this.responseText;
                }

            }
        };
        xmlhttp.open('POST', 'add_document_submit.php', true);
        xmlhttp.send(formdata);

    }
}

function view_documents(id, visa_value) {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var x = this.responseText;

            if (x == 'No Entries Yet!!') {
                document.getElementById("sp2").innerHTML = this.responseText;
            }
            else {
                var obj = JSON.parse(x);
                var table = "<table class='table table-bordered table-responsive 'ui-jq='footable'>";
                table = table + "<tbody>";
                table = table + "<thead>";
                table = table + "<tr>";
                table = table + "<th>Sr.No</th>";
                table = table + "<th>Country Name</th>";
                table = table + "<th>Visa Type</th>";
                table = table + "<th>Document Name</th>";
                table = table + "<th> View Document </th>";
                table = table + "<th>DELETE</th>";
                table = table + "<th>EDIT</th>";
                table = table + "</tr>";
                table = table + "</thead>";
                for (var i = 0; i < obj.length; i++) {
                    var ar = obj[i];
                    table = table + "<tr>";
                    table = table + "<td>" + (i + 1) + "</td>";
                    table = table + "<td>" + ar["country_name"] + "</td>";
                    table = table + "<td>" + ar["visa_type"] + "</td>";
                    table = table + "<td>" + ar["document_name"] + "</td>";
                    table = table + "<td><a href='" + ar["document_file"] + "' target='_blank'>View</a></td>";
                    table = table + "<td><a href='document_type_delete.php?id=" + ar["id"] + "' onclick='return confirm(\"Are You Sure Want to delete?\")'>Delete</a></td>";
                    table = table + "<td><a href='document_type_update.php?id=" + ar["id"] + "'>Update</a></td>";
                    table = table + "</tr>";

                }

                table = table + "</tbody>";
                table = table + "</table>";
                document.getElementById("sp2").innerHTML = table;
            }
        }

    };
    xmlhttp.open("GET", "document_type_logic.php?data=" + id + "&data1=" + visa_value, true);
    xmlhttp.send();


}

function update_document() {

    if ($("#update_document_form").valid()) {
        var status;

        var doc = document.getElementById('document_file').value;
        if (doc == "") {
            status = 0;
        }
        else {
            status = 1;
        }

        var formdata = new FormData();
        var controls = document.getElementById('update_document_form').elements;
        for (var i = 0; i < controls.length; i++) {
            if (controls[i].type === "file") {
                if (controls[i].files.length > 0) {
                    formdata.append(controls[i].name, controls[i].files[0]);
                }
            }
            else {
                formdata.append(controls[i].name, controls[i].value);
            }
        }

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == "Entry Updated") {
                    alert(this.responseText);

                    window.location.href = "view_document.php";
                }
                else {
                    document.getElementById("sp1").innerHTML = this.responseText;

                }
            }
        };
        xmlhttp.open("POST", "document_type_update_submit.php?status=" + status, true);
        xmlhttp.send(formdata);
    }
}


function view_customers(id, visa_value) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var x = this.responseText;

            if (x == 'No Entries Yet!!') {

                document.getElementById("sp2").innerHTML = this.responseText;


            }
            else {
                var obj = JSON.parse(x);

                var table = "<table class='table  table-bordered  'ui-jq='footable'>";
                table = table + "<tbody>";
                table = table + "<thead>";
                table = table + "<tr>";
                table = table + "<th>Sr.no</th>";
                table = table + "<th> Name</th>";
                table = table + "<th>Address</th>";
                table = table + "<th>Passport No.</th>";
                table = table + "<th>Email</th>";
                table = table + "<th>Password</th>";
                table = table + "<th>Country </th>";
                table = table + "<th>Visa </th>";
                table = table + "<th>Mobile </th>";
                table = table + "<th>Photo</th>";
                table = table + "<th>DELETE</th>";
                table = table + "<th>EDIT</th>";
                table = table + "</tr>";
                table = table + "</thead>";
                for (var i = 0; i < obj.length; i++) {
                    var ar = obj[i];
                    table = table + "<tr>";
                    table = table + "<td>" + (i + 1) + "</td>";
                    table = table + "<td >" + ar["customer_name"] + "</td>";
                    table = table + "<td >" + ar["address"] + "</td>";
                    table = table + "<td >" + ar["passport_number"] + "</td>";
                    table = table + "<td >" + ar["customer_email"] + "</td>";
                    table = table + "<td >" + ar["customer_password"] + "</td>";
                    table = table + "<td >" + ar["country_name"] + "</td>";
                    table = table + "<td > " + ar["visa_type"] + "</td>";
                    table = table + "<td > " + ar["mobile"] + "</td>";
                    table = table + "<td ><img src = '" + ar['photo'] + " 'width='50' height='50'></td>";
                    table = table + "<td ><a href='customer_type_delete.php?id=" + ar["customer_id"] + "' onclick='return confirm(\"Are You Sure Want to delete?\")'>Delete</a></td>";
                    table = table + "<td ><a href='customer_type_update.php?id=" + ar["customer_id"] + "'>Update</a></td>";
                    table = table + "</tr>";

                }
                table = table + "</tbody>";
                table = table + "</table>";
                document.getElementById("sp2").innerHTML = table;
            }
        }

    };
    xmlhttp.open("GET", "customer_type_logic.php?data=" + id + "&data1=" + visa_value, true);
    xmlhttp.send();


}

function customer_text() {


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var x = this.responseText;

            if (x == 'No Entries Yet!!') {

                document.getElementById("sp2").innerHTML = this.responseText;


            }
            else {
                var obj = JSON.parse(x);

                var table = "<table class='table  table-bordered table-responsive 'ui-jq='footable'>";
                table = table + "<tbody>";
                table = table + "<thead>";
                table = table + "<tr>";
                table = table + "<th>Sr.no</th>";
                table = table + "<th> Name</th>";
                table = table + "<th>Address</th>";
                table = table + "<th>Passport No.</th>";
                table = table + "<th>Email</th>";
                table = table + "<th>Password</th>";
                table = table + "<th>Country </th>";
                table = table + "<th>Visa </th>";
                table = table + "<th>Mobile </th>";
                table = table + "<th>Photo</th>";
                table = table + "<th>Message</th>";

                table = table + "</tr>";
                table = table + "</thead>";
                for (var i = 0; i < obj.length; i++) {
                    var ar = obj[i];
                    table = table + "<tr>";
                    table = table + "<td>" + (i + 1) + "</td>";
                    table = table + "<td >" + ar["customer_name"] + "</td>";
                    table = table + "<td >" + ar["address"] + "</td>";
                    table = table + "<td >" + ar["passport_number"] + "</td>";
                    table = table + "<td >" + ar["customer_email"] + "</td>";
                    table = table + "<td >" + ar["customer_password"] + "</td>";
                    table = table + "<td >" + ar["country_name"] + "</td>";
                    table = table + "<td > " + ar["visa_type"] + "</td>";
                    table = table + "<td > " + ar["mobile"] + "</td>";
                    table = table + "<td ><img src = '" + ar['photo'] + " 'width='50' height='50'></td>";
                    table = table + "<td ><a href='text_message.php?id=" + ar["customer_email"] + "&mobile=" + ar['mobile'] + "' >Message</a></td>";

                    table = table + "</tr>";

                }
                table = table + "</tbody>";
                table = table + "</table>";
                document.getElementById("sp2").innerHTML = table;
            }
        }

    };
    xmlhttp.open("GET", "customer_type_logic.php?data=&data1=" + visa_value, true);
    xmlhttp.send();


}

function update_customer() {

    if ($("#update_customer_form").valid()) {
        var status;

        var photo = document.getElementById('photo').value;
        if (photo == "") {
            status = 0;
        }
        else {
            status = 1;
        }
        var formdata = new FormData();
        var controls = document.getElementById('update_customer_form').elements;

        for (var i = 0; i < controls.length; i++) {
            if (controls[i].type === "file") {
                if (controls[i].files.length > 0) {
                    formdata.append(controls[i].name, controls[i].files[0]);

                }
            }
            else {
                formdata.append(controls[i].name, controls[i].value);

            }
        }

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == "Entry Updated") {
                    alert(this.responseText);
                    window.location.href = "view_customers.php";
                }
                else {
                    document.getElementById("sp1").innerHTML = this.responseText;

                }
            }
        };
        xmlhttp.open("POST", "customer_type_update_submit.php?status=" + status, true);
        xmlhttp.send(formdata);
    }
}

var user_id;

function send_reason() {
    var xmlhttp = new XMLHttpRequest();
    var message = document.getElementById('reason').value;
    status = 0;

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var x = this.responseText;
            if (x == '1') {
                window.location.href = 'user_documents.php';

            }


        }

    };
    xmlhttp.open("GET", "document_approve.php?id=" + user_id + "&status=" + status + "&message=" + message, true);
    xmlhttp.send();

}

function set_id(id) {
    user_id = id;
}

function view_user_documents1(id, visa_value) {
    var xmlhttp = new XMLHttpRequest();


    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var x = this.responseText;
            if (x == 'No Entries Yet!!') {

                document.getElementById("sp2").innerHTML = this.responseText;

            }

            else {
                var obj = JSON.parse(x);
                var table = "<table class='table table-bordered table-responsive' ui-jq='footable'>";
                table = table + "<tbody>";
                table = table + "<thead>";
                table = table + "<tr>";
                table = table + "<th>Sr.no</th>";
                table = table + "<th>Email-id</th>";
                table = table + "<th>Document Name</th>";
                table = table + "<th>Uploaded File</th>";
                table = table + "<th>Download</th>";
                table = table + "<th colspan='2'>Status</th>";
                table = table + "</tr>";
                table = table + "</thead>";
                var status;
                for (var i = 0; i < obj.length; i++) {
                    var ar = obj[i];
                    table = table + "<tr>";
                    table = table + "<td>" + (i + 1) + "</td>";
                    table = table + "<td>" + ar['email'] + "</td>";
                    table = table + "<td>" + ar["document_name"] + "</td>";
                    table = table + "<td ><a href='" + ar["document_file"] + "' target='_blank'>View</a> </td>";
                    table = table + "<td><a href='" + ar['document_file'] + "' download><span class='btn btn-primary'>Download</span> </a></td>";
                    if (ar['document_status'] == '-1') {

                        table = table + "<td><a href='document_approve.php?id=" + ar['id'] + "&status=1'>Approve </a></td>";
                        table = table + "<td><a href='' onclick='set_id(" + ar['id'] + ")' data-toggle=\"modal\" data-target=\"#myModal\" >Reject </a></td>";
                        table = table + "</tr>";
                    }

                    else if (ar['document_status'] == '1') {
                        table = table + "<td><h5>Approved  </h5></td>";
                    }
                    else if (ar['document_status'] == '0') {
                        table = table + "<td><h5>Rejected  </h5></td>";
                    }

                }
                table = table + "</tbody>";
                table = table + "</table>";
                document.getElementById("sp2").innerHTML = table;
            }
        }
        else {
            document.getElementById("sp2").innerHTML = "Loading...";
        }

    };
    xmlhttp.open("GET", "user_view_document_logic1.php?data=" + id + "&data1=" + visa_value, true);
    xmlhttp.send();

}


function add_customer() {
    if ($("#add_customer_form").valid()) {
        var formdata = new FormData();
        var controls = document.getElementById('add_customer_form').elements;
        for (var i = 0; i < controls.length; i++) {
            if (controls[i].type === "file") {
                if (controls[i].files.length > 0) {
                    formdata.append(controls[i].name, controls[i].files[0]);
                }
            }
            else {
                formdata.append(controls[i].name, controls[i].value);
            }
        }

        var xmlhttp;

        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {

            if (this.status == 200 && this.readyState == 4) {
                document.getElementById("sp1").innerHTML = this.responseText;
                if (this.responseText == 'Customer Added Successfully') {
                    window.location.href = "view_customers.php";
                }
                else {
                    document.getElementById("sp1").innerHTML = this.responseText;
                }

            }
        };
        xmlhttp.open('POST', 'add_customer_submit.php', true);
        xmlhttp.send(formdata);

    }
}


function send_message() {

    var mobile, email, message, subject;
    email = document.getElementById('email').value;
    message = document.getElementById('message').value;
    subject = document.getElementById('subject').value;
    mobile = document.getElementById('mobile').value;
    if ($('#message_form').valid()) {
        var xmlhttp;

        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {

            if (this.status == 200 && this.readyState == 4) {
                if (this.responseText == '1') {
                    window.location.href = 'text.php';
                }
            }

        };
        var data = "{\"email\":\"" + email + "\",\"message\":\"" + message + "\",\"subject\":\"" + subject + "\",\"mobile\":\"" + mobile + "\"}";

        xmlhttp.open('POST', 'send_message.php?data=' + data, true);
        xmlhttp.send();
    }
}

var search_array;

function search() {

    var search_keyword = document.getElementById('search_value').value;
    var search_by = document.getElementById('search_type').value;
    var xmlhttp;

    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {

        if (this.status == 200 && this.readyState == 4) {
            alert(this.responseText);

            $(function () {

                var availableTags = this.responseText;

                ;
                $("#search_value").autocomplete({
                    source: availableTags
                });
            });


        }

    };
    if (search_keyword == '') {

    }
    else {
        xmlhttp.open('POST', 'search_customer.php?search_keyword=' + search_keyword + "&search_by=" + search_by, true);
        xmlhttp.send();
    }
}

