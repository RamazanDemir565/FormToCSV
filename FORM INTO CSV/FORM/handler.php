<?php
if (isset($_POST['rows'])) {

    $h = tmpfile();
    foreach ($_POST['rows'] as $row) {
        fputcsv($h, array_values($row));
    }
    rewind($h);
    $csv = '';
    while (($row = fgets($h)) !== false) {
        $csv .= $row;
    }
    fclose($h);

    header("Content-type: application/csv");
    header("Content-Disposition: attachment; filename=file.csv");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo $csv;
    exit;

}
?>