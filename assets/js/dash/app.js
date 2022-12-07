function createModule() {
    // initialiser Match form
    document.getElementById('form').reset();

    // Afficher le boutton save
    document.getElementById('saveMatch').style.display = 'block';
    document.getElementById('editMatch').style.display = 'none';

    // Ouvrir modal form
    $('#matchModal').modal('show');
}

function getMatch(id) {
    // Afficher le boutton edit
    document.getElementById('saveMatch').style.display = 'none';
    document.getElementById('editMatch').style.display = 'block';

    // Ouvrir modal form
    $('#matchModal').modal('show');

    // Récupérer les données du match
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
                url: '../../controller/matchController.php',
                method: 'PUT',
                data: { DeleteMatch: id },
                dataType: 'html',
                success: function () {
                    /* location.reload(); */
                    // removing element from dom
                    /* document.querySelector(`#match${id}`).remove(); */
                },
            });
        }
    });
}
