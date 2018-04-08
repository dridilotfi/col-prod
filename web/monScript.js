$(function(){
    $('#submitProjetAjout').click(function(){

        var descriptionProjetAjout = $('#descriptionProjetAjout').val();
        var titreProjetAjout = $('#titreProjetAjout').val();
        console.log('titre :' + titreProjetAjout);
        console.log('descriptionProjetAjout :' + descriptionProjetAjout);
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
    $('#submitProjetDelete').click(function(){

        var idProjetDelete = $('#idProjetDelete').text();
        console.log(idProjetDelete);
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

