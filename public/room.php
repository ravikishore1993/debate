<!DOCTYPE html>
<html>
<head>
	<title>Debates</title>
	<link rel="stylesheet" type="text/css" href="/css/pure-min.css">
	<link rel="stylesheet" type="text/css" href="/css/base.css">
	<link rel="stylesheet" type="text/css" href="/css/index.css">
	<link rel="stylesheet" type="text/css" href="/css/room.css">
	
<script type="text/javascript" src="/js/jquery-1.10.1.min.js"></script>	
</head>
<script type="text/javascript">
	sess = "<? session_start(); $_SESSION['session'] = $session; echo $session; ?>";
	$(document).ready(function(){
	});
</script>
<body>
	 <div id="myPublisherDiv"></div>
        <script type="text/javascript">
          $(document).ready(function(){var apiKey = "35046632";
          var sessionId = "<? echo $session; ?>";
          var token = "<? echo $token; ?>";
			var session = TB.initSession(sessionId);
          session.addEventListener('sessionConnected', sessionConnectedHandler);
          session.connect(apiKey, token);
          
          function sessionConnectedHandler(event) {
            var publisher = TB.initPublisher(apiKey, 'myPublisherDiv');
            session.publish(publisher);
            subscribeToStreams(event.streams);
          	console.log(event);
          }

          function streamCreatedHandler(event) {
				subscribeToStreams(event.streams);
			}
			function subscribeToStreams(streams) {
				for (var i = 0; i < streams.length; i++) {
					var stream = streams[i];
					if (stream.connection.connectionId != session.connection.connectionId) {
						session.subscribe(stream);
					}
				}
			}
			
			function exceptionHandler(event) {
				alert(event.message);
			}
			

      });
        </script>
	<div class="pure-g header">
		<a href="index.html"><span class="logo">Debate</span></a>
	</div>
<div id="wrapper">
	<div class="pure-g">
		<div class="pure-u-1-2 videos">Video Dummy</div>
		<div class="pure-u-1-2 videos">Video Dummy</div>
	</div>
	<div class="pure-g">
		<div class="pure-u-1-2 lposts">
			<div class="pure-u-1 post-content">
				
			</div>
			<div class="post-input">
				<form class="pure-form" action="">
					<input type="text" id="for-text" class="pure-input-1-2" placeholder="Your opinion">
					<input type="submit" id="for-button" class="pure-button pure-input-5-9 pure-button-primary">
				</form>
			</div>
		</div>
		<div class="pure-u-1-2 rposts">
			<div class="pure-u-1 post-content">
				
			</div>
			<div class="post-input">
				<form class="pure-form">
					<input type="text" id ="against-text" class="pure-input-1-2" placeholder="Your opinion">
					<input type="submit" id="against-button" class="pure-button pure-input-5-9 pure-button-primary">
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="/js/TB.js"></script>
<script type="text/javascript" src="/js/roomui.js"></script>
<script type="text/javascript" src="/js/index.js"></script>

</body>
</html>