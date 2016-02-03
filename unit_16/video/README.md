# 21v-js

## video

```
    <style>
      body {
        background: black;
        color:#CCCCCC; 
      }
      #c2 {
        background-image: url(foo.png);
        background-repeat: no-repeat;
      }
      div {
        float: left;
        border :1px solid #444444;
        padding:10px;
        margin: 10px;
        background:#3B3B3B;
      }
    </style>
    <script type="text/javascript;version=1.8" src="main.js"></script>
  </head>

  <body onload="processor.doLoad()">
    <div>
      <video id="video" src="video.mp4" controls="true"/>
    </div>
    <div>
      <canvas id="c1" width="160" height="96"/>
      <canvas id="c2" width="160" height="96"/>
    </div>

```

main.js
```
let processor = {
  timerCallback: function() {
    if (this.video.paused || this.video.ended) {
      return;
    }
    this.computeFrame();
    let self = this;
    setTimeout(function () {
        self.timerCallback();
      }, 0);
  },

  doLoad: function() {
    this.video = document.getElementById("video");
    this.c1 = document.getElementById("c1");
    this.ctx1 = this.c1.getContext("2d");
    this.c2 = document.getElementById("c2");
    this.ctx2 = this.c2.getContext("2d");
    let self = this;
    this.video.addEventListener("play", function() {
        self.width = self.video.videoWidth / 2;
        self.height = self.video.videoHeight / 2;
        self.timerCallback();
      }, false);
  },

  computeFrame: function() {
    this.ctx1.drawImage(this.video, 0, 0, this.width, this.height);
    let frame = this.ctx1.getImageData(0, 0, this.width, this.height);
        let l = frame.data.length / 4;

    for (let i = 0; i < l; i++) {
      let r = frame.data[i * 4 + 0];
      let g = frame.data[i * 4 + 1];
      let b = frame.data[i * 4 + 2];
      if (g > 100 && r > 100 && b < 43)
        frame.data[i * 4 + 3] = 0;
    }
    this.ctx2.putImageData(frame, 0, 0);
    return;
  }
};
```


