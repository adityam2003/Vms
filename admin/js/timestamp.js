 //get new date from timestamp in data-start attr
 var freshTime = new Date(parseInt($("#current-time-now").attr("data-start"))*1000);
 //loop to tick clock every second
 var func = function myFunc() {
     //set text of clock to show current time
     $("#current-time-now").text(freshTime.toLocaleTimeString());
     //add a second to freshtime var
     freshTime.setSeconds(freshTime.getSeconds() + 1);
     //wait for 1 second and go again
     setTimeout(myFunc, 1000);
 };
 func();