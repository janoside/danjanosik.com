<?php
/**
 * This is a simple script meant to be used with a mobile advertising SDK
 * to test and validate creative.
 */
if (isset($_GET['id'])) {
	if ($_GET['id'] == "ASTAR-MRAIDTEST-300x250") {
		header('X-Width: 320');
		header('X-Height: 250');
	} else if ($_GET['id'] == "ASTAR-MRAIDTEST-320x50") {
		header('X-Width: 320');
		header('X-Height: 50');
	} else if ($_GET['id'] == "ASTAR-MRAIDTEST-728x90") {
		header('X-Width: 728');
		header('X-Height: 90');
	}
}
header('X-Clickthrough: http://danjanosik.com/mraidtest/mraid-clickthrough.html');
header('X-Adtype: mraid');
header("X-Creativeid: " . $_GET['id']);
header('X-Imptracker: http://danjanosik.com/mraidtest/mraid-imptracker.html');
header('X-Refreshtime: 10000');
header('X-Failurl: http://danjanosik.com/mraidtest/mraid-failed.html');
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="user-scalable=no, width=device-width,initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
		<script type="text/javascript" src="mraid.js"></script>
		<style type="text/css">
			html, body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
			}

			.banner, .overlayBanner {
				display: block;
				position: absolute;
				top: 0px;
				left: 0px;
				z-index: 1000;
				overflow: hidden;
			}

			.banner {
				background-color: red;
				width: 100%;
				height: 100%;
			}

			.overlayBanner {
				background-color: green;
				width: 100%;
				height: 100%;
			} 
		</style>
		<script type="text/javascript">
			// Check to see if document is ready
			if ((mraid.getState() != "default") || (mraid.getState() != "ready")) {
				// console.log("Document is not ready, adding event listener");
				// Register event listener to keep track of state changes
				mraid.addEventListener("stateChange", handleStateChanges);
			} else {
				// console.log("Document is ready");
				// Register event listener to keep track of state changes
				mraid.addEventListener("stateChange", handleStateChanges);
			}

			function handleStateChanges() {
				// console.log('mraid state: ' + mraid.getState());
				// Perform action on state change
				switch(mraid.getState()) {
				case "expanded":
					// console.log("handleStateChanges, expanded");
					// Show the overlay banner when view is in "expanded" state
					document.getElementById('banner').setAttribute('class', 'overlayBanner');
					break;
				case "default":
					// console.log("handleStateChanges, default");
					// Show the initial banner when view is in "default" state
					document.getElementById('banner').setAttribute('class', 'banner');
					break;
				}
			}
</script>
</head>

<body>
<div id='banner' onClick='mraid.expand()'></div>
</body>

</html>
