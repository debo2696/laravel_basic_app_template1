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
   
   

   $("#delBtn").click(function(){
        console.log("clicked!");
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");

        $.ajax(
        {
            url: "del/"+id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
            success: function (){
                console.log("it Works");
            }
        });
    });

    /*$( function() {
      var availableTags = autoList;
      $( "#form1" ).autocomplete({
        source: availableTags
      });
    } );*/ //jquery autocomplete
    
});

function edFcn(id)
{
    var edFcnVal=id;
    window.location.href='http://localhost:8000/edit?id='+id;
}

function delFcn(id)
{
	myFunction(id);
	function myFunction(val) {
		let txt;
		
      	if (confirm("Delete this record?")) 
		{
        	txt = "You pressed OK!";
        	window.location.href='http://localhost/webapps/crud_app1/delete_data.php?id='+val;	
		} 
		else 
		{
        	txt = "You pressed Cancel!";
      	}
      /*document.getElementById("demo").innerHTML = txt;*/
    }
}




   