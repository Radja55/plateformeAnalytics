// public/js/sidebar.js
document.addEventListener('DOMContentLoaded', function () {
    // Sélectionnez tous les liens avec la classe 'submenu-link'
    var submenuLinks = document.querySelectorAll('.submenu-link');

    // Ajoutez un écouteur d'événements à chaque lien 'submenu-link'
    submenuLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            // Empêchez le comportement par défaut du lien
            event.preventDefault();

            // Trouvez le sous-menu correspondant à ce lien
            var submenu = link.nextElementSibling;

            // Vérifiez si le sous-menu est actuellement visible
            if (submenu.style.display === 'block') {
                // Masquer le sous-menu s'il est actuellement visible
                submenu.style.display = 'none';
            } else {
                // Afficher le sous-menu s'il est actuellement masqué
                submenu.style.display = 'block';
            }
        });
    });
});  