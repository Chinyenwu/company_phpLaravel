$(document).ready(function(){
 $(".register_teacher").click(function(){
 	if($('.register_teacher').is(':checked')) 
 		{ 	
 			$(".register_position2").hide();
            $(".register_position1").show();
 		}
  		});
 $(".register_staff").click(function(){
 	if($('.register_staff').is(':checked')) 
 		{ 	
 			$(".register_position1").hide();
            $(".register_position2").show();
 		}
  		}); 
 	if($('.register_teacher').is(':checked')) 
 		{ 	
 			$(".register_position2").hide();
            $(".register_position1").show();
 		}
 	else if($('.register_staff').is(':checked')) 
 		{ 	
 			$(".register_position1").hide();
            $(".register_position2").show();
 		}
	});
