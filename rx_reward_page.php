
<?php

error_reporting (0);
ini_set('display_error', '0'); 


$db = './rx_reward.json';
$db_2 = './ip.json';
$error = '';
$result = [];
$error1 = '';
$result1 = [];
$RX_reward = filter_var($_GET['reaction'], FILTER_SANITIZE_STRING);
$name = filter_var($_GET['name'], FILTER_SANITIZE_STRING);




//code
//code






$rewards = \json_decode(file_get_contents($db), true);
foreach($rewards as $reward) {
    if ($reward['reaction'] === $RX_reward) {
        $result = $reward;
        
    }
   
}


  if(empty($errors)) {


   // if ($_SERVER['REMOTE_ADDR'] !== $users['ip'] ) 

$users = \json_decode(file_get_contents($db_2), true);
$users[] = [
    'ip' => $_SERVER['REMOTE_ADDR'] ,
   
  ];

  file_put_contents($db_2, json_encode($users));
  }





///////// DELETE JSON FILE ///////// 
 
/*
  $file="rx_reward.json";

  unlink($file) */






?><!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <script type='text/javascript' src='https://unpkg.com/qr-code-styling@1.5.0/lib/qr-code-styling.js'></script>
    <title>Results for search: <?php echo $RX_reward ?></title>
  </head>
  <link rel="stylesheet" href="rx_reward_page.css">
   

 


<button class="btn">

  <?php if (!$RX_reward ):
    
    echo '<style>body { 

    width: 100%;
    height: 100vh;
    display: flex;
    flex-wrap: nowrap;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    overflow: hidden;
    background-color: black;
    filter: brightness(1.3);
    color: white;
    font-family: Arial, Times, serif;
}



    </style>' ;  
    echo '<style>.container { display:none;}</style>'   ;
    echo '<style>.canvas1 { display:none;}</style>' ;
    echo '<style>button { display:none;}</style>';




echo '<h4>Errore </h4>';
echo '<style>h4{ 

    background-color: black;
    filter: brightness(1.5);
    
    
}</style>'   ;


     echo '<p>Nessun codice RX Reward inserito</p>';

     echo '<a href="index.php">Indietro</a>'  ;

elseif(empty($result)):

  
    echo '<style>body { 
  
      width: 100%;
      height: 100vh;
      display: flex;
      flex-wrap: nowrap;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      overflow: hidden;
      background-color: black;
      filter: brightness(1.3);
      color: white;
      font-family: Arial, Times, serif;
  }
  
  
  
      </style>' ;  
      echo '<style>.container { display:none;}</style>'   ;
      echo '<style>.canvas1 { display:none;}</style>' ;
      echo '<style>button { display:none;}</style>';
  
  
  
  
  echo '<h4>Errore </h4>';
  echo '<style>h4{ 
  
      background-color: black;
      filter: brightness(1.5);
      
      
  }</style>'   ;
  
  
       echo '<p>Codice RX Reward non valido</p>';
  
       echo '<a href="index.php">Indietro</a>'  ;
  

  
endif;
    ?>




 
  <body>

  <svg width="0" height="0" style="position:absolute;z-index:-1;">
  <defs>
    <filter id="remove-alpha" x="0" y="0" width="100%" height="100%">
      <feComponentTransfer>
        <feFuncA type="discrete" tableValues="0 1"></feFuncA>
      </feComponentTransfer>
      </filter>
  </defs>
</svg>


  
 

  <div class="container">
  <div class="center">
  
  <canvas id="canvas" width="200" height="280"> </canvas> 
  </div>
</div>

<div class="container1">
  <div class="center1">




</div>
</div>


  
    <div class="container">
   
                   
      <div class="row"> <div class="center">


     <!--   <div class="col-sm">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
              <div class="navbar-nav">
                <a class="nav-item nav-link" href="new.php">New user</a>
                <a class="nav-item nav-link active" href="index.php">Search user</a>
              </div>
            </div>
          </nav> -->
