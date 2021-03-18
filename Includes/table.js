$(document).ready(function() {
    $('#table1').DataTable({
        "responsive": true,
        "autoWidth": false,
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Não encontrado",
            "info": "Exibindo página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(filtrado de _MAX_ registros no total)",
            "search": "",
            "searchPlaceholder": "Buscar",
            "paginate": {
                "next": "Próximo",
                "previous": "Anterior"
            }
        }
    });
});