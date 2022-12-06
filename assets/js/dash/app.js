function createModule() {
    // initialiser Match form
    document.getElementById('form').reset();

    // Afficher le boutton save
    document.getElementById('saveMatch').style.display = 'block';
    document.getElementById('editMatch').style.display = 'none';

    // Ouvrir modal form
    $('#matchModal').modal('show');
}
