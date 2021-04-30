

document.addEventListener("DOMContentLoaded", function(){
    var request = new XMLHttpRequest();
    var testname= document.getElementById('testname').innerText;    
    request.open("GET", "./php/testpage/update_time.php?name="+testname);
    request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            startminutes=this.responseText;
            updatetime();
        }
    };
    request.send();
    
    function updatetime(){
        let time = startminutes*60;

        const countdown = document.getElementById("countdown");

        count_timer = setInterval(updatetime, 1000);

        function updatetime(){
            const minutes = Math.floor(time/60);
            let seconds = time%60;
            if (minutes<0){
                clearInterval(count_timer);
                alert("Time is out!");
                window.location.href = 'index.php';
            }
            seconds = seconds < 10 ? '0' + seconds : seconds;
            countdown.innerHTML = "Min : "+minutes+":"+seconds;
            time--; 

        }
    
    }
});










    

