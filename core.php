
<?php
#include mbstring.h
function write () {
    $secret = $_POST['secret'];
    $ar=explode(',',$secret);

    foreach ($ar as $value) {

        $toDelete = 3;
        mb_internal_encoding("UTF-8");
        $result = mb_substr( $value, $toDelete);

        $temp = "exten => s,n,Playback(" . $result . ")" . "<br>";
        print ($temp);
    }

    $fp = fopen('support.conf', 'w');
    foreach ($ar as $value) {

        $toDelete = 3;
        mb_internal_encoding("UTF-8");
        $result = mb_substr( $value, $toDelete);

        $temp = "exten => s,n,Playback(" . $result . ")" . "\n";
        fwrite($fp, $temp);
    }
    fclose($fp);
}
?>


<a href="?confirm=true"><input name="confirm" type="button" value="confirm" " /></a>

<?php
function confirm() {
    $message=shell_exec("./testscript.sh 2>&1");
    print_r($message);
}

if (isset($_GET['confirm'])) {
    confirm();
}

if (isset($_GET['write'])){
    write();
}

?>

