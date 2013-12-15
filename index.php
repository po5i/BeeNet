<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title>BeeNet</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="hackathon.css" rel="stylesheet" type="text/css">
        <script src="jq1.js"></script>
        <script>
	
	  // When the document loads do everything inside here ...
	  $(document).ready(function(){
		
		// When a link is clicked
		$("a.tab").click(function () {
			
			
			// switch all tabs off
			$(".active").removeClass("active");
			
			// switch this tab on
			$(this).addClass("active");
			
			// slide all content up
			$(".content").slideUp();
			
			// slide this content up
			var content_show = $(this).attr("title");
			$("#"+content_show).slideDown();
		  
		});
	
	  });
  </script>
    </head>
    <body>
        <div align="center">
            <img src="APIVITA_logo.jpg" width ="150" height="150">
        </div>
        <br>
            <div id="tabbed_box_2" class="tabbed_box">
        	    <div class="tabbed_area">
            
            	
                <ul class="tabs">
                    <li><a href="#" title="search" class="tab active">BEe Trained</a></li>
                    <li><a href="#" title="be_a_Supplier" class="tab">BEe a Supplier!</a></li>
                </ul>
                
                <div id="search" class="content">
                	<!--ul>
                    	<li><a href=""> Search1 </a></li>
                    	<li><a href=""> Search2 </a></li>
                    </ul-->
                    <iframe src="http://<?php echo $_SERVER['REMOTE_ADDR']?>/apivita/gfsp/finder/search.html?sqr=" frameborder="0" style="width:100%;height:600px;"></iframe>
                </div>
                <div id="be_a_Supplier" class="content">
                	<!--ul>
                    	<li><a href="">Supplier1 </a></li>
                    	<li><a href="">Supplier2 </a></li>
                    	
        			</ul-->
                    <iframe src="http://<?php echo $_SERVER['REMOTE_ADDR']?>/apivita/questionary" frameborder="0" style="width:100%;height:600px"></iframe>
                </div>
               
            
            </div>

        </div>

        <p style="text-align:center;font-size:small;color:white">Developed at Athens Green Hackathon 2013</p>

    </body>
</html>
