
function get_curr_ques(){
    var curr_question = document.getElementsByClassName("active-ques");
    var curr_question_id = curr_question[0].id;  
    return curr_question_id;
}

function load_question(ques_no,pane=false){
    if(pane==true){
        var curr_question = document.getElementsByClassName("active-ques");
        var curr_question_id = curr_question[0].id; 
        document.getElementById(curr_question_id).classList.remove("active-ques");
    }
    upcoming_active_ques = document.getElementById("question-indicator"+ques_no);
    upcoming_active_ques.classList.add("active-ques");
    var request = new XMLHttpRequest();
    var testname= document.getElementById('testname').innerText;  
    request.open("GET", "./php/testpage/next_pre_button.php?name="+testname+"&quesno="+ques_no);
    request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            document.getElementById("question-div").innerHTML = this.responseText;            
            if(ques_no == document.getElementById("total-ques").innerText){
                document.getElementById("next_question_button").classList.add("visibility-no");
        
            }
        }
    }
    request.send();



};

function previous_question() {
    var curr_question_id = get_curr_ques();
    curr_question =  document.getElementById(curr_question_id).innerText;
    document.getElementById(curr_question_id).classList.remove("active-ques");
    curr_question--;
    var toFind = curr_question;
    load_question(toFind);
}


function next_question(){
    var curr_question_id = get_curr_ques();       
    curr_question =  document.getElementById(curr_question_id).innerText;
    if(curr_question != document.getElementById("total-ques").innerText){
        document.getElementById(curr_question_id).classList.remove("active-ques");     
        curr_question++;
        var toFind = curr_question;
        load_question(toFind);
    }
}