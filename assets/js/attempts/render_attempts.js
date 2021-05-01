document.addEventListener('DOMContentLoaded', function() {
    render_attempts();
 }, false);
function render_attempts(){
    testname = document.getElementById("test-name").innerText;
    var request = new XMLHttpRequest();
    request.open("GET", "./php/attempts/render_attempts.php?name="+testname);
    request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            data = this.responseText;              
            document.getElementById("table-body").innerHTML = data;
        }
    };
    request.send();
}

