
<!DOCTYPE html>
<html>
<head>     
       <meta name="viewport" content="width=device-width, initial-scale=1.0">

       <style>
		   	.goog-te-banner-frame.skiptranslate {
		       	display: none !important;
			    } 
			body {
			top: 0px !important; }
			div#google_translate_element div.goog-te-gadget-simple{background-color:transparent;}
		</style>
		<script type="text/javascript">
			function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages : 'en,hi,gu,sr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
			</script>
			
			<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>
<body>
 
<?php 
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.quotable.io/random',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);

    // echo $response;
    $apiObject = json_decode($response);
  
    // echo $apiObject->content;

   
  
    // Create the size of image or blank image
    $image = imagecreate(1000, 600);
      
    // Set the background color of image
    $background_color = imagecolorallocate($image, 230, 230, 230);
      
    // Set the text color of image
    $text_color = imagecolorallocate($image, 0, 0, 0);
      
    // Function to create image which contains string.
    imagestring($image, 5, 180, 100,  "".$apiObject->content."", $text_color);
    imagestring($image, 5, 260, 120, "- ".$apiObject->author, $text_color);
      

    imagepng($image, "IMAGE.png")
      


    ?>

<div align="center">
  <h2 align="center" id="q">"<?php echo $apiObject->content; ?>"</h2><br>
  <h3 align="center" id="a">- <?php echo $apiObject->author; ?></h3>

  <table>
  <tr>
    <td>
  <button class="notranslate" onClick="window.location.reload();">Generate</button> 
  </td>
  <td>
  </td>
  <td>
  
  <div id="google_translate_element"></div>
  </td>
  <td>
  </td>
  <td>
  <button> <a  class="notranslate" href="IMAGE.png" download="Quotes">Download</a></button>
  </td>
  </tr>
  </table>
</div>
 


  
</body>
</html> 
