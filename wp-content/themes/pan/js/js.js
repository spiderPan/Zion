var $ = function(id){
	var doc = document;
	return doc.getElementById(id);
}


//Here is just for San page, init() is for getting the audio list, and sanPlay() is responsing the button click---12-25 version
function init(){
		//var fso = new ActiveXObject("Scripting.FileSystemObject");
}

function sanPlay(e){
	var sanP = $("sanPlayer");
	sanP.pause();
	sanP.innerHTML = "<source src='audio/0"+ e +".MP3' type='audio/mpeg'>";
	sanP.load();
	var sanInfo = $("audioInfo");
	sanInfo.innerHTML = e;
	sanP.play();
}
//the End of it
function switchVideo(e){
	var p = $("myPlayer");
	var info = $("videoInfo");
	var linkInfo = info.innerHTML;
	var targetAlt = e.children[0].alt;
	var targetSrc = e.children[0].src;
	switch(targetAlt.slice(-1))
	{
		case"5":
		info.innerHTML = "Demo Reel";
		break;
		
		default:
		info.innerHTML = targetAlt;
    }
	var tar = "movie" + targetAlt.slice(-1);
	var imgIn = p.poster.substr(p.poster.indexOf("/v")+2,1);
	
	e.innerHTML = "<img src='"+p.poster+"' alt='Video"+imgIn+"'>";
	e.parentElement.children[1].innerHTML = "<p class='cen'>"+linkInfo+"</p>";
	p.poster = targetSrc;
	p.innerHTML = "<source src='video/"+tar+".webm' type='video/webm'>"+
				"<source src='video/"+tar+".ogg' type='video/ogg'>"+
				"<source src='video/"+tar+".mp4' type='video/mp4'>"+
				"<object width='100%' height='100%'> <param name='video' value='http://fpdownload.adobe.com/strobe/FlashMediaPlayback.swf'></param><param name='flashvars' value='src=http://panbanglanfeng.dyndns.org/video/" + tar + ".mp4'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://fpdownload.adobe.com/strobe/FlashMediaPlayback.swf' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='100%' height='100%' flashvars='src=http://panbanglanfeng.dyndns.org/video/" + tar + ".mp4'></embed></object>";
				
	p.load();
}

function about(){
	var c = $("myCanvas");
	var ctx = c.getContext("2d");
	ctx.arc(c.width/2,c.height/2,Math.floor(c.height/2),0*Math.PI,2*Math.PI);
	ctx.fillStyle = "black";
	ctx.fill();
	ctx.beginPath();
	ctx.moveTo(c.width/2,0);
	ctx.lineTo(c.width/2,c.height/2);
	ctx.lineTo(260,260);
	ctx.strokeStyle = "white";
	ctx.stroke();
	ctx.beginPath();
	ctx.font = 'italic 2em Palatino Linotype';
	ctx.fillStyle = "white";
	ctx.fillText("Coder",40,190);
	ctx.fillText("Designer",160,120);
}

function vidLabel(e){
	
	var labels = document.querySelectorAll(".La");
	for(i in labels){
		labels[i].className = "La hid";
		TweenMax.to(labels[i],.1,{css:{top:40}, ease:Quad.easeInOut});
	}
	var tar = e.children[1];
	tar.className = "La";

	TweenMax.to(tar,.3,{css:{top:-40}, ease:Quad.easeInOut});
	
}