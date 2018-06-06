
function view_user_documents() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var x = this.responseText;
            var obj = JSON.parse(x);
            var table = "<table class='table table-bordered'>";
            table = table + "<tr>";
            table = table + "<th>S.NO</th>";
            table = table + "<th>Document Name</th>";
            table = table + "<th>Sample File</th>";
            table = table + "<th>Download</th>";
            table = table + "</tr>";
            for (var i = 0; i < obj.length; i++) {
                var ar = obj[i];
                table = table + "<tr>";
                table = table + "<td>" + (i+1) + "</td>";
                table = table + "<td>" + ar["document_name"] + "</td>";
                table = table + "<td>" + ar["document_file"] + "</td>";
                //table = table + "<td><a href='download.php' download='"+ar['document_file']+"'>download</a></td>";
                table=table+"<td><a href='"+ar['document_file']+"' download><span class='btn btn-primary'>Download</span> </a></td>";
                table=table+"<td><a href='document_approve.php?id="+ar['id']+"&status=1'>Approve </a></td>";
                table=table+"<td><a href='document_approve.php?id="+ar['id']+"&status=0'>Reject </a></td>";
                table = table + "</tr>";

            }
            table = table + "</table>";
            document.getElementById("sp2").innerHTML = table;
        }
        else {
            document.getElementById("sp2").innerHTML = "Loading...";
        }
    };
    xmlhttp.open("GET", "user_view_document_logic.php", true);
    xmlhttp.send();


}