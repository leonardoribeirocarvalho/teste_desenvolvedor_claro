$(document).ready(function () {
    function atualizaTempo() {
        $.ajax({
            url: 'componentes/acoes/atualizaTempo.php',
            type: 'POST',
            data: { zera: 0 },
            success: function (data) {
                if (data == 1) {
                    swal({
                        title: "Desconectado por inatividade",
                        text: "Refaça login!",
                        icon: "error",
                        buttons:
                        {
                            danger: "Ok"
                        }
                    })
                        .then((value) => {
                            switch (value) {

                                case "danger":
                                    location.href = "processa/autenticacao/sair.php?id=1";
                                    break;

                                default:
                                    location.href = "processa/autenticacao/sair.php?id=1";
                                    break;
                            }
                        });
                }
            }
        });
    } setInterval(atualizaTempo, 10 * 60000);
});
$("#limpaTempo").on("click", function () {
    $.ajax({
        url: 'componentes/acoes/limpaTempo.php',
        type: 'POST',
        data: { zera: 0 }
    });
});