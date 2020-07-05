function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
$(window).load(function(){
  
	$('[name="img_url"]').on('change', function() {
		$('img.preview').prop('src', this.value);
	});

});