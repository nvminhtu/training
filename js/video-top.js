    //Select the #embeddedVideo element
    var video = document.getElementById('embeddedVideo');

    //Create a new Vimeo.Player object
    var player = new Vimeo.Player(video);

    //When the player is ready, set the volume to 0
    player.ready().then(function() {
        player.setVolume(0);
    });