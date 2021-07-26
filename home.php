<!DOCTYPE html>
<html>
<head>
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/three.min.js"></script>
    <script src="js/panolens.min.js"></script>
    <style>
	html,
	body{
		margin: 0 auto;
		width: 100%;
		height: 100%;
		overflow: hidden;
	}
	#container {
		margin: 0 auto;
		width: 100%;
		height: 800px;
	}
    </style>
</head>
<body>
<script>
	$(document).ready(function(){
		var containerImage = document.querySelector('#container');
		const panorama = new PANOLENS.ImagePanorama('assets/image1.jpg');
		const panorama2 = new PANOLENS.ImagePanorama('assets/image2.jpg');

		var lookAtPositions = [
			new THREE.Vector3(4000, 0, -100)
		];

		panorama.addEventListener('enter-fade-start', function(){
			viewer.tweenControlCenter(lookAtPositions[0], 0);
		});

		const infospot = new PANOLENS.Infospot(200, PANOLENS.DataImage.Info);
		//z, y, x
		infospot.position.set(3000, -500, 150);
		infospot.addHoverText("Entrar");
		infospot.addEventListener('click', function(){
			viewer.setPanorama(panorama2);
			infospot.removeHoverElement();
		});
		panorama.add(infospot);

		const viewer = new PANOLENS.Viewer({container: containerImage});
		viewer.add(panorama, panorama2);
	});
</script>

<div id="container"></div>

</body>
</html>