<?php
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pantalla de bienvenida</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		if (isset($_GET['code'])) {
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v5.0/oauth/access_token?client_id=247010899894301&redirect_uri=https://digitalmtx.com/facebook/pass.php&client_secret=6a5ec6ede096a344b65e7033a2f43175&code='.$_GET['code']);


			$result = curl_exec($ch);
			if (curl_errno($ch)) {
			    echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/oauth/access_token?client_id=247010899894301&client_secret=6a5ec6ede096a344b65e7033a2f43175&grant_type=client_credentials');
			$result = curl_exec($ch);
			curl_close($ch);

			echo '<br>';

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/debug_token?input_token=EAAhoUUY8CuUBALPZAPT8PEASCoaLMS2s3XC2IRsAdvGMN9xqHX3gnrZA62aMVtLMK1ghVIGkwHHEAmpNyquT70IcQqhY3qI3xnxVIv3KLIOjKKGRZAsq9benpb0kMxU2H74OOZBb07XOAiZCv7IDlgFxZBNfiblQ9gQe8mOZBZByqpaSBkawZAQWP2g4XVLpSklsZD&access_token=247010899894301|bZiPzdhAQ7wNAqI_iQo_vMhzMMA');
			$result = curl_exec($ch);
			curl_close($ch);

			echo '<br>';

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v5.0/me?fields=id%2Cname&access_token=EAAhoUUY8CuUBAA1QhGnqUIWSLzRLjSB3RZArV1amfihih7cCC4pQSUehg2Cpd1rTG3Q2LRzTCrBIZBWUZCNz9CFkHXfS0zZAK3VZBilEsyg9q9mGZBZBV1G2ZA32pGPGY5pnp4llEHBldZBytOWROIrc0tJ4b3bt0kFtf0ZBTYDjYNuk3F7LSbzqf0LZBG0ZAMRg3cMCQB4As8DR9dmZBHnJ4fZCPLtZB92OsZAQgSFIwz6Y8SuzjZCH1Iec66hQHUgzhvBGknvcZD');
			$result = curl_exec($ch);
			curl_close($ch);

		}
	?>
</body>
</html>