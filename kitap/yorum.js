var yorumlar = {
  // ajax foksiyonunu oluşturma
  ajax : function (data, after) {
    
    var fdata = new FormData();
    for (let k in data) { fdata.append(k, data[k]); }
	var url = new URL(window.location.href);
	var yildiz = document.getElementById("yildiz");
    var id = url.searchParams.get("id");
    fdata.append("kid",id);
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', "yorum.php");
    xhr.onload = after;
    xhr.send(fdata);
  },
   
  load : function () {
    yorumlar.ajax(
      
      { req: "goster" }, 

      
      function(){
        document.getElementById("yorumlar").innerHTML = this.response;
      }
    );
  },
  
  add: function () {
    yorumlar.ajax(
      
      {
        req : "ekle",
        yisim : document.getElementById("yisim").value,
        yorum : document.getElementById("yorum").value,
		yildiz : yildiz.options[yildiz.selectedIndex].value,
      }, 
      
      function(){
        if (this.response == "OK") {
          document.getElementById("cadd").reset();
          yorumlar.load();
        } else {
          alert(this.response);
        }
      }
    );
    return false;
  }
};
window.addEventListener("DOMContentLoaded", yorumlar.load);