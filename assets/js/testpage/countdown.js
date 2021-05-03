

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
        testname=document.getElementById("testname").innerText;
        function updatetime(){
            const minutes = Math.floor(time/60);
            let seconds = time%60;
            if (minutes<0){
                clearInterval(count_timer);
                alert("Time is out!");
                // Submit Request
                    testname=document.getElementById("testname").innerText;
                    attempt=document.getElementById("curr-attempt").innerText;
                    user_name=document.getElementById("u_name").value;
                    var request = new XMLHttpRequest();
                    request.open("GET", "./php/testpage/submit_test.php?testname="+testname+"&attempt="+attempt+"&username="+user_name);
                    request.onreadystatechange = function() {
                        if(this.readyState === 4 && this.status === 200) {
                            data=this.responseText;                
                            console.log(data);
                        }

                    };
                    request.send();        
                
                // Submit Request Ends
                setTimeout(() => { window.location.href = 'result.php?testname='+testname+'&attempt='+attempt+'&from_test='+'true'; }, 2000);

                
            }
            seconds = seconds < 10 ? '0' + seconds : seconds;
            countdown.innerHTML = "Min : "+minutes+":"+seconds;
            time--; 

        }
    
    }
});










    

