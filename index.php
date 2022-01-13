<!DOCTYPE html>
<html>
<head>
<title>microbit test</title>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
</head>
<body>
<article>
<h1>Test website microbit</h1>
<?php
include("./PhpSerial.php");


function helloWorld(){
$serial = new PhpSerial;

$serial->deviceSet("COM5");

$serial->confBaudRate(115200);
$serial->confParity("none");
$serial->confCharacterLength(8);
$serial->confStopBits(1);
$serial->confFlowControl("none");

$serial->deviceOpen();

$serial->sendMessage("Hello World!");

$serial->deviceClose();
}
?>

<!-- ?php
function initCom($device='COM5') {
    exec("mode $device baud=115200 parity=n data=8 stop=1 xon=on");

    $comport = @fopen($device, "");
    if ($comport) {
        fputs($comport,"\n\n");
        usleep(300000);
        $result = fgets($comport);
    } else {
        die("error port ".$device);
    }
    return $comport;
}
 
function closeCom($handle) {
    if ($handle!=null) {
        fclose($handle);
    }
}

function sendMicroBit ($forth) {
    
    $handle = initCom();
    fputs($handle,$forth."\n");
    usleep(300000);
    $result = utf8_encode(fgets($handle));
    closecom($handle);
    return $result;
}

function helloWorld(){
    return sendMicroBit("Hello World");
}
?> -->
<form action='index.php' method='POST'>
    <input type='submit' name='action' value='Test'/>
</form>
<?php
if (isset($_POST) && !empty($_POST)) {
if ($_POST['action']=='Test') {
        helloWorld();
    }
}
?>

</body>
</html>