
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

function confirm() {
    $message=shell_exec("./testscript.sh");
    print_r($message);
}

if (isset($_GET['confirm'])) {
    confirm();
    echo '<a href="?dialplan=true"><input name="dialplan" type="button" value="Dialplan Reload" " /></a>';
}

if (isset($_GET['write'])){
    write();
    echo '<a href="?confirm=true"><input name="confirm" type="button" value="confirm" " /></a>';
}

if (isset($_GET['dialplan'])){
    $message=shell_exec("./reloadDialplan.sh");
    print_r($message);
    echo '<a href="index.html"><input name="back" type="button" value="back" " /></a>';
}

if (isset($_GET['clear'])) {
    //here must be solution for clearing current message

}

if (isset($_GET['current_message'])) {
    //here must be solution which display current message

}

?>

