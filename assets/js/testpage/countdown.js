

document.addEventListener("DOMContentLoaded", function(){


    var request = new XMLHttpRequest();
    var testname= document.getElementById('testname').innerText;    
    request.open("GET", "./php/testpage/update_time.php?name="+testname);
    request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            
            var sm = parseInt(this.responseText);
            window.startminutes=sm/60;
            updatetime();
        }
    };
    request.send();
    
    function updatetime(){
        let time = startminutes*60;

        const countdown = document.getElementById("countdown_r");

        count_timer = setInterval(updatetime, 1000);
        testname=document.getElementById("testname").innerText;
        function updatetime(){
            const minutes = Math.floor(time/60);
            let seconds = time%60;
            
            // Update time req starts
            var time_request = new XMLHttpRequest();
            
                    let rem_seconds=minutes*60;
                    rem_seconds=rem_seconds+seconds;
                    time_request.open("GET", "./php/testpage/update_cd.php?time="+rem_seconds);
                    time_request.onreadystatechange = function() {
                        if(this.readyState === 4 && this.status === 200) {
                            data=this.responseText;      
                            
                        }

                    };
            time_request.send(); 
            
            
            // Update time req
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
                document.getElementById("wrapper").style.display = "none";
                setTimeout(() => { window.location.href = 'result.php?testname='+testname+'&attempt='+attempt+'&from_test='+'true'; }, 2000);

                
            }
            seconds = seconds < 10 ? '0' + seconds : seconds;
            countdown.innerHTML = minutes+" : "+seconds;
            time--; 

        }
    
    }
});










    

