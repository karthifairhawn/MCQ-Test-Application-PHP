function indi_timer(){
    time_taken = $("#time_taken_sec");
    var timer_ind=1;mint_ind=0;total_seconds_tk=0;
    clearTimeout(window.timer_ind);

    window.timer_ind = setInterval(function(){
    if(mint_ind==0 && timer_ind<10){
        time_taken.text('0'+timer_ind);
    }else if(mint_ind==0){
        time_taken.text(timer_ind);
    }else if(timer_ind<10){
        timer_ind_al = mint_ind+' : 0'+timer_ind;
        time_taken.text(timer_ind_al);
    }else{
        timer_ind_al = mint_ind+' : '+timer_ind;
        time_taken.text(timer_ind_al);
    }
    if(timer_ind==60){
        mint_ind++;
        timer_ind=0;
    }
    timer_ind++;
    total_seconds_tk++;
    var tt_request = new XMLHttpRequest();   
    ques_no = document.getElementsByClassName("active-ques")[0].innerText;
    tt_request.open("GET", "./php/testpage/time_taken.php?tt="+total_seconds_tk+"&ques_no="+ques_no);
    tt_request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {            
            data = this.responseText;
            console.log(data);
        }
    };
    tt_request.send();
    if(timer_ind<10 && mint_ind<1){
        $("#time-taken").addClass("time-taken-green");
        $("#time-taken").removeClass("time-taken-orange");
        $("#time-taken").removeClass("time-taken-red");

    }
    if(timer_ind>10 && timer_ind<20){
        $("#time-taken").removeClass("time-taken-green");
        $("#time-taken").addClass("time-taken-orange");
    }
    if(timer_ind>20){
        $("#time-taken").removeClass("time-taken-orange");
        $("#time-taken").addClass("time-taken-red");
    }
},1000);

}
