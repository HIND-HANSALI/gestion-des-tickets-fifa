function createModule() {
    // initialiser Match form
    document.getElementById('form').reset();

    // Afficher le boutton save
    document.getElementById('saveMatch').style.display = 'block';
    document.getElementById('editMatch').style.display = 'none';

    // Ouvrir modal form
    $('#matchModal').modal('show');
}
function createModuleTeams(){
    // initialiser Match form
    document.getElementById('form').reset();

    // Afficher le boutton save
    document.getElementById('saveTeams').style.display = 'block';
    document.getElementById('editTeams').style.display = 'none';

    // Ouvrir modal form
    $('#teamModal').modal('show');
}
