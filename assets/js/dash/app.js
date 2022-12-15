// Matches

function createModule() {
    // initialiser Match form
    document.getElementById('form').reset();

    // Afficher le boutton save
    document.getElementById('saveMatch').style.display = 'block';
    document.getElementById('editMatch').style.display = 'none';

    // Ouvrir modal form
    $('#matchModal').modal('show');

    document.getElementById('CapacityHolder').style.display = 'none';

    document.getElementById('ValidatePicture').innerText = '';
    document.getElementById('PictureFileField').setAttribute('style', 'border-radius: 1em !important; background-color: #151521 !important;');
    document.getElementById('PictureFileField').setAttribute('class', 'dropify-wrapper');
    document.getElementById('PictureInput').setAttribute('data-default-file', '');
    document.getElementById('PreviewFileField').setAttribute('style', 'display:none;');
}

function getMatch(id, team1, team2, stade) {
    // Afficher le boutton edit
    document.getElementById('saveMatch').style.display = 'none';
    document.getElementById('editMatch').style.display = 'block';

    // Ouvrir modal form
    $('#matchModal').modal('show');

    document.getElementById('CapacityHolder').style.display = 'block';

    // Récupérer les données du match
    // getting the image path from the image tag and setting it to the input field and previewing it
    let picTitle = document.querySelector(`#MatchPicture${id}`).getAttribute('src');
    /* console.log(picTitle); */
    document.getElementById('PictureInput').setAttribute('src', picTitle);
    document.getElementById('PictureFileField').setAttribute('class', 'dropify-wrapper has-preview');
    document.getElementById('PreviewFileField').setAttribute('style', 'display:block;');
    document.querySelector('.dropify-render').innerHTML = `<img src="${picTitle}" alt="Picture" style="max-height: 100px;"/>`;
    document.getElementById('ValidatePicture').setAttribute('class', 'text-success');
    document.getElementById('ValidatePicture').innerText = 'Photo précédente deja selectionné ! Si vous voulez changer la photo veuillez entrer une nouvelle photo !!';
    document.getElementById('PictureFileField').setAttribute('style', 'height:10rem; border-radius: 1em !important;background-color: #151521 !important;border-color:green;font-size:10px;');

    // getting the match data from the dom and setting it to the input fields
    document.getElementById('Team1Input').value = team1;
    document.getElementById('Team2Input').value = team2;
    document.getElementById('StadeInput').value = stade;

    if (document.querySelector(`#MatchStatus${id}`).innerText == 'Soon') {
        document.getElementById('StatusInput').value = 1;
    } else if (document.querySelector(`#MatchStatus${id}`).innerText == 'In Progress') {
        document.getElementById('StatusInput').value = 2;
    } else {
        document.getElementById('StatusInput').value = 3;
    }
    console.log(id);
    document.getElementById('PriceInput').value = document.querySelector(`#MatchPrice${id}`).innerText;
    document.getElementById('CapacityInput').value = document.querySelector(`#MatchCapacity${id}`).innerText;
    document.getElementById('DateInput').value = document.querySelector(`#MatchTime${id}`).innerText;
    document.getElementById('DescriptionInput').value = document.querySelector(`#MatchDescription${id}`).innerText;
    // setting the id of the match to the hidden input field
    document.getElementById('IdInput').value = id;
}

function deleteMatch(id) {
    // Delete action confirmation using SweetAlert2 combined with Ajax
    // SweetAlert2 pop up
    Swal.fire({
        background: '#1e1e2d',
        color: '#F0F6FC',
        title: 'Are you sure you want to delete this match?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
        // after confirmation is succesfull
        if (result.isConfirmed) {
            Swal.fire({ background: '#1e1e2d', color: '#F0F6FC', title: 'Deleted!', text: 'Your match has been deleted successfully. ', icon: 'error' });
            // using ajax to send data without refresh
            $.ajax({
                url: 'matches.php',
                method: 'POST',
                data: { DeleteMatch: id },
                dataType: 'html',
                success: function () {
                    // removing element from dom
                    document.querySelector(`#Match${id}`).remove();
                },
            });
        }
    });
}

// Teams

function createTeam() {
    // initialiser Match form
    document.getElementById('form').reset();

    // Afficher le boutton save
    document.getElementById('saveTeams').style.display = 'block';
    document.getElementById('editTeams').style.display = 'none';
    // Ouvrir modal form
    $('#teamModal').modal('show');
}

function GetTeam(id) {
    // Afficher le boutton edit
    document.getElementById('saveTeams').style.display = 'none';
    document.getElementById('editTeams').style.display = 'block';

    // Ouvrir modal form
    $('#teamModal').modal('show');

    // getting the team data from the dom and setting it to the input fields
    // getting the image path from the image tag and setting it to the input field and previewing it
    let picTitle = document.querySelector(`#TeamPicture${id}`).getAttribute('src');
    /* console.log(picTitle); */
    document.getElementById('PictureInput').setAttribute('src', picTitle);
    document.getElementById('PictureFileField').setAttribute('class', 'dropify-wrapper has-preview');
    document.getElementById('PreviewFileField').setAttribute('style', 'display:block;');
    document.querySelector('.dropify-render').innerHTML = `<img src="${picTitle}" alt="Picture" style="max-height: 100px;"/>`;
    document.getElementById('ValidatePicture').setAttribute('class', 'text-success');
    document.getElementById('ValidatePicture').innerText = 'Photo précédente deja selectionné ! Si vous voulez changer la photo veuillez entrer une nouvelle photo !!';
    document.getElementById('PictureFileField').setAttribute('style', 'height:10rem; border-radius: 1em !important;background-color: #151521 !important;border-color:green;font-size:10px;');

    document.getElementById('NationalityInput').value = document.querySelector(`#TeamNationality${id}`).innerText;
    document.getElementById('GroupeInput').value = document.querySelector(`#TeamGroupe${id}`).innerText;
    // setting the id of the team to the hidden input field
    document.getElementById('IdInput').value = id;
}

