function submitTest_auto() {
    setTimeout(() => { 
        testname=document.getElementById("testname").innerText;

        // Submit Request
        testname=document.getElementById("testname").innerText;
        attempt=document.getElementById("curr-attempt").innerText;
        user_name=document.getElementById("u_name").value;
        var request = new XMLHttpRequest();
        request.open("GET", "./php/prac_testpage/submit_test.php?testname="+testname+"&attempt="+attempt+"&username="+user_name);
        request.onreadystatechange = function() {
            if(this.readyState === 4 && this.status === 200) {
                data=this.responseText;                
            }

        };
        request.send();  
    // Submit Request Ends
}, 2000);  
}

function submitTest() {
    
    
    if(confirm('Are you sure you want to submit ?')){
        testname=document.getElementById("testname").innerText;

        // Submit Request
        testname=document.getElementById("testname").innerText;
        attempt=document.getElementById("curr-attempt").innerText;
        user_name=document.getElementById("u_name").value;
        var request = new XMLHttpRequest();
        request.open("GET", "./php/prac_testpage/submit_test.php?testname="+testname+"&attempt="+attempt+"&username="+user_name);
        request.onreadystatechange = function() {
            if(this.readyState === 4 && this.status === 200) {
                data=this.responseText;                
            }

        };

        
        document.getElementById("wrapper").style.display = "none";
        
        request.send();  

        var myDiv = document.createElement("div");
        

        myDiv.id = 'processing';
        
        //Add your content to the DIV
        myDiv.innerHTML = "<h1>Processing!</h1>";

        document.body.appendChild(myDiv);
        setTimeout(() => { window.location.href = 'prac_result.php?testname='+testname+'&attempt='+attempt+'&from_test='+'true'; }, 3000);      
        

    }
    // Submit Request Ends


}


