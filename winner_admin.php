

<h1>Awards Admin Panel</h1>

<form enctype="multipart/form-data" action="create_winner.php" method="POST" accept-charset="utf-8">
	
	<p><label>First Name: </label><input type="text" size="35" name="firstName"></p>
	<p><label>Last Name: </label><input type="text" size="35" name="lastName"></p>
	<p><label>Chapter: </label><input type="text" size="35" name="chapter"></p>
	<p><label>Type of Award: </label><input type="text" size="35" name="typeOfAward"></p>	
	<p><label>Sponsor: </label><input type="text" size="35" name="sponsor"></p>
	
	<p><label>Choose an image to upload: </label><input type="file" name="image"></p>
	<p><label>Input a users narrative: </label></p><textarea cols="100" rows="10" name="bio"></textarea>
	
	
	
	<p><input type="submit" value="Add Winner" /></p>
</form>

