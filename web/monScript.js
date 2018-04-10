$(function(){
    $('#submitProjetAjout').click(function(){

        var descriptionProjetAjout = $('#descriptionProjetAjout').val();
        var titreProjetAjout = $('#titreProjetAjout').val();
        $.ajax({
            url: Routing.generate('projet_ajout'),
            data: {
                descriptionProjetAjout:descriptionProjetAjout,
                titreProjetAjout:titreProjetAjout
            },
            type:'POST',
            dataType: 'JSON',
            success: function (result) {
                if(result === "ajout_projet_ok"){
                    setTimeout(function(){
                        window.location.reload();
                    }, 500);
                }
            }
        });
    });
});

$(function(){
    $('.openModalDeleteProjet').click(function(){
        $('#idProjetDelete').html($(this).attr('data-id'));
    })
});

$(function(){
    $('.openModalEditProjet').click(function(){
        console.log();
        $('#idProjetModif').html($(this).attr('data-id'));
        $.ajax({
            url: Routing.generate('projet_get'),
            data: {
                idProjetModif: parseInt($(this).attr('data-id')),
            },
            type:'POST',
            dataType: 'JSON',
            success: function (result) {
                $('#titreProjetModif').val(result.titre);
                $('#descriptionProjetModif').val(result.description);
            }
        });
    })
});

$(function(){
    $('#submitProjetDelete').click(function(){

        var idProjetDelete = $('#idProjetDelete').text();
        $.ajax({
            url: Routing.generate('projet_supprimer'),
            data: {
                idProjetDelete: parseInt(idProjetDelete),
            },
            type:'POST',
            dataType: 'JSON',
            success: function (result) {
                if(result === "suppression_projet_ok"){
                    setTimeout(function(){
                        window.location.reload();
                    }, 500);
                }
            }
        });
    });
});

$(function(){
    $('#submitProjetModif').click(function(){

        var descriptionProjetModif = $('#descriptionProjetModif').val();
        var titreProjetModif = $('#titreProjetModif').val();
        $.ajax({
            url: Routing.generate('projet_modif'),
            data: {
                descriptionProjetModif:descriptionProjetModif,
                titreProjetModif:titreProjetModif,
                idProjetModif: parseInt($('#idProjetModif').text())
            },
            type:'POST',
            dataType: 'JSON',
            success: function (result) {
                if(result === "modif_projet_ok"){
                    setTimeout(function(){
                        window.location.reload();
                    }, 500);
                }
            }
        });
    });
});