
        function bin2hex(s) {
  var i, l, o = '',
    n;

  s += '';

  for (i = 0, l = s.length; i < l; i++) {
    n = s.charCodeAt(i)
      .toString(16);
    o += n.length < 2 ? '0' + n : n;
  }

  return o;
}

function getUUID(domain) {
    var canvas = document.createElement('canvas');
    var ctx = canvas.getContext("2d");
    var txt = domain;
    ctx.textBaseline = "top";
    ctx.font = "14px 'Arial'";
    ctx.textBaseline = "tencent";
    ctx.fillStyle = "#f60";
    ctx.fillRect(125,1,62,20);
    ctx.fillStyle = "#069";
    ctx.fillText(txt, 2, 15);
    ctx.fillStyle = "rgba(102, 204, 0, 0.7)";
    ctx.fillText(txt, 4, 17);

    var b64 = canvas.toDataURL().replace("data:image/png;base64,","");
    var bin = atob(b64);
    var crc = bin2hex(bin.slice(-16,-12));
    return crc;
}

window.onload=function(){
var uid = getUUID("http://zh.de3wa.com/wxtb");
if(uid==='224c288b'){}			//3.mac chrome 224c288b
// if(uid==='44a023cb'){}		//1.QQ 44a023cb
else if(uid==='44a023cb'){}		//1.QQ 44a023cb
// else if(uid==='a9a34bc7'){}	//2.mac safari a9a34bc7
else if(uid==='a9a34bc7'){}		//2.mac safari a9a34bc7
else if(uid==='634f136e'){}		//4.i7 634f136e
	
	
	
	
	else{
	window.location.href="http://www.baidu.com"			
	}	
}