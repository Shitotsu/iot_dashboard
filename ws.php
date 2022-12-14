
<?php 
include 'config.php';
$produk = mysqli_query($conn, "SELECT * FROM product WHERE username ='kelompok4@admin.com'");
$row = mysqli_fetch_array($produk);
?>

<html>

   <head>
      <title>JavaScript MQTT WebSocket Example</title>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript">
	 </script>
	 <script type = "text/javascript" language = "javascript">
		var mqtt;
		var reconnectTimeout = 2000;
		var host="192.168.100.2";//change this
		//var host="ws6.local";//change this
		//var host="iot.eclipse.org"
		//var port=80
		var port=9001;
		
		function onFailure(message) {
			console.log("Connection Attempt to Host "+host+"Failed");
			setTimeout(MQTTconnect, reconnectTimeout);
        }
		function onMessageArrived(msg){
			out_msg="Message received "+msg.payloadString+"<br>";
			out_msg=out_msg+"Message received Topic "+msg.destinationName;
			console.log(out_msg);

		}
		
	 	function onConnect() {
	  // Once a connection has been made, make a subscription and send a message.
	
		console.log("Connected ");
		mqtt.subscribe("<?php echo $row['topic'];?>");
		message = new Paho.MQTT.Message("Hello World");
		message.destinationName = "a";
		message.retained=true;
		mqtt.send(message);
	  }
	  function MQTTconnect() {
		console.log("connecting to "+ host +" "+ port);
		var x=Math.floor(Math.random() * 10000); 
		var cname="orderform-"+x;
		mqtt = new Paho.MQTT.Client(host,port,cname);
		//document.write("connecting to "+ host);
		var options = {
			timeout: 3,
			onSuccess: onConnect,
			onFailure: onFailure,
			 };
		mqtt.onMessageArrived = onMessageArrived
		
		mqtt.connect(options); //connect
		}

	  </script>
		<?php 
		$payload = 'echo "<script>msg.payloadString;</script>"';
		echo '$payload';
		$sql = mysqli_query($conn,"INSERT INTO pd_temp_humidity (product_status) VALUES ('$payload')");
		if($payload){
			while($sql); 
		}else{
			echo mysqli_error($conn);
		}
		?>
   </head>
     <body>
   <h1>Main Body</h1>
 	<script>
	MQTTconnect();
	</script>
   </body>	
</html>