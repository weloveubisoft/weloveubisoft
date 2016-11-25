<?php
include_once "IP.php";
include_once "ip_in_range.php";

// IP restriction code
function get_ip() {
	
	
	//Just get the headers if we can or else use the SERVER global
	$headers = $_SERVER;
	if ( function_exists( 'apache_request_headers' ) ) {
		$headers = $headers + apache_request_headers();
	}
	//Get the forwarded IP if it exists
	if (array_key_exists( 'X-Forwarded-For', $headers )) {
		$the_ip = $headers['X-Forwarded-For'];
	} elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) ) {
		$the_ip = $headers['HTTP_X_FORWARDED_FOR'];
	} else {
		$the_ip =  $_SERVER['REMOTE_ADDR'];
	}
	return $the_ip;
}
$custom_ips = array('127.0.0.1', '10.206.8.58','220.225.106.218','10.206.0.84','10.206.0.86');
$arr_ips = array_merge($arr_ips,$custom_ips);

if(!in_array(get_ip(), $arr_ips)) {
	//die("Content is not available");
}

// Get collage images


function get_image_list_jpg($dirname = "images/collage_150916/") {
	$images = glob($dirname."*.jpg");
	$arrImg = array();
	foreach($images as $image) {
		$arrImg[] = $image;
	}
	return $arrImg;
}
function get_image_list_png($dirname = "images/collage_150916/") {
	$images = glob($dirname."*.png");
	$arrImg = array();
	foreach($images as $image) {
		$arrImg[] = $image;
	}
	return $arrImg;
}
$arrImg1 = get_image_list_png();
$arrImg2 = get_image_list_jpg();
$arrImg = array_merge($arrImg1, $arrImg2);
shuffle($arrImg);


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>We Love UBISOFT</title>
		
		<link rel="icon" href="images/favicon.png" type="image/gif" >	
		<!-- for Facebook -->          
                <meta property="og:title" content="We stand together, we are Ubisoft" />
                <meta property="og:type" content="article" />
                <meta property="og:image" content="http://weloveubisoft.com/fb-8.jpg" />
                <meta property="og:url" content="http://weloveubisoft.com" />
                <meta property="fb:app_id" content="140555616398822" /> 
                <meta property="og:description" content="" />
		<!-- for Twitter -->   
				
				<meta name="twitter:card" content="We stand together, we are Ubisoft" />
				<meta name="twitter:site" content="http://weloveubisoft.com" />
				<meta name="twitter:title" content="We stand together, we are Ubisoft" />
				<meta name="twitter:description" content="" />
				<meta name="twitter:image" content="http://weloveubisoft.com/fb-8.jpg" />
				
		<style type="text/css">
			* { margin: 0; padding: 0; }
			html { background-color: #000; height: 100%; width: 100%; border: 0;}
			body {display:table-cell; text-align:center; vertical-align:middle;}
			@font-face {
              font-family: 'Univers';
              src: url("fonts/univers.eot") /* EOT file for IE */
            }
			@font-face {
              font-family: 'Univers'; /*a name to be used later*/
              src: url('fonts/univers.ttf') format("truetype"); /*URL to font*/
            }
			
			.fbTop{position: fixed !important; top:100px; left: 0; right:0; z-index: 1000; margin:0 auto; border:0; z-index:999; }
			
			.twitter-share-button1{float: left;margin: 0;top: 100px; z-index: 999; }
			.fbLayer{ position:absolute !important; margin:0 auto; top:56%; left: 0; right:0; 
			margin-top: 0px;
			 
			}
			.top_g{width: 100%; height:10%; position:fixed;  right:0; top:-110%; bottom:0; margin:auto;}	 
			.bottom_g{width: 100%; height:90%; position:fixed; right:0; top:110%; bottom:0; margin:auto;}
			#page-wrap { width: 100%; margin: 50px auto; background: #000; text-align:center; height:100%; }
			#page-wrap:before {
				position:fixed; left:0; right:0; top:0; bottom:0; margin:auto; max-width:1500px; width:100%; content:'';
				/*background: -moz-radial-gradient(center, circle cover,  rgba(0,0,0,0) 0%, rgba(0,0,0,1) 100%);*/ /* FF3.6-15 */
				/*background: -webkit-radial-gradient(center, circle cover,  rgba(0,0,0,0) 0%,rgba(0,0,0,1) 100%);*/  /* Chrome10-25,Safari5.1-6 */
				/*background: radial-gradient(circle at center,  rgba(0,0,0,0) 0%,rgba(0,0,0,1) 100%);*/ /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#000000',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
			}
			.ubi-logo { position: fixed; top: 50%; left: 0; right:0; z-index: 700; -webkit-transform:translateY(-50%); transform:translateY(-50%); margin:0 auto; border:0; }
			.ubi-smiley { max-width:800px; width:100%; height:200px; left:0; right:0; margin:0 auto; position:fixed;  z-index: 700; background:url(images/smile-bg.png)0 0 no-repeat; background-size:100% 200%; top:calc(50% + 100px); -webkit-transform:translateX(40px); transform:translateX(40px);}
			.ubi-smiley:hover { background-position:0 100%; }
			.oversmile { position: fixed; top:30px; left: 0; right:0; z-index: 1000; margin:0 auto; border:0; z-index:999; }
			
			/*.copyright { color:#fff; position:fixed; left:0; right:0; bottom:0; padding:10px 20px; font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;  font-size:12px; opacity:0.5;  }*/
			
			.copyright {color:#fff; position:fixed; left:0; right:0; bottom:0; padding:10px 20px; font-family: 'Univers'; font-size:32px; opacity:1; color:#33C8F3; z-index:1009; }
		    .copyright a{color:#33C8F3;} 
			
			.shareSmile {color:#33C8F3; font-family: 'Univers'; font-size:32px; }
			
			div#topdiv {
				position:fixed;
				top:0px;
				left:0px;
				width:100%;
				color:#000;
				
				
				background: #000; /* For browsers that do not support gradients */
				background: -webkit-linear-gradient(rgba(0,0,0,1) 30%, rgba(0,0,0,0) 100%); /* For Safari 5.1 to 6.0 */
				background: -o-linear-gradient(rgba(0,0,0,1) 30%, rgba(0,0,0,0) 100%); /* For Opera 11.1 to 12.0 */
				background: -moz-linear-gradient(rgba(0,0,0,1) 30%, rgba(0,0,0,0) 100%); /* For Firefox 3.6 to 15 */
				background: linear-gradient(rgba(0,0,0,1) 30%, rgba(0,0,0,0) 100%); /* Standard syntax */
				
				padding:65px;
}
div#bottomdiv {
	position:fixed;
	bottom:0px;
	left:0px;
	width:100%;
	color:#000;
	
	background: #000; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(rgba(0, 0, 0, 0) 20%, rgba(0, 0, 0, 1) 85%); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(rgba(0, 0, 0, 0) 20%, rgba(0, 0, 0, 1) 85%); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(rgba(0, 0, 0, 0) 20%, rgba(0, 0, 0, 1) 85%); /* For Firefox 3.6 to 15 */
    background: linear-gradient(rgba(0, 0, 0, 0) 20%, rgba(0, 0, 0, 1) 85%); /* Standard syntax */
	padding:70px;
}

		#slide_background {
		  transition: all 0.6s 0.5s;
		}
		#slide,
		#slide_wrapper {
		  transition: all 0.6s ease-out;
		}
		#slide {
		  transform: translateX(0) translateY(-40%);
		}
		.popup_visible #slide {
		  transform: translateX(0) translateY(0);
		}
		.well {
		        box-shadow: 0 0 10px rgba(0,0,0,0.3);
		        display:none;
		        margin:1em;
		    }

		
			
