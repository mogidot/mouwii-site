

<!DOCTYPE html>
<html>
<body>

<?php
if ($handle = opendir('.')) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {

            echo "<a href='$entry'>$entry</a><br>\n";
        }
    }

    closedir($handle);
}

?>

</body>
</html>