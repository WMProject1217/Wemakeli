//Automatic Execute
console.log(`WMUI Version 0.8.7 Build 311`);
var bottombaruserlsn;
var debugval;
bottombaruserlsn = 0;
debugval = 1;
document.getElementById("bottombar").style.display="block";
document.getElementById("bottombaruserls").style.display="none";
//WMUI
function showbottombar(){
    document.getElementById("bottombar").style.display="block";
    if (debugval==1) {
    console.log(`Debug : function showbottombar()`);
    }
}
function hidebottombar(){
    document.getElementById("bottombar").style.display="none";
    if (debugval==1) {
    console.log(`Debug : function hidebottombar()`);
    }
}
function bottombaruserls() {
    if (bottombaruserlsn==0) {
    bottombaruserlsn = 1;
    document.getElementById("bottombaruserls").style.display="block";
    if (debugval==1) {
    console.log(`Debug : function bottombaruserls() show`);
    }
    } else {
    bottombaruserlsn = 0;
    document.getElementById("bottombaruserls").style.display="none"; 
    if (debugval==1) {
    console.log(`Debug : function bottombaruserls() hide`);
    }
    }
}
//MainPage
//Platform