#slides {
  overflow: hidden;
  position: fixed;
  width: 100%;
  height: 50px;
  z-index:  99999999;

}

#slides ul {
  list-style: none;
  width: 100%;
  height: 250px;
  margin: 0;
  padding: 0;
  position: relative;
  color: #00000;
   z-index:  99999999;
   
}

#slides li {
  width: 100%;
  height: 50px;
  float: left;
  text-align: center;
  position: relative;
  font-family: univers;
  font-size: 35px;
  text-shadow:  #000000 0.0em 0.1em 0.1em;
   color: #FFFFFF;
    z-index: 99999999;
	
}
.btn-bar {
  width: 60%;
  margin: 0 auto;
  display: block;
  position: relative;
  top: 40px;
}

#buttons {
  padding: 0 0 5px 0;
  float: right;
}

#buttons a {
  text-align: center;
  display: block;
  font-size: 50px;
  float: left;
  outline: 0;
  margin: 0 60px;
  color: #FFF;
  text-decoration: none;
  display: block;
  padding: 9px;
  width: 35px;

}

a#prev:hover,
a#next:hover {
  color: #FFF;
  text-shadow: .5px 0px #b14943;
}
			
		</style>
		
		<script src="js/blazy.js"></script>
		<script>
		window.onload = function() {
		    var bLazy = new Blazy();
			
			setTimeout(displayLayer, 45000);
        };
    </script>
	<!-- Include jQuery -->
  <script src="js/jquery-1.8.2.min.js"></script>

  <!-- Include jQuery Popup Overlay -->
  <script src="js/jquery.popupoverlay.js"></script>
	<script>
    $(document).ready(function() {
			$('#slide').popup({
  
			  focusdelay: 400, // optional
			  vertical: 'top', //optional
  
			  transition: 'all 2s',
			  escape: false,
			  blur: false,
				/*autoopen:true*/
  
			});
    });
	
  </script>
	</head>
