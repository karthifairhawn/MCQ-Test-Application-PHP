function render_ques_ans(){
    var request = new XMLHttpRequest();
    testname =document.getElementById("test-name").innerText;
    attempt =document.getElementById("attempt").innerText;
    request.open("GET", "./php/omr/render_que_ans.php?testname="+testname+"&attempt="+attempt);
    request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            data=this.responseText;   
            document.getElementById("question-div").innerHTML = data;
        }

    };        
    request.send();  
}