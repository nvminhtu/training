
$(document).ready(function(){
 "use strict";
	$("#slider_idex01").bxSlider({
	  mode: 'horizontal',
	  useCSS: false,
	  speed: 800,
	   video: true
	 
	});

});




var tag = document.createElement('script');

tag.src = "//www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('ytplayer', {
        events: {
            'onReady': onPlayerReady
        }
    });
}

function onPlayerReady() {
    player.playVideo();
    // Mute!
    player.mute();
}
	




