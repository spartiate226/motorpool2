$(function(){
    var restore;
    $('#printbt').click(function() {
        window.print();
    })
    window.onbeforeprint=function(){
        /*restore=document.innerHTML;
        document.innerHTML=$('#printer').html();*/
    }
    window.onafterprint=function(){
        document.innerHTML=restore;
    }
    
});