function indi_timer(){
    time_taken = $("#time_taken_sec");
var timer_ind=1;mint_ind=0;
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
