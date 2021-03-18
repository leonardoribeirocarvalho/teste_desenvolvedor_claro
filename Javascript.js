$('.deletar').on('click',function(event){
    event.preventDefault();

    var Link=$(this).attr('href');

    if(confirm("Deseja mesmo apagar esse registro?")){
        window.location.href=Link;
    }else{
        return false;
    }
});