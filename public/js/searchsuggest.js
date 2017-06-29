$(document).ready(function(){
var currentSelection = 0;
var currentUrl = '';

var inputbox=document.getElementById("searchit");	
var searchlist=document.getElementById("searchlist");	
var xmlhttp = new XMLHttpRequest();
$("ul").mousedown(function(ev) {
  ev.preventDefault();
  console.log($(this).attr("href"));
  console.log("Click triggered");
});
xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

               data=JSON.parse(this.responseText);
               console.log(data);
               if(data.length==0)
               searchlist.innerHTML="";
               for(var i=0; i<data.length; i++)
	  	 		 {
	  	 			oneresult=data[i];
	  	 			var temp='<li><a href="http://droom.in/product/'+oneresult.listing_alias+'" target="_blank">'+oneresult.product_title+"</a></li>";
	  	 			 if(i==0)
              searchlist.innerHTML="";
             searchlist.innerHTML+=temp;
	  	 			console.log(temp);	  	 			
	  	 		}
            }
        };

//Calling of the function
$("input").keyup( function(e){
    switch(e.keyCode) { 
         // User pressed "up" arrow
         case 38:
            navigate('up');
         break;
         // User pressed "down" arrow
         case 40:
            navigate('down');
         break;
         case 13:
            if(currentUrl != '') {
               loadUrl(currentUrl);
            }
          break;
    
    default:
    var str = document.getElementById('searchit').value;
    if(str.length==0)
    {
      searchlist.innerHTML="";
    }
     if(str.length%2==0)
     {
      xmlhttp.open("GET", "/results/"+str, true);
        xmlhttp.send();
     }
    } 
});

//To cordinate mouse with keyboard -- Not working right now
for(var i = 0; i < $("#menu ul li a").size(); i++) {
   $("#menu ul li a").eq(i).data("number", i);
}
$("#menu ul li a ").hover(
   function () {
      console.log("lalala");
      currentSelection = $(this.li).data("number");
      console.log(currentSelection);
      setSelected(currentSelection);
   },
    function() {
      console.log("bye");
      $("#menu ul li").removeClass("itemhover");
      currentUrl = '';
   }
);

//Keyboard Navigation and Mouse Navigation
function setSelected(menuitem) {
  console.log("Aya with"+menuitem);
   $("#menu ul li a").removeClass("itemhover");
   $("#menu ul li a").eq(menuitem).addClass("itemhover");
   currentUrl = $("#menu ul li a").eq(menuitem).attr("href");
   random=($("#menu ul li a").eq(menuitem).text());
   inputbox.value=random;
}
function navigate(direction) {
   // Check if any of the menu items is selected
   if($("#menu ul li .itemhover").size() == 0) {
      currentSelection = -1;
      console.log("lala");
   }
   
   if(direction == 'up' && currentSelection != -1) {
      if(currentSelection != 0) {
         currentSelection--;
         console.log(currentSelection);
      }
   } else if (direction == 'down') {
      if(currentSelection != $("#menu ul li").size() -1) {
         currentSelection++;
         console.log(currentSelection);
      }
   }
   setSelected(currentSelection);
}
});
	