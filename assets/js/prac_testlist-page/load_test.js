function viewAnswer(value){
    
if (confirm('After revealing answers attempt is not allowed.')) {

console.log(value);
    window.location.replace("https://prashnottar.in/Dashboard/"+value);

} 

}




var sub="unselected";



$(document).on('change','#test_to_get',function(){
        window.sub = $("#test_to_get option:selected").text();
        updateTests(sub);
        
          });




function updateTests() {
    var request = new XMLHttpRequest();
    request.open("GET", "./php/prac_testlist/update-test-list.php?sub="+sub);
    request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            document.getElementById("table").innerHTML = this.responseText;
        }
    };
    request.send();
}


window.onfocus = function() {
    updateTests();
};


window.onfocusout = function() {
    updateTests();
};