<br><br>
          <!--<h3>Results for search: <?php echo $RX_reward ?></h3>

          <?php if ($error): ?>
            <div class="alert alert-danger" role="alert"><?php echo $error ?></div>
          <?php elseif (empty($result)): ?>
            <div class="alert alert-warning" role="alert">No user found with reaction <?php echo $RX_reward ?></div>
          <?php else: ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $result['reaction'] ?> <?php echo $result['description'] ?> <?php echo $result['typegen'] ?> </h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['reaction'] ?></h6><br><br><br>



                    <?php // echo '<img src = "uploads\code.png">' //
                    $myfile = fopen("testfile.txt", "w") ?> 
                     

          -->
          <?php

          $NAME = $result['name'];

          $REACTION =  strtoupper($NAME) ;

         $color = null;
          
                    
         switch ($result['typegen']) {
          case 'Love':
            $color = "hsl(315, 100%, 50%)";
break;
          case 'Night':
$color = "rgba(12, 42, 161, 0.897)";
              break;
          case 'Weed':
             $color = "rgba(108, 255, 9, 0.897)";
              break;
          case 'Psico':
          $color = "rgb(161, 0, 201)";
              break;
          case 'OnFire':
             $color = "rgb(255, 1, 1)";
              break;
              case 'Fresh':
                $color = "rgb(7, 255, 255)";
                 break;
          default:
          $color = "black";
              break;
      }

                                    

          ?>
 

               <!--     <?php $photo= $result['targetFile'];

$NFT= $result['nft'];


               
               ?> 

                    <div class="polaroid">
                    <div class="container">
               <p><?php echo $result['reaction'] ?></p>
  </div>
                   <?php echo " <img id='reaction' src=\"$photo\" width='170px' height='250px'>"?> 
         
          -->
                <br><br><br><br><br><br><br><br>
                  
              
                

      

<?php 
echo "  '<script type='text/JavaScript'>
let canvas = document.getElementById('canvas');
let ctx = canvas.getContext('2d');



/*
let newQRCODE = new Image();
newQRCODE.src = document.getElementById('canvas1');
newQRCODE.onload = () => {
  ctx.filter = 'brightness(110%)';
  ctx.filter = 'contrast(110%)';
    ctx.drawImage(newQRCODE, 0, 35, 200, 250);
}

*/


window.devicePixelRatio=2;     

var size = 280;


canvas.style.width = 200 + 'px';
canvas.style.height = size + 'px';

var scale = window.devicePixelRatio; 
    
canvas.width = Math.floor(200 * scale);
canvas.height = Math.floor(size * scale);