<body>
<script>
function hideLayer() {
	document.getElementById("contentFB").style= "visibility:hidden;";
	document.getElementById("popup").style = "top: -100%;";
	setTimeout(function(){ document.getElementById("popup1").style = "visibility:hidden;" }, 600);
}
function displayLayer() {
	
	$('#slide').popup('show');
}

</script>

<div id="slide" class="well" style="border-radius: 20px;width:440px;background: #000 none repeat scroll 0 0;padding: 0;top:40%">
	<a href="#" class="slide_close" style="right: 0;font-size: 27px;font-weight:bold;color: white;text-decoration:none;float:right;padding:0;margin: 0 13px 0 0;">×</a>

	<h1 class="shareSmile" style="margin-top: 5px;text-align:center">Hit Share to spread the smiles !</h1>
	<br/><br/>
	<div style="text-align:center" id="fb_btn" class="fbLayer fb-like" data-href="http://www.weloveubisoft.com" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="true"></div>
    
    
</div>
<div id="topdiv">
</div>
	<div id="buttons" style="display: none">
    <a id="prev" href="#">&lt; </a>
    <a id="next" href="#">&gt; </a> 
  </div>
<div id="slides" style="top: 0">
  <ul>
	<li class="slide_r">
    "I love Ubisoft and the people behind the Company and on Top all of your Games, Your Ideas, Your Power! We Gamers Love UBISOFT as the best Publisher! We Love Ubisoft for ist very funny E3 Shows! #WeTrustUbisoft!" - Florian
    </li>
	<li class="slide_r">
    "Stand together, always and forever! Je suis Ubisoft!" - Dennis
    </li>
	<li class="slide_r">
    "My Smile for Ubisoft !"- Benjamin
    </li>
	<li class="slide_r">
    "Hey, I’m Benjamin from Germany and I’m an Hobby Game Designer, I love Ubi ! Thank’s for all your great stuff !"
    </li>
	<li class="slide_r">
    "Just wanted to send you a picture dor the website. I hope you can stay independant. Love you and your games (especially the AC series). Best wishes for the future" - Tobias
    </li>
	<li class="slide_r">
    "love your games!! please keep up the great work!" - Florian
    </li>
	<li class="slide_r">
    "Stand for creativity!" - Stephanie
    </li>
	<li class="slide_r">
    "je partage mon sourire en soutien a ubisoft un editeur pour lequel j'affectionne beaucoup surtout a propos de rainbow six siege qui est actuellement mon jeux favoris et auquel j'ai envie de jouer en permanence donc si je peux aider je le fais" - Matt
    </li>
	<li class="slide_r">
    "ALLEZ UBISOFT i love you" - Matt
    </li>
	<li class="slide_r">
    "I'd be sooo honored to place my jetlagged - but happy - UbiE3 face on weloveubisoft.com!"
    </li>
	<li class="slide_r">
    "Please find attached my photo, and fingers crossed!"
    </li>
	<li class="slide_r">
    "Forza Yves, forza Ubi, loooove ! " - Philippe
    </li>
	<li class="slide_r">
    "Bravo pour cette chouette initiative !"
    </li>
	<li class="slide_r">
    "Thanks for all your work and dedication, your games and universes are amazing !"- Marion
    </li>
	<li class="slide_r">
    "Rayman! Mon premier plus grand héros de jeux vidéo de mon enfance! C'est Ubisoft qui a éveillé et nourri ma passion de créer des jeux vidéo!"
    </li>
	<li class="slide_r">
    "Thanks for this great initiative."- Virginie 
    </li>
    <li class="slide_r">
     "I'd be sooo honored to place my jetlagged - but happy - UbiE3 face on weloveubisoft.com!"
    </li>
    <li class="slide_r">
      "I just wanted to submit my picture for the We Love Ubisoft page/campaign :)"
    </li>
    <li class="slide_r">
      "Merci beaucoup pour cette belle initiative"- Jessica
    </li>
    <li class="slide_r">
     "Thank you for a very nice initiative and I am extremely proud of our Ubisoft Family!!!"-Vineet
    </li>
    <li class="slide_r">
     "Thank you for this great initiative, We Stand Together !"- Agnès
    </li>
    <li class="slide_r">
      "Thanks a lot for putting this together!"-Marie
    </li>
    <li class="slide_r">
      "I just wanted to share these photos that mark my most memorable moments ever, all of which happened to be related to Ubisoft. It would be an honor to be part of this 30 year celebration"
    </li>
    <li class="slide_r">
      "Thank you for revolutionizing the video game industry and thank you for the Assassin's Creed franchise and more importantly, thank you for making me feel more like a friend than a fan."
    </li>
    <li class="slide_r">
      "Love and respect."- Reno
    </li>
    <li class="slide_r">
     "Hi Ubisoft, Here is my little input to support your beautiful community I wish to join after my studies..." - Max
    </li>
    <li class="slide_r">
      "I, WE, LOVE UBI xxx"- Suzanne
    </li>
     <li class="slide_r">
      "This website is my daily dose of enthusiasm :) <3 <3 <3 So great to see so many smily faces from all around the world. I bel-Yves"!- Camille
    </li>
     <li class="slide_r">
      "Thank you for this great initiative ! The photos are great !"- Etienne
    </li>
     <li class="slide_r">
      "Congrats on your initiative! I love it!Thank you for making us smile !!!!!" - Alexandra
    </li>
      <li class="slide_r">
      "I've been a huge fan since the beginning and always will be! Ubisoft has made a huge positive impact on my life :) I'll always support and stand by them!"
    </li>
      <li class="slide_r">
     "Thank you so much!!" - Madeeha
    </li>
      <li class="slide_r">
      "Not (yet) an employee, but a long time fan, graduating this year. I hope that I will be able to apply to a still free Ubisoft."
    </li>
    <li class="slide_r">
     "Thank you for doing this!"-Xavier
    </li>
  </ul>
