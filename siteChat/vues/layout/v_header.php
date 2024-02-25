<!-- view/layout/header.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application d'Analyse de Trafic</title>
    <link rel="stylesheet" href="./style/styles.css"> 
</head>
<body>
<header>
    <h1>Application Matomo pour WordPress</h1>
    <div id="date-selector">
        <form id="date-form">
            <label for="selected-date">Date :</label>
            <input type="date" id="selected-date" name="selected-date">
            <label for="period-selector">Période :</label>
            <select id="period-selector">
                <option value="day">Jour</option>
                <option value="week">Semaine</option>
                <option value="month">Mois</option>
                <option value="year">Année</option>
                <option value="period">Période</option>
            </select>
            <button type="submit">Appliquer</button>
        </form>
    </div>
</header>