let text = ctx.measureText(\"$REACTION\");
console.log(text.width);


ctx.scale(scale, scale);
ctx.filter = 'brightness(360%)';


if(text.width <= 70  && text.width > 65) {
  ctx.font = '23px georgia';
}

if(text.width <= 75  && text.width > 70) {
  ctx.font = '22.5px georgia';
}

if(text.width <= 80  && text.width > 75) {
  ctx.font = '22px georgia';
}

if(text.width <= 85  && text.width > 80) {
  ctx.font = '20px georgia';
}

if(text.width <= 90  && text.width > 85) {
  ctx.font = '19.5px georgia';
}

if(text.width <= 95  && text.width > 90) {
  ctx.font = '19px georgia';
}

if(text.width < 100  && text.width > 95) {
  ctx.font = '18.5px georgia';
}

if(text.width >= 100 && text.width < 105) {
  ctx.font = '18px georgia';
}

if(text.width >= 105) {
  ctx.font = '17px georgia';
}

ctx.fillStyle = 'rgb(0, 0, 0)';
ctx.fillRect(0,0,200,50)
ctx.fillStyle = \"$color\";

ctx.textAlign = 'center';
ctx.textBaseline = 'middle';

var x = size - 180;
var y = size / 14;




var textString = \"$REACTION\";


ctx.fillText(textString, x, y);





let newImage = new Image();
newImage.src = \"$photo\" 
newImage.onload = () => {
  ctx.filter = 'url(#remove-alpha)';
  ctx.filter = 'brightness(110%)';
  
 
    ctx.drawImage(newImage, 0, 35, 200, 250);
  
    
   var grd = ctx.createLinearGradient(25,57,16,280);
grd.addColorStop(0,'blue');
grd.addColorStop(1,'red');

    ctx.fillStyle = 'black';
    ctx.fillRect(160,240,70, 50)
    ctx.fillStyle = grd;
    ctx.font = '21px times';
    ctx.filter = 'brightness(360%)';
    ctx.fillText('RX', 179, 260);
    ctx.strokeStyle = \"$color\";
ctx.lineWidth='2'; 
ctx.beginPath();
ctx.filter = 'brightness(200%)';
ctx.roundRect(160, 239, 50, 50, [3]);
ctx.stroke();


ctx.filter = 'brightness(200%)';
ctx.fillStyle = \"$color\";
ctx.fillRect(0, 33, 200, 3);


    window.location = canvas.toDataURL('image/png');
   
  


  



   


/*

ctx.stroke();
ctx.font = '23px impact';
ctx.fillStyle = 'rgb(255, 255, 255)';
ctx.textAlign = 'center';  

ctx.fillText(\"$RX_reward\",100, 35);



*/



ctx.strokeStyle = \"$color\";
ctx.lineWidth='7'; 
ctx.beginPath();


ctx.roundRect(0, 0, 200, 280, [9]);
ctx.stroke();


/*EFFECT

let newEffect = new Image();
newEffect.src = 'spark.png'
newEffect.onload = () => {
  ctx.filter = 'brightness(90%)';

    ctx.drawImage(newEffect, 0, 15, 110, 250); }
*/

}


const qrCode = new QRCodeStyling({
  width: 300,
  height: 300,
  type: 'svg',
  data: 'https://www.facebook.com/',
  image: 'https://i.ibb.co/tpRytB9/Picsart-23-06-10-04-01-14-946.png',




  dotsOptions: {
      color: 'black',
      type: 'square'
  },
  backgroundOptions: {
      color: 'white',




  },
  imageOptions: {
      crossOrigin: 'anonymous',
      margin: 1,

  },

  cornersSquareOptions: {
      color: 'hsl(348, 100%, 45%)',
      type: 'extra-rounded'
  },


  cornersDotOptions: {
      color: 'hsl(281, 100%, 39%)',
      type: 'extra-rounded'
  }



});



qrCode.append(document.getElementById('canvas'));
/*  qrCode.download({
    name: 'qr',
    extension: 'png'
}) */



let newQRCODE = new Image();
newQRCODE.src = document.getElementById('canvas1');
newQRCODE.onload = () => {

  ctx.drawImage(newQRCODE, 0, 35, 200, 250);
}




function download_image_png(){
  var canvas = document.getElementById('canvas');
  image = canvas.toDataURL('image/png').replace('image/png', 'image/octet-stream');
  var link = document.createElement('a');
  link.download = '\"$NAME\".png';
  link.href = image;
  link.click();
}


function download_image_svg(){
  var canvas = document.getElementById('canvas');
  image = canvas.toDataURL('image/png').replace('image/png', 'image/octet-stream');
  var link = document.createElement('a');
  link.download = '\"$NAME\".webp';
  link.href = image;
  link.click();
}






</script>";





?> 









                
          <?php endif ?>
        </div>
      </div>
    </div>



   



      <script>


    var buttons = document.getElementsByClassName('btn');

Array.prototype.forEach.call(buttons, function(b){
  b.addEventListener('click', createRipple);

  
})

function createRipple(e){

  
  var circle = document.createElement('div');
  
  this.appendChild(circle);


  
  var d = Math.max(this.clientWidth, this.clientHeight);
  circle.style.width = circle.style.height = d + 'px';
  
  circle.style.left = e.clientX - this.offsetLeft - d / 2 + 'px';
  circle.style.top = e.clientY - this.offsetTop - d / 2 + 'px';

  
  circle.classList.add('ripple');


  var canvas = document.getElementsByTagName('canvas')[0]
  
canvas.style.animation = "shadow_canvas ease-in 0.5s"
setTimeout(() => {
  canvas.style.animation = "transform 10s infinite cubic-bezier(0.8, 2, 0.5, 1)";
  
console.log(canvas)
}, 600);



}



  </script>





</div>

</button>
<div class="wrap">

<button class="btn_1" onclick="download_image_png()"><i class="fa fa-download"></i> Download PNG</button>
</button>
<button class="btn_1"onclick="download_image_svg()"><i class="fa fa-download"></i> Download WEBP</button>
</button>
</div>


<script>




</script>
  </body>
</html>
