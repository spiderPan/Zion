<?php
$uName = $_GET['uName'];
if(isset($uName)){
    //echo "<p>THANKS ".$uName.", I will reply your email as soon as possible!</p>";
    echo "
    <script>
    function goHomeMsg(){
    var goHome = confirm(\"THANKS ".$uName.", I will reply your email as soon as possible!\");
    if (goHome == true){
        window.location.href=\"../index.php\";
    }
    }
    goHomeMsg();
    </script>";

}else{
    exit;
}

?>