svg video rotozoom
------------------
```

    <style type="text/css">
      * { color: #8080f0; }
      body { background-color: #000000; margin: 0px; overflow: hidden; }
      #info { position: absolute; width: 100%; padding: 5px; font-family:Monospace; font-size:13px; text-align:center; }
    </style>
  </head>
  <body>

    <div id="info"><a href="https://www.youtube.com/watch?v=XjhTHQhJLxs" target="_blank"> Bryan Ferry - Don't Stop The Dance </a></div>
    <div id="container"></div>
    <div id="media">
      <audio id="audio" preload="auto" oncanplaythrough="startIfReady()">
        
        <source src="audio.mp3" type="audio/mpeg"/>
      </audio>
      <video id="video" width="480" height="320" preload="auto" style="visibility:hidden" oncanplaythrough="startIfReady()">
        <source src="video.webm" type="video/webm"/>
        <source src="video.mp4" type="video/mp4"/>
        <source src="video.ogv" type="video/ogg"/>
        
      </video>
      <canvas id="canvas" width="480" height="320"/>
    </div>

    <script type="text/javascript">
      var SVGNS = "http://www.w3.org/2000/svg";
      var HTMLNS = "http://www.w3.org/1999/xhtml";
      var SCREEN_WIDTH = window.innerWidth;
      var SCREEN_HEIGHT = window.innerHeight;
      var SCREEN_WIDTH_HALF = SCREEN_WIDTH / 2;
      var SCREEN_HEIGHT_HALF = SCREEN_HEIGHT / 2;
      var timer;
      var container, svg, texturePattern, textureImage;
      var scale = 1;
      var tx = 0;
      var ty = 0;
      var rotate = 0;
      var canvas = null;
      var ctx = null;
      var video = null;
      var svgvideo = null;
      var audio = null;
      var readyState = 0;
      var offset = 0;

      init();

      function init()
      {
        try 
        {
          canvas = document.getElementById("canvas");
          ctx = canvas.getContext("2d");
        }
        catch(e) 
        {
          alert("This browser doesn't support the html5 canvas element.");
        }
        
        container = document.getElementById('container');
        video = document.getElementById('video');
        audio = document.getElementById('audio');
        svg = document.createElementNS(SVGNS, 'svg');
        svg.setAttribute('width', SCREEN_WIDTH);
        svg.setAttribute('height', SCREEN_HEIGHT);

        var defs = document.createElementNS(SVGNS, 'defs');
        svg.appendChild(defs);

        texturePattern = document.createElementNS(SVGNS, 'pattern');
        texturePattern.setAttribute('id', 'texture');
        texturePattern.setAttribute('patternUnits', 'userSpaceOnUse');
        texturePattern.setAttribute('width', 270);
        texturePattern.setAttribute('height', 270);
        defs.appendChild(texturePattern);
        
        var hasvideo = !!video.canPlayType;
        if(hasvideo)
        {
          // hasvideo = video.canPlayType('video/ogg; codecs="theora, vorbis"');
          hasvideo = video.canPlayType('video/mp4; codecs="avc1.42E01E, mp4a.40.2"');
          
        }
        
        var texture = document.createElementNS(SVGNS, 'image');
        texture.setAttribute('id', 'textureImage');
        texture.setAttribute('width', 270);
        texture.setAttribute('height', 270);
        texture.setAttribute('preserveAspectRatio', 'none');
        texture.setAttribute('crossOrigin', 'anonymous');
        texture.setAttributeNS('http://www.w3.org/1999/xlink', 'href', '1.png');
        textureImage = texture;
        
        if (hasvideo)
        {
          var local_svgvideo = document.createElementNS(SVGNS, 'video');
          // check for native svg video support
          if(local_svgvideo.beginElement)
          {
            local_svgvideo.setAttribute('width', 270);
            local_svgvideo.setAttribute('height', 270);
            local_svgvideo.setAttribute('preserveAspectRatio', 'none');
            local_svgvideo.setAttributeNS('http://www.w3.org/1999/xlink', 'href', 'video.mp4');
            local_svgvideo.setAttribute('onbegin', 'document.getElementById("audio").play(); setInterval(loop, 1000/60);');
            local_svgvideo.setAttribute('onend', 'this.parentNode.appendChild(textureImage); this.parentNode.removeChild(this);');
            offset = -(new Date().getTime()) - 8000;
            svgvideo = texturePattern.appendChild(local_svgvideo);
          }
          else
          {
            texturePattern.appendChild(texture);
          }
        }
        
        var rect = document.createElementNS(SVGNS, 'rect');
        rect.setAttribute('width', SCREEN_WIDTH);
        rect.setAttribute('height', SCREEN_HEIGHT);
        rect.setAttribute('style', 'fill:url(#texture)');
        svg.appendChild(rect);

        container.appendChild(svg);
        startIfReady();
      }
      
      function startIfReady(e)
      {
          if (++readyState == 3)
          {
            if (!svgvideo)
            {
              setInterval(updateVideoFrame, 8); 
              audio.play();
                video.play();        
                setInterval(loop, 1000/60);
            }
          }
      }
      
      function loop()
      {
        timer = new Date().getTime() + offset;

        tx = SCREEN_WIDTH_HALF + Math.sin(timer * 0.0001) * 256;
        ty = SCREEN_HEIGHT_HALF + Math.cos(timer * 0.0002) * 256;
        scale = (Math.sin(timer * 0.0002) + 1.1) * 2;
        rotate = Math.cos(timer * 0.0001) * 360;
        
        texturePattern.setAttribute('patternTransform', 'translate(' + tx + ', ' + ty + ') scale(' + scale + ') rotate( ' + rotate + ')');
      }
      
      function updateVideoFrame()
      {
        ctx.drawImage(video,0,0,480,320);
        
      }      
    </script>

```