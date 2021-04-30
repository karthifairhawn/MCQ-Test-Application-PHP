function update_db_ans(quesno, ans){
    var u_name = document.getElementById("u_name").value;
    var request = new XMLHttpRequest();   
    request.open("GET", "./php/testpage/update_db_answer.php?quesno="+quesno+"&answer="+ans);
    request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            console.log(this.responseText);
            
        }
    };
    request.send();
}