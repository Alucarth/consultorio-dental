/*
  Compendio de clases Helper para el desarrollo del sistema 
*/
class DibujarDiente
{
    constructor(canvas)
    {
       
    var context = canvas.getContext("2d");
    var image = new Image();
    var image1 = new Image();
    var image2 = new Image();
    var image3 = new Image();
    var image4 = new Image();


        image.onload = function() {
          context.drawImage(image, 0, 0);
          context.drawImage(image1, 0, 0);
          context.drawImage(image2,0+21,0);
          context.drawImage(image3,0,0+22);
          context.drawImage(image4,0,0);
        };

        // image.src = '{{asset("images/pieza/5.png")}}';
        // image1.src = '{{asset("images/pieza/4.png")}}';
        // image2.src = '{{asset("images/pieza/3.png")}}';
        // image3.src = '{{asset("images/pieza/2.png")}}';
        // image4.src = '{{asset("images/pieza/1.png")}}';

        image.src = '../images/pieza/5.png';
        image1.src = '../images/pieza/4.png';
        image2.src = '../images/pieza/3.png';
        image3.src = '../images/pieza/2.png';
        image4.src = '../images/pieza/1.png';
    }
}

class DibujarDienteRojo
{
    constructor(canvas,diente)
    {
    
    console.log(diente);

    var context = canvas.getContext("2d");
    var image = new Image();
    var image1 = new Image();
    var image2 = new Image();
    var image3 = new Image();
    var image4 = new Image();


        image.onload = function() {
          context.drawImage(image, 0, 0);
          context.drawImage(image1, 0, 0);
          context.drawImage(image2,0+21,0);
          context.drawImage(image3,0,0+22);
          context.drawImage(image4,0,0);
        };

        // image.src = '{{asset("images/pieza/5.png")}}';
        // image1.src = '{{asset("images/pieza/4.png")}}';
        // image2.src = '{{asset("images/pieza/3.png")}}';
        // image3.src = '{{asset("images/pieza/2.png")}}';
        // image4.src = '{{asset("images/pieza/1.png")}}';
        switch(diente['oclusal'])
        {
          
          case "1":  image.src = '../images/pieza/5r.png';
                break;
          default: image.src = '../images/pieza/5.png';
               break;
        }


        switch(diente['vestibular'])
        {
          case "0":  image1.src = '../images/pieza/4.png';
                break;
          case "1":  image1.src = '../images/pieza/4r.png';
                break;
        }
        
       
        switch(diente['distal'])
        {
          case "0":  image2.src = '../images/pieza/3.png';
                break;
          case "1":  image2.src = '../images/pieza/3r.png';
                break;
        }
        switch(diente['palatino'])
        {
          case "0": image3.src = '../images/pieza/2.png';
                break;
          case "1":  image3.src = '../images/pieza/2r.png';
                break;
        }
        switch(diente['mesial'])
        {
          case "0":  image4.src = '../images/pieza/1.png';
                break;
          case "1":  image4.src = '../images/pieza/1r.png';
                break;
        }
        // image.src = '../images/pieza/5.png';
        // image1.src = '../images/pieza/4.png';
        // image2.src = '../images/pieza/3.png';
        // image3.src = '../images/pieza/2.png';
        // image4.src = '../images/pieza/1.png';
    }
}


