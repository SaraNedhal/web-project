"use strict";
const fcall = function () {
  if (this.readyState == 4 && this.status == 200) {
    document.getElementById("dates-container").innerHTML = this.responseText;
  } else {
    document.getElementById("dates-container").innerHTML = "";
  }
};
function fetchDates(str) {
  let requestXML = new XMLHttpRequest();
  requestXML.onreadystatechange = fcall;
  requestXML.open("GET", "bookDate.php?d=" + str, true);
  requestXML.send();
}