</div>
	
	<div id="page-wrap"> 
		<img src="images/we-love-ubi.png" class="ubi-logo"> 
		<img src="images/over4000.png" class="oversmile">
		

		<div id="fb_btn" class="fbTop fb-like" data-href="http://www.weloveubisoft.com" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="true"></div>

	 <div style="position: fixed !important; top:100px; left: 185px; right:0; z-index: 1000; margin:0 auto; border:0; z-index:999;width: 20px; ">
			<a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=#weloveubisoft. We Stand Together. #weareubisoft" data-size="large" >
			Tweet</a>
			<link rel="canonical" href="http://weloveubisoft.com">
		</div>
		
		
		<div style="z-index:-9;width:auto;height:2000px;position: absolute;left: 50%; margin-right: -50%;transform: translate(-50%, -3%)"> 
		<?php foreach($arrImg as $k=>$img): ?>
			<div class="b-lazy" style="">
				<img style="width:1200px;" class="b-lazy collagepic" data-src="<?php echo $img; ?>" src="images/loading.jpg" />
			</div>
		<?php endforeach; ?>	
		</div>
		<span class="ubi-smiley"></span>
	</div>
	
	<?php 
	$currentIp = get_ip();
	$isAllowed = false;
	//echo $currentIp;
	if(in_array($currentIp, $arr_ips)) {
		$isAllowed = true;
		echo '<p class="copyright">"Wish to share your beautiful smile? Please send your photo to <a href="mailto:weloveubisoft@gmail.com?subject=weloveubisoft">weloveubisoft@gmail.com</a>"</p>';
	}
	
	if(!$isAllowed) {
		foreach ($arr_ips_network as $ip => $range) {
			$isAllowed = netMatch($range, $currentIp);
			if($isAllowed) {
				echo '<p class="copyright">"Wish to share your beautiful smile? Please send your photo to <a href="mailto:weloveubisoft@gmail.com?subject=weloveubisoft">weloveubisoft@gmail.com</a>"</p>';
				break;
			}
		}
	}
	if($isAllowed == false) {
			echo '<p class="copyright">"Wish to share your beautiful smile? Please send your photo to <a href="mailto:weloveubisoft@hotmail.com?subject=weloveubisoft">weloveubisoft@hotmail.com</a>"</p>';
	}
	
	?>
	
	
	
	<div id="bottomdiv"></div>
	
	<div id="fb-root"></div>
	<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
 
  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };
 
  return t;
}(document, "script", "twitter-wjs"));</script>
    <script>window.fbAsyncInit=function() {FB.init({appId:'140555616398822',xfbml:true,version:'v2.7'});}; 
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
	
	<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-83733325-1', 'auto');
		  ga('send', 'pageview');
	</script>
		<script>
	
	$(document).ready(function () {
		
		
		$( window ).resize(function() {
		//console.log($( window ).width());
		ginitSlider();
	});
  //rotation speed and timer
  var speed = 8000;
  
  var run = setInterval(rotate, speed);
  var slides = $('.slide_r');
  var container = $('#slides ul');
  var elm = container.find(':first-child').prop("tagName");
  var item_width = $( window ).width();
container.width($( window ).width());
  var previous = 'prev'; //id of previous button
  var next = 'next'; //id of next button
  slides.width(item_width); //set the slides to the correct pixel width
  container.parent().width(item_width);
  container.width(slides.length * item_width); //set the slides container to the correct total width
  container.find(elm + ':first').before(container.find(elm + ':last'));
  resetSlides();
  
  function ginitSlider() {
	  //console.log("Init - " + $( window ).width());
	  
	  var speed = 8000;
	  
	  var run = setInterval(rotate, speed);
	  var slides = $('.slide_r');
	  var container = $('#slides ul');
	  
	  var elm = container.find(':first-child').prop("tagName");
	  var item_width = $( window ).width();
	  container.width($( window ).width());
	  //console.log(container.width());
	  var previous = 'prev'; //id of previous button
	  var next = 'next'; //id of next button
	  slides.width(item_width); //set the slides to the correct pixel width
	  container.parent().width(item_width);
	  container.width((slides.length * item_width)); //set the slides container to the correct total width
	  container.find(elm + ':first').before(container.find(elm + ':last'));
	  resetSlides();
  }
  ginitSlider();
  
  //if user clicked on prev button
  
  $('#buttons a').click(function (e) {
    //slide the item
    
    if (container.is(':animated')) {
      return false;
    }
    if (e.target.id == previous) {
      container.stop().animate({
        'left': 0
      }, 1500, function () {
        container.find(elm + ':first').before(container.find(elm + ':last'));
        resetSlides();
      });
    }
    
    if (e.target.id == next) {
      container.stop().animate({
        'left': $( window ).width() * -2
      }, 1500, function () {
        container.find(elm + ':last').after(container.find(elm + ':first'));
        resetSlides();
      });
    }
    
    //cancel the link behavior      
    return false;
    
  });
  
  //if mouse hover, pause the auto rotation, otherwise rotate it  
  container.parent().mouseenter(function () {
    clearInterval(run);
  }).mouseleave(function () {
    run = setInterval(rotate, speed);
  });
  
  
  function resetSlides() {
    //and adjust the container so current is in the frame
    container.css({
      'left': -1 * $( window ).width()
    });
  }
  
});
//a simple function to click next link
//a timer will call this function, and the rotation will begin

function rotate() {
  $('#next').click();
}

	</script>
</body>
</html>