$(window).on('load',function(){
    var delayMs = 0;
    
    setTimeout(function(){
        $('#salesModal').modal('show');
    }, delayMs);

        $('#salesModal').modal({
        backdrop: 'static',
        keyboard: false
    })
});   



