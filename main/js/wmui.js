//Automatic Execute
console.log(`WMUI Version 0.8.6 Build 254`);
var bottombaruserlsn;
bottombaruserlsn = 0;
document.getElementById("bottombaruserls").style.display="none";
//WMUI
function bottombaruserls() {
    if (bottombaruserlsn==0) {
    bottombaruserlsn = 1;
    document.getElementById("bottombaruserls").style.display="block";
    } else {
    bottombaruserlsn = 0;
    document.getElementById("bottombaruserls").style.display="none"; 
    }
}
//MainPage
//Platform
