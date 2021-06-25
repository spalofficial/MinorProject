function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    var d = today.getDate();
    var mm = today.getMonth()+1;
    var y = today.getFullYear();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML = "SERVER DATE : " + " " + d + "/" + mm + "/"+ y + ", SERVER TIME : " + h + ":" + m + ":" + s +"(IST)";
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i}; 
    return i;
}	

