document.addEventListener('DOMContentLoaded', function () {
    var submitButton = document.getElementById('btn-submit');
    if (submitButton) {
        submitButton.addEventListener('click', function (event) {
            if (!validate()) {
                event.preventDefault();
            }
        });
    }
});

function validate() {
    console.log('appel ok');
    var identifiantElement = document.getElementById("identifiant");
    var str = identifiantElement.value;

    if (!str.replace(/\s+/, '').length) {
        alert("Le champ identifiant est vide!");
        return false;
    } 

    // Changer la couleur du texte de l'identifiant
    if (str.length >= 3) {
        identifiantElement.style.color = "green";
    } else {
        identifiantElement.style.color = "red"; // Réinitialiser la couleur si la longueur n'est pas suffisante
    }

    var password = document.getElementById("password").value; 
    console.log(password.length);
    if (password.length < 6) {
        alert("Le champ mot de passe doit contenir au moins 6 caractères!");
        return false;
    }

    var email = document.getElementById("email").value; 
    var emailConfirmation = document.getElementById("email-confirm").value; 
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

    if (!email.match(validRegex)) {
        alert("Le mail saisi n'est pas un email valide!");
        return false;
    }

    if (!email.replace(/\s+/, '').length) {
        alert("Le champ email est vide ");
        return false;
    }

    if (email != emailConfirmation) {
        alert("Le champ email et le champ email confirmation ne sont pas identiques");
        return false;
    }

    // Le reste de votre logique de validation...
    return true;
}
