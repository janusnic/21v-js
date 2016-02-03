

      window.onload = function()
       {
          canvasApp();
       }

        function canvasApp() {
           drawScreen();


           function drawScreen() {

             var theCanvas = document.getElementById("canvasOne");
             if (!theCanvas || !theCanvas.getContext) {
                   console.log('Hello Canvas One!');
                }
             

           }

        }