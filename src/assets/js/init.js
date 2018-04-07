$(document).ready(function() {
    var input = $('#mailTo');
    var chipsDiv = $('#chips');
    var emailArray = [];
    var emailToast = document.querySelector('#emailToast');
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var i = 0;


    $('#mailForm').submit(function(e) {
        console.log(emailArray);
        e.preventDefault();
        var mailFrom = $('#mailFrom').val();
        if(emailArray.length !== 0 && mailFrom.length !== 0) {
            if(!re.test(mailFrom)) {
                emailToast.MaterialSnackbar.showSnackbar({message: "Email d'envoi invalide"});
                return ;
            }
            var data = "";
            for(var j = 0; j < emailArray.length; j++) {
                data += emailArray[j] + ";";
            }
            $('#mailTo').val(data.slice(0,-1));
            $(this).unbind('submit').submit();
        } else {
            emailToast.MaterialSnackbar.showSnackbar({message: "Veuillez remplir 'From' et 'To'"});
        }
    });

    input.keypress(function(e) {
        if(e.which === 13) {
            e.preventDefault();

            var email = input.val();

            if(!re.test(email)) {
                emailToast.MaterialSnackbar.showSnackbar({message: "Email incorrect"});
                return ;
            }
            if($.inArray(email, emailArray) !== -1) {
                emailToast.MaterialSnackbar.showSnackbar({message: "Email déjà ajouté"});
                return ;
            }

            emailArray.push(email);

            input.val("");

            chipsDiv.append('\
                <span class="mdl-chip mdl-chip--deletable">\
                    <span class="mdl-chip__text">' + email + '</span>\
                    <button id="delete' + i + '" type="button" class="mdl-chip__action"><i class="material-icons">cancel</i></button>\
                </span>\
            ');

            $('#delete' + i).click(function() {
                emailArray.splice($.inArray(email, emailArray), 1);
                $('#mailTo').val("");
                $(this).parent().remove();
            });

            i++;
        }
    });
});