
<?php
$secret = $_POST['secret'];
$ar=explode(',',$secret);

foreach ($ar as $value) {

    $toDelete = 3;
    mb_internal_encoding("UTF-8");
    $result = mb_substr( $value, $toDelete); // глу скребёт мышь

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

?>
