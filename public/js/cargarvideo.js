(function() {

    const CONTAINER = document.querySelector('#video-container');

    document.querySelector('#video').addEventListener('change', function(e) {
        CONTAINER.innerHTML = Video( this.value );
    });

    function Video(uri) {
      return '<iframe class="embed-responsive-item" src="'+uri+'" frameborder="0" allowfullscreen></iframe>'
    }
})()
