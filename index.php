<!doctype html>
<html lang="fr">
    
<head>
	<!-- Contenu du head --> 
	<meta charset="utf-8">
    <link href="css/Acceuil.css" rel="stylesheet" type="text/css" />
        <link href="css/slider2.css" rel="stylesheet" type="text/css" />
     <link href="css/alauneslide.css" rel="stylesheet" type="text/css" />
   
	<title>Bienvenue au REPCOF-BJ</title>
</head>

<body>
 <div class = BarNav1>
     <ul>
        <li id="FlashInfo"><strong>FLASH INFO</strong></li>
        <li><marquee > Nous allons étendre notre intervention à l’ensemble des femmes à l'intérieur du Bénin et de la diaspora.</marquee></li>
        
        <li id="Inscription"><a href="Sinscrire.php">Inscription</a></li>
       
    </ul> 
     
 </div>
    
    <div id="barner">
        <img src="image/affiche1.png" />
    </div>
    
    <nav>
        
        <ul>
  <li><a href="index.php"><strong>ACCUEIL</strong></a></li>
  <li><a href="search_all.php"><strong>CONSULTATION</strong></a></li>
  <li><a href="Sinscrire.php"><strong>S'INSCRIRE</strong></a></li>
  <li><a href="#encr"><strong>CONTACT</strong></a></li>
  <li><input type="text" id="recherche" name="recherche" size="20" maxlength="20" required onfocus="effacepwd()" /></li>
  <li><input type="submit" value="Rechercher" /></li>
     </ul> 
    
    
    
    </nav>
    <div class="section1">
    
 <section  style="padding-top:10px; font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">

     
      
     
    <!-- #region Jssor Slider Begin -->
    <!-- Generator: Jssor Slider Maker -->
    <!-- Source: https://www.jssor.com -->
    <script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
              {$Duration:500,$Delay:12,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2049,$Easing:$Jease$.$OutQuad},
              {$Duration:500,$Delay:40,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$SlideOut:true,$Easing:$Jease$.$OutQuad},
              {$Duration:1000,x:-0.2,$Delay:20,$Cols:16,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:260,$Easing:{$Left:$Jease$.$InOutExpo,$Opacity:$Jease$.$InOutQuad},$Opacity:2,$Outside:true,$Round:{$Top:0.5}},
              {$Duration:1600,y:-1,$Delay:40,$Cols:24,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:$Jease$.$OutJump,$Round:{$Top:1.5}},
              {$Duration:1200,x:0.2,y:-0.1,$Delay:16,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$Jease$.$InWave,$Top:$Jease$.$InWave,$Clip:$Jease$.$OutQuad},$Round:{$Left:1.3,$Top:2.5}},
              {$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$Jease$.$InJump,$Top:$Jease$.$InJump,$Clip:$Jease$.$OutQuad},$Round:{$Left:0.8,$Top:2.5}},
              {$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$During:{$Left:[0.1,0.9],$Top:[0.1,0.9]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$Jease$.$InJump,$Top:$Jease$.$InJump,$Clip:$Jease$.$OutQuad},$Round:{$Left:0.8,$Top:2.5}}
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 1090;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 10);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 053 css*/
        .jssorb053 .i {position:absolute;cursor:pointer;}
        .jssorb053 .i .b {fill:#fff;fill-opacity:0.5;}
        .jssorb053 .i:hover .b {fill-opacity:.7;}
        .jssorb053 .iav .b {fill-opacity: 1;}
        .jssorb053 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 093 css*/
        .jssora093 {display:block;position:absolute;cursor:pointer;}
        .jssora093 .c {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;}
        .jssora093 .a {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;}
        .jssora093:hover {opacity:.8;}
        .jssora093.jssora093dn {opacity:.6;}
        .jssora093.jssora093ds {opacity:.3;pointer-events:none;}
    </style>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1200px;height:280px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1200px;height:280px;overflow:hidden;">
            <div data-p="170.00">
                <img data-u="image" src="image/affiche2.png" />
            </div>
            <div data-p="170.00">
                <img data-u="image" src="image/affiche3.png" />
            </div>
            
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb053" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <path class="b" d="M11400,13800H4600c-1320,0-2400-1080-2400-2400V4600c0-1320,1080-2400,2400-2400h6800 c1320,0,2400,1080,2400,2400v6800C13800,12720,12720,13800,11400,13800z"></path>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
                <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
                <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
            </svg>
        </div>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
    <!-- #endregion Jssor Slider End -->
</section>
         
        
    <div id="Sec2">
      
   
          <aside class="slideshow">
  <div class="slideshow-container slide">


    <img src="image/alaune2.png"/>
    <img src="image/RosineSOGLO.png"/>
    <img src="image/competentes2.png"/>
    <img src="image/Zannou.png"/>
    <img src="image/Cecile-de-Dravo.png"/>
    
    
    
    
  </div>
</aside>

        <article id="Mb"><strong>MOT DE BIENVENUE</strong></article>
        <br><br><br><p class="M">Femmes compétentes Béninoises,  vivant sur le territoire national ou à l’extérieur des frontières du Bénin, nous vous souhaitons la BIENVENUE sur la plateforme du répertoire des femmes compétentes du Bénin.

           Il y a quelques années, l’idée de créer une plateforme numérique qui aiderait à la valorisation des femmes en général et des femmes compétentes en particulier a vu le jour. Cette  plateforme rend ainsi accessible...</p> <br> <p class="liensuite"><a href="welcome.php">Lire la suite...</a></p>
        <article id="Avatar"><img src="image/Pr.jpg" style="height : 160px; width : 200px;"></article>
         <br>
        <p class="Dr">Dr Léontine KONOU IDOHOU</p>
        <br>
        <p class="Pr">Présidente RIFONGA</p>
        
       
        </div>
        <section class="Sec3">
         <article class="femmealaune"><img src="image/gbedo.png" style="height : 380px; width : 250px;"></article>
            
         <article class="sinscri"><a href="Sinscrire.php"><img src="image/sinscri.png" style="height : 380px; width : 594px;"></a> <br> </article>
            
         <article class="Proverbe"><p class="Titre"><strong><span class="Citation">Citation d</span>e la semaine</strong></p><p class="Pro"><em>Ne perds jamais espoir. Lorsque le<br> soleil se couche, les étoiles apparaissent </em>-<br><span class="signature">Proverbe Africain</span></p>
              
        </article>
       
            
        </section>
          
        
        <footer>
		    <div>
           <img id="encr" src="image/piedpage.png"style="height : 122px; width : 848px;" >
               </div> 
			   
            
            <p id="bas"> © 2018 Copyright  BAANI RIFONGA WANEP - Tous droits réservés</p>
                     
        
        
        </footer>
   
        
        </div>
</body>
</html> 
