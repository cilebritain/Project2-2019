$('#chargebutton').click(function(){
    $('#charge').css('display','block');
});

function charge_submit(){
    var p=document.getElementById("charge_amount").value;
    if(p==""){alert('please enter a amount');return false;}
    return true;
}