(function() {

    const CONTAINER = document.querySelector('#video-container');

    document.querySelector('#video').addEventListener('input', function(e) {
        // https://www.youtube.com/watch?v=lmvUFhjZdFc
        // https://www.youtube.com/embed/lmvUFhjZdFc
        if (this.value != "") {
            let uri = this.value.split('?v=');
            var embed = "";

            if (uri[0] == "https://www.youtube.com/watch") {
                embed = "https://www.youtube.com/embed/" + uri[1];
            } else {
                embed = uri[0];
            }
            console.log(embed)

            CONTAINER.innerHTML = Video( embed );
        }
    });

    function Video(uri) {
      return '<iframe class="embed-responsive-item" src="'+uri+'" frameborder="0" allowfullscreen></iframe>'
    }
})()
