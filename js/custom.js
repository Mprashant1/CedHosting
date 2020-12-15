$(document).ready(function(){
    $('#mobileotp1').click(function(){
        var res=$('label[for="mobile"]').html();
        $.ajax({
            url:"process.php",
            type: "post",
            dataType:'json',
            data:{action:1, res:res},
            success: function(result) {
                console.log(response);
            }
        })
    })
    $('#emailotp1').click(function(){
        var res=$('label[for="email"]').html();
        console.log(res);
        $.ajax({
            url:"process.php",
            type: "post",
            dataType:'json',
            data:{value:1, res:res},
            success: function(result) {
                console.log(response);
            }
        })
    })
		
		
})