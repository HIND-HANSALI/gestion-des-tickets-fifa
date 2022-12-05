function createModule() {
    // initialiser Product form
    document.getElementById('form').reset();

    // Afficher le boutton save
    document.getElementById('saveProduct').style.display = 'block';
    document.getElementById('editProduct').style.display = 'none';

    // Ouvrir modal form
    $('#productModal').modal('show');
}
