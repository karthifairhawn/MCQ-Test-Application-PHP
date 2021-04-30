function updateTests() {
    var request = new XMLHttpRequest();
    request.open("GET", "./php/testlist/update-test-list.php");
    request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            document.getElementById("table").innerHTML = this.responseText;
        }
    };
    request.send();
}