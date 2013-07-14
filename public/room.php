<!DOCTYPE html>
<html>
<head>
	<title>Debates</title>
	<link rel="stylesheet" type="text/css" href="/css/pure-min.css">
	<link rel="stylesheet" type="text/css" href="/css/base.css">
	<link rel="stylesheet" type="text/css" href="/css/room.css">
	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	
<script type="text/javascript" src="/js/jquery-1.10.1.min.js"></script>	
</head>
<script type="text/javascript">
	sess = "<? session_start(); $_SESSION['session'] = $session; echo $session; ?>";
	$(document).ready(function(){
		nick = "anonymous";
		//setInterval("arrangeVideo",100);

    $( "#nick" ).dialog();
  	$('.nickbutton').click(function(){
  		nick = $('#nickvalue').val();
  		side = $(this).attr('name');
  	$( "#nick" ).remove();	
  	});
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
          TB.setLogLevel(TB.DEBUG); 
          
          function sessionConnectedHandler(event) {
            var id ;
            		
            var publisher = TB.initPublisher(apiKey, 'my0');
            session.publish(publisher);
            subscribeToStreams(event.streams);
          }

          function streamCreatedHandler(event) {
				subscribeToStreams(event.streams);
			}
			function subscribeToStreams(streams) {
				for (var i = 0; i < streams.length; i++) {
					if( $('#lvideos div:last-child').attr('data-number') == undefined ) id = 0;
            else id = $('#lvideos div:last-child').attr('data-number') + 1;
            $('#lvideos').append("<div id='my"+id+"' data-number="+id+" ></div>");
					var stream = streams[i];
					if (stream.connection.connectionId != session.connection.connectionId) {
						session.subscribe(stream , 'my'+id);
					}
				}
			}
			
			function exceptionHandler(event) {
				alert(event.message);
			}
			

      });
        </script>
	<div class="pure-g header">
		<a href="index.html"><span class="logo">Debate</span></a><span class="notlogo"> for a change.</span>
		<span id="topic"></span>
	</div>
<div id="wrapper">
	<div class="pure-g">
		<div class="pure-u-1-2 videos"><div id="lvideos"><div id='my0' data-number='0' ></div></div></div>
		<div class="pure-u-1-2 videos"></div>
	</div>
	<div class="pure-g">
		<div class="pure-u-1-2 lposts">
		<div class="card">
			<div class="pure-u-1 post-head">
				Support <span id="lcomments">0</span>
			</div>

			<div class="pure-u-1 post-content">
				
			</div>
			<div class="post-input">
				<form class="pure-form" action="">
					<input type="text" id="for-text" class="pure-input-1-2" placeholder="Your opinion">
					<input type="submit" id="for-button" class="pure-button pure-input-5-9 pure-button-primary">
				</form>
			</div>
		</div>
		</div>
		<div class="pure-u-1-2 rposts">
		<div class="card">
			<div class="pure-u-1 post-head">
				Oppose <span id="rcomments">0</span>
			</div>

			<div class="pure-u-1 post-content">
				
			</div>
			<div class="post-input">
				<form class="pure-form">
					<input type="text" id ="against-text" class="pure-input-1-2" placeholder="Your opinion">
					<input type="submit" id="against-button" class="pure-button pure-input-5-9 pure-button-primary" >
				</form>
			</div>
		</div>
		</div>
	</div>
	<div id="nick">Your Name<input type="text" id="nickvalue"><br><button class="nickbutton" name="support">Support</button><button class="nickbutton" name="against">Against</button></div></div>
</div>

<script src='https://swww.tokbox.com/webrtc/v2.0/js/TB.min.js'></script>
<script type="text/javascript" src="/js/roomui.js"></script>
<script type="text/javascript" src="/js/room.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

</body>
</html>