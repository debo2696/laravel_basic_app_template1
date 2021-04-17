console.log('Running common js');
//$(".btn-menu").click(function(e) {
  //  $(".btn-menu").addClass("ls-toggle-menu");
    //$(this).addClass("");
//});

$(document).ready(function(){
    $('#navbtn').click(function()
    { 
        //var query = $(this).val();
        //if(query != '')
        //{
        //var _token = $('input[name="_token"]').val();    
        var menuflag=0;        
        var themeflag=0;

        if($("body").hasClass("ls-toggle-menu"))
        {
            menuflag=1;
        }
        //alert(leftMenusCookieval);
        /*if(leftMenusCookieval==true)
        {
            setTimeout(function(){ $("body").addClass('ls-toggle-menu'); }, 500);
        }*/
        $.ajax
        ({
            url: 'list/fetch',
            method:'GET',
            data: {mflg:menuflag},
            success: function(data)
            {
                //console.log(data);
            }
        });
    });
    $('#darktheme').click(function(){
        var themeflag=0;
        if($("body").hasClass("theme-dark"))
        {
            themeflag=1;
        }
        $.ajax
        ({
            url: 'list/fetch',
            method:'GET',
            data: {tflg:themeflag},
            success: function(data)
            {
                //console.log(data);
            }
        });
      // });
    });
       /*$(document).on('click', 'li', function(){  
           $('#eml_name').val($(this).text());  
           $('#emlList').fadeOut();  
       });*/  
   
   });
   