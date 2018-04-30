<?php

$list = array(
        array('Voornaam','Achternaam','Functie','Woonplaats','Geboortedatum','Wie ben ik','Educatie','Technical skills','Taal1','Taal2','Taal3','Taal4','Taal5','Referentie project 1 bedrijfsnaam','Referentie project 1 periode van','Referentie project 1 periode tot', 'Referentie project 1 beschrijving','Referentie project 2 bedrijfsnaam','Referentie project 2 periode van','Referentie project 2 periode tot', 'Referentie project 2 beschrijving','Referentie project 3 bedrijfsnaam','Referentie project 3 periode van','Referentie project 3 periode tot', 'Referentie project 3 beschrijving')
);
if (isset($_POST['rows'])) {
    $h = tmpfile();
    foreach ($list as $fields) {
        fputcsv($h, $fields);
    }
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
    header("Content-Disposition: attachment; filename=CSVfile.csv");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo $csv;
    exit;

}
?>

<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Genereer CSV File by Ramazan Demir</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="form.css" >
    <script src="form.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
            <h2>Genereer CSV file</h2>
            <form method="post">
                <div class="form-group">
                    <label for="voornaam" id="voornaam" name="voornaam" name="rows[0][]">Voornaam:</label>
                    <input type="text" class="form-control" id="voornaam" name="rows[1][]" required maxlength="30">
                </div>
                <div class="form-group">
                    <label for="achternaam" name="rows[0][]"> Achternaam:</label>
                    <input type="text" class="form-control" id="achternaam" name="rows[1][]" required maxlength="50">
                </div>
                <div class="form-group">
                    <label for="functie" name="rows[0][]"> Functie:</label>
                    <input type="text" class="form-control" id="functie" name="rows[1][]" required maxlength="50">
                </div>
                <div class="form-group">
                    <label for="woonplaats" name="rows[0][]"> Woonplaats:</label>
                    <input type="text" class="form-control" id="woonplaats" name="rows[1][]" required maxlength="50">
                </div>
                <div class="form-group">
                    <label for="geboortedatum" name="rows[0][]"> Geboortedatum:</label><br>
                    <input type="date" class="form-control" id="geboortedatum" name="rows[1][]" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="wiebenik" name="rows[0][]"> Wie ben ik:</label>
                    <textarea class="form-control" type="textarea" name="rows[1][]" id="wiebenik"  required maxlength="6000" rows="7"></textarea>
                </div>
                <div class="form-group">
                    <label for="educatie" name="rows[0][]"> Educatie:</label><br>
                    <input type="text" class="form-control" id="educatie" name="rows[1][]" required maxlength="50">
                </div>
                <div class="form-group">
                    <label for="skills" name="rows[0][]"> Technical skills:</label><br>
                    <input type="text" class="form-control" name="skills" id="skills" name="rows[1][]" required maxlength="50">
                </div>
                <div class="form-group">
                    <label for="talen" name="rows[0][]"> Talen:</label>
                    <p><input type="checkbox" name="rows[1][]" id="talen" value="Nederlands"> Nederlands</p>
                    <p><input type="checkbox" name="rows[1][]" id="taal2" value="Frans">Frans</p>
                    <p><input type="checkbox" name="rows[1][]" id="taal3" value="Engels">Engels</p>
                    <p><input type="checkbox" name="rows[1][]" id="taal4" value="Duits">Duits</p>
                    <p><input type="checkbox" name="rows[1][]" id="taal5" value="Andere">Andere</p>
                </div>
                <div class="form-group">
                    <label for="ref1" name="rows[0][]"> Referentie project 1:</label>
                    <p>Bedrijfsnaam:</p><input type="text" class="form-control"  id="ref1" name="rows[1][]">
                    <p>Periode:</p><p>van:</p> <input type="date" class="form-control" id="geboortedatum" name="rows[1][]"> <p>tot: </p><input type="date" class="form-control" id="geboortedatum" name="rows[1][]">
                    <p>Beschrijving:</p><textarea class="form-control" type="textarea" name="rows[1][]" id="message"  maxlength="3000" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="ref1" name="rows[0][]"> Referentie project 2:</label>
                    <p>Bedrijfsnaam:</p><input type="text" class="form-control"  id="ref1" name="rows[1][]">
                    <p>Periode:</p><p>van:</p> <input type="date" class="form-control" id="geboortedatum" name="rows[1][]"><p>tot: </p><input type="date" class="form-control" id="geboortedatum" name="rows[1][]">
                    <p>Beschrijving:</p><textarea class="form-control" type="textarea" name="rows[1][]" id="message"  maxlength="3000" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="ref1" name="rows[0][]"> Referentie project 3:</label>
                    <p>Bedrijfsnaam:</p><input type="text" class="form-control" name="rows[1][]" id="ref1" >
                    <p>Periode:</p><p>van:</p> <input type="date" class="form-control" id="geboortedatum" name="rows[1][]"><p>tot: </p><input type="date" class="form-control" id="geboortedatum" name="rows[1][]">
                    <p>Beschrijving:</p><textarea class="form-control" type="textarea" name="rows[1][]" id="message"  maxlength="3000" rows="3"></textarea>
                </div>
                <!--<input type="submit" value="Export to CSV" />-->
                <button type="submit" class="btn btn-warning" value="Export to CSV">Genereer CSV</button>
            </form>
        </div>
    </div>
</div>
<footer>
    <small>&copy; Copyright 2018, Ramazan Demir - Ordina Belgium</small>
</footer>
</body>
</html>