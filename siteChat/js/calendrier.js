// public/js/calendar.js
document.addEventListener("DOMContentLoaded", function() {
    const dateContainer = document.getElementById('selected-date');
    const periodSelector = document.getElementById('period-selector');

    // Afficher le calendrier lorsque l'utilisateur clique sur le champ de saisie de date
    dateContainer.addEventListener('click', function() {
        dateContainer.type = 'date'; // Afficher le calendrier natif du navigateur
    });

    // Appliquer la date sélectionnée et la période choisie
    document.getElementById('date-form').addEventListener('submit', function(e) {
        e.preventDefault(); // Empêcher le formulaire de se soumettre normalement
        const selectedDate = dateContainer.value;
        const selectedPeriod = periodSelector.value;
        console.log('Date sélectionnée:', selectedDate);
        console.log('Période sélectionnée:', selectedPeriod);
        // Vous pouvez faire d'autres actions ici, comme récupérer les données d'analyse pour la date sélectionnée
    });
});
