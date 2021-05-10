function update_db_ans(quesno, ans){
    var u_name = document.getElementById("u_name").value;
    var request = new XMLHttpRequest();   
    request.open("GET", "./php/testpage/update_db_answer.php?quesno="+quesno+"&answer="+ans);
    request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {            
            data = this.responseText;
            console.log(data);
        }
    };
    request.send();
    submitTest_auto();
}

function uncheck(){
    document.getElementById('radio1').checked = false;
    document.getElementById('radio2').checked = false;
    document.getElementById('radio3').checked = false;
    document.getElementById('radio4').checked = false;

}