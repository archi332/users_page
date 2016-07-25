<h1>Add User To Base</h1>

<form action="/add_user/check" method="post" enctype=multipart/form-data>
	<div class="form-group">
		<label>Email address:</label>
		<input type="email" name="email" class="form-control" placeholder="Email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
	</div>
	<div class="form-group">
		<label>First name:</label>
		<input type="text" name="first_name" class="form-control" placeholder="first name" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name'];  ?>">
	</div>
	<div class="form-group">
		<label>Second name:</label>
		<input type="text" name="sec_name" class="form-control" placeholder="Second name"  value="<?php if(isset($_POST['sec_name'])) echo $_POST['sec_name']; ?>">
	</div>
	<div class="form-group">
		<label>Date of bithday:</label>
		<input type="date" name="date_b" class="form-control" max="2012-06-04" min="1992-05-29" value="<?php if(isset($_POST['date_b'])) echo $_POST['date_b']; ?>">
	</div>

	<div class="form-group">
		<label>Select your city:</label>
		<select class="form-control" name="country_id">
			<?php foreach($data['countries'] as $val) : ?>
			<option value="<?php echo $val['id'] ?>"><?php echo $val['country'] ?></option>

			<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
		<label>Post index:</label>
		<input type="number" name="post_index" class="form-control" placeholder="index"  value="<?php if(isset($_POST['post_index'])) echo $_POST['post_index']; ?>">
	</div>
	<div class="form-group">
		<label for="exampleInputFile">Upload image:</label>
		<input type="file" id="exampleInputFile" name="foto_name">
		<p class="help-block">Select file of your profile</p>
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>


<?php
if (isset($data['errors'])){
	echo '<div style="margin-top: 5%"><b>Error list:</b><br><div style="color: #ff0001">';
	foreach($data['errors'] as $value){
		echo  $value . '<br>';
	}
	echo '</div></div>';


echo '<hr /> <pre>';

//var_dump($data['errors']);
	echo '<br><br><br><br>';
//	var_dump($_POST);
	var_dump($_FILES);
}
?>