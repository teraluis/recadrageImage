
<html>
<head>
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resizeable demo - Interface plugin for jQuery</title>
		<script type="text/javascript" src="interface/jquery.js"></script>
		<script type="text/javascript" src="interface/interface.js"></script>
<style type="text/css" media="all">

body
{
	background: #fff;
	margin: 0;
	padding: 0;
	height: 100%;
}
#resizeMe
{
	position: absolute;
	width: 200px;
	height: 300px;
	left: 240px;
	top: 70px;
	cursor: move;
	background-image: url(images/tocrop.jpg);
	background-position: -190px -20px ;
	background-repeat: no-repeat;
}
#resizeSE,
#resizeE,
#resizeNE,
#resizeN,
#resizeNW,
#resizeW,
#resizeSW,
#resizeS
{
	position: absolute;
	width: 8px;
	height: 8px;
	background-color: #333;
	border: 1px solid #fff;
	overflow: hidden;
}
#resizeSE{
	bottom: -10px;
	right: -10px;
	cursor: se-resize;
}
#resizeE
{
	top: 50%;
	right: -10px;
	margin-top: -5px;
	cursor: e-resize;
}
#resizeNE
{
	top: -10px;
	right: -10px;
	cursor: ne-resize;
}
#resizeN
{
	top: -10px;
	left: 50%;
	margin-left: -5px;
	cursor: n-resize;
}
#resizeNW{
	top: -10px;
	left: -10px;
	cursor: nw-resize;
}
#resizeW
{
	top: 50%;
	left: -10px;
	margin-top: -5px;
	cursor: w-resize;
}
#resizeSW
{
	left: -10px;
	bottom: -10px;
	cursor: sw-resize;
}
#resizeS
{
	bottom: -10px;
	left: 50%;
	margin-left: -5px;
	cursor: s-resize;
}
#container
{
	position: absolute;
	top: 50px;
	left: 50px;
	width: 650px;
	height: 450px;
	background-color: #ccc;
	background-image: url(images/tocrop_back.jpg);
        background-repeat: no-repeat;
}
</style>
</head>
<body>
<div id="container"></div>
<div id="resizeMe">
	<div id="resizeSE"></div>
	<div id="resizeE"></div>
	<div id="resizeNE"></div>
	<div id="resizeN"></div>
	<div id="resizeNW"></div>
	<div id="resizeW"></div>
	<div id="resizeSW"></div>
	<div id="resizeS"></div>
</div>
<input id="envoyerImage" type="submit" value="envoyer" />
<script type="text/javascript">
var positionX=240;
var positionY=70;
var largeur=100;
var hauteur = 100;
$(document).ready(
        
	function()
	{
		$('#resizeMe').Resizable(
			{
				minWidth: 50,
				minHeight: 50,
				maxWidth: 800,
				maxHeight: 800,
				minTop: 50,
				minLeft: 50,
				maxRight: 890,
				maxBottom: 250,
				dragHandle: true,
				onDrag: function(x, y)
				{
					this.style.backgroundPosition = '-' + (x - 50) + 'px -' + (y - 50) + 'px';
                                        positionX=(x-50);
                                        positionY=(y-50);
				},
				handlers: {
					se: '#resizeSE',
					e: '#resizeE',
					ne: '#resizeNE',
					n: '#resizeN',
					nw: '#resizeNW',
					w: '#resizeW',
					sw: '#resizeSW',
					s: '#resizeS'
				},
				onResize : function(size, position) {
					this.style.backgroundPosition = '-' + (position.left - 50) + 'px -' + (position.top - 50) + 'px';
                                        largeur=(position.left - 50);
                                        hauteur=(position.top - 50);

				}
			}
		)
	}
);
function ajaxEnvoyer(){
    var data = {
        "x":Math.abs(positionX),
        "y":Math.abs(positionY),
        "largeur":largeur,
        "hauteur":hauteur
    }
    $.ajax({
    url : "recadrage.php",
    type : "GET",
    data:data,
    success : function(data){
        document.write(data);
    }
    });
}
$("#envoyerImage").click(ajaxEnvoyer);
</script>
		<script language="JavaScript" type="text/javascript">var client_id = 1;</script>
		<script language="JavaScript" src="http://stats.byspirit.ro/track.js" type="text/javascript"></script>
		<noscript>
		<p><img alt="" src="http://stats.byspirit.ro/image.php?client_id=1" width="1" height="1" /></p>
		</noscript>
</body>
</html>