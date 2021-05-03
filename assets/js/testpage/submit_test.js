function submitTest() {
    if(confirm('Are you sure you want to submit ?')){
        testname=document.getElementById("testname").innerText;

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
        setTimeout(() => { window.location.href = 'result.php?testname='+testname+'&attempt='+attempt+'&from_test='+'true'; }, 3000);      
        

    }
    // Submit Request Ends

}