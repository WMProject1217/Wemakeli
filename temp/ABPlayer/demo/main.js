var $_ = function(e){return document.getElementById(e);};
window.addEventListener("load",function(){
  $_("click-load").addEventListener("click", function(e){
    if(e && e.preventDefault)
      e.preventDefault();
    var inst = ABP.create(document.getElementById("load-player"), {
      "src":{
        "playlist":[
          {
            "video":document.getElementById("video-1"),
            "comments":"./assets/569096.xml"
          }
        ]
      },
      "width":800,
      "height":522
    });
    $_("click-load").style.display= "none";
  });
});