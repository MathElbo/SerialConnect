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