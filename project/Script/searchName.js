
  function search(str){

    if(str.length==0){
      // make sure that the user wrote something if no return; so no Ajax request is sent 
      // clear the search bar and return
      document.getElementById("content").innerHTML = "";
      return;
    }
    
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
        document.getElementById("content").innerHTML = this.responseText;
      }
    
    }
    xmlhttp.open("GET","search.php?q="+str,true);
    xmlhttp.send();
    }

