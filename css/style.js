
.btn{
	color: #000;
	background-color: #fff;
	border-color: #0BA9F9;
	padding: 6px 20px;
   }
  .btn:focus{
	color: #fff;
	background-color: #0BA9F9;
	border-color: #0BA9F9;
  }
  
  $(document).ready(function(){
     $('#type').on('change'.function(){
		 var c_id=$(this).val();
		 if(c_id)
		 {
			 $.get("aj.php",{type:c_id},function(data){
			 $('#fare').val()=data;
			 });
		 }
			
	 });
   
   });
