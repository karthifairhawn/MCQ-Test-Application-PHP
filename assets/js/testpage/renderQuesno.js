function load_question_1(){
    var indicator = document.getElementById("question-indicator1");
    var request = new XMLHttpRequest();
    var testname= document.getElementById('testname').innerText;    
    attempt =document.getElementById("curr-attempt").innerText;
    request.open("GET", "./php/testpage/load_question_1.php?name="+testname+"&attempt="+attempt);
    request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            document.getElementById("question-div").innerHTML = this.responseText;        
                 indicator.classList.add("active-ques");
                 $('#question-indicator1').trigger("click");
                
        }
    };
    request.send();
    submitTest_auto();
}

function renderQuesNo() {
    var request = new XMLHttpRequest();
    var testname= document.getElementById('testname').innerText;    
    request.open("GET", "./php/testpage/update-quesno.php?name="+testname);
    request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            document.getElementById("question-container").innerHTML = this.responseText;
            load_question_1();
        }
    };
    request.send();
}