function DeleteTeam(id) {
    // Delete action confirmation using SweetAlert2 combined with Ajax
    // SweetAlert2 pop up
    Swal.fire({
        background: '#1e1e2d',
        color: '#F0F6FC',
        title: 'Are you sure you want to delete this team?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
        // after confirmation is succesfull
        if (result.isConfirmed) {
            Swal.fire({ background: '#1e1e2d', color: '#F0F6FC', title: 'Deleted!', text: 'Your team has been deleted successfully. ', icon: 'error' });
            // using ajax to send data without refresh
            $.ajax({
                url: 'teams.php',
                method: 'POST',
                data: { DeleteTeam: id },
                dataType: 'html',
                success: function () {
                    // removing element from dom
                    document.querySelector(`#Team${id}`).remove();
                },
            });
        }
    });
}

// Stades

function createStade() {
    // initialiser Match form
    document.getElementById('form').reset();

    // Ouvrir modal form
    // $('#teamModal').modal('show');
    document.getElementById('savestade').style.display = 'block';
    document.getElementById('editstade').style.display = 'none';

    // Ouvrir modal form
    $('#stadeModal').modal('show');
}

function Getstade(id, name, location, capacity) {
    // Afficher le boutton edit
    document.getElementById('savestade').style.display = 'none';
    document.getElementById('editstade').style.display = 'block';

    // Ouvrir modal form
    $('#stadeModal').modal('show');
    // getting the team data from the dom and setting it to the input fields
    // getting the image path from the image tag and setting it to the input field and previewing it
    let picTitle = document.querySelector(`#StadePicture${id}`).getAttribute('src');
    /* console.log(picTitle); */
    document.getElementById('PictureInput').setAttribute('src', picTitle);
    document.getElementById('PictureFileField').setAttribute('class', 'dropify-wrapper has-preview');
    document.getElementById('PreviewFileField').setAttribute('style', 'display:block;');
    document.querySelector('.dropify-render').innerHTML = `<img src="${picTitle}" alt="Picture" style="max-height: 100px;"/>`;
    document.getElementById('ValidatePicture').setAttribute('class', 'text-success');
    document.getElementById('ValidatePicture').innerText = 'Photo précédente deja selectionné ! Si vous voulez changer la photo veuillez entrer une nouvelle photo !!';
    document.getElementById('PictureFileField').setAttribute('style', 'height:10rem; border-radius: 1em !important;background-color: #151521 !important;border-color:green;font-size:10px;');

    document.getElementById('NameInput').value = name;
    document.getElementById('locationInput').value = location;
    document.getElementById('CapacityInput').value = capacity;
    // setting the id of the team to the hidden input field
    document.getElementById('IdInput').value = id;
}

function DeleteStade(id) {
    // Delete action confirmation using SweetAlert2 combined with Ajax
    // SweetAlert2 pop up
    Swal.fire({
        background: '#1e1e2d',
        color: '#F0F6FC',
        title: 'Are you sure you want to delete this stade?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
        // after confirmation is succesfull
        if (result.isConfirmed) {
            Swal.fire({ background: '#1e1e2d', color: '#F0F6FC', title: 'Deleted!', text: 'Your stade has been deleted successfully. ', icon: 'error' });
            // using ajax to send data without refresh
            $.ajax({
                url: 'stades.php',
                method: 'POST',
                data: { DeleteStade: id },
                dataType: 'html',
                success: function () {
                    // removing element from dom
                    document.querySelector(`#Stade${id}`).remove();
                },
            });
        }
    });
}

// Users

function setRole(id) {
    // Set Role action confirmation using SweetAlert2 combined with Ajax
    /* var input = document.querySelector(`input[name='UserRole${id}']`); */

    // SweetAlert2 pop up
    Swal.fire({
        background: '#1e1e2d',
        color: '#F0F6FC',
        title: "Are you sure you want to change this user's role?",
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Change it!',
    }).then((result) => {
        // after confirmation is succesfull
        if (result.isConfirmed) {
            Swal.fire({ background: '#1e1e2d', color: '#F0F6FC', title: 'Changed!', text: "User's role has been changed successfully. ", icon: 'success' });
            // using ajax to send data without refresh
            $.ajax({
                url: 'users.php',
                method: 'POST',
                data: { setRole: id },
                dataType: 'html',
            });
        } else {
            location.reload();
        }
    });
}

function DeleteUser(id) {
    // Delete action confirmation using SweetAlert2 combined with Ajax
    // SweetAlert2 pop up
    Swal.fire({
        background: '#1e1e2d',
        color: '#F0F6FC',
        title: 'Are you sure you want to delete this user?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
        // after confirmation is succesfull
        if (result.isConfirmed) {
            Swal.fire({ background: '#1e1e2d', color: '#F0F6FC', title: 'Deleted!', text: 'Your user has been deleted successfully. ', icon: 'error' });
            // using ajax to send data without refresh
            $.ajax({
                url: 'users.php',
                method: 'POST',
                data: { DeleteUser: id },
                dataType: 'html',
                success: function () {
                    // removing element from dom
                    document.querySelector(`#User${id}`).remove();
                },
            });
        }
    });
}
