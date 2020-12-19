<h2>Edit Student Details Form</h2>
<form action="<?php echo BASEURL;?>/profile/updateDetails"  method="POST">
	<div class="form-group">
		<input type="text" name="name" class="form-control" placeholder="student name..." value="<?php echo $data['data']->name;?>">
		<div class="error">
			<?php if($data['nameError']): echo $data['nameError']; endif; ?>
			
		</div>
	</div>
	<div class="form-group">
		<select name="grade" class="form-control" value="<?php echo $data['data']->grade;?>">
			<option value="">Select grade</option>
			<option value="grade-1">Grade-1</option>
			<option value="grade-2">Grade-2</option>
			<option value="grade-3">Grade-3</option>
			<option value="grade-4">Grade-4</option>
			<option value="grade-5">Grade-5</option>
		</select>
		<div class="error">
			<?php if($data['gradeError']): echo $data['gradeError']; endif; ?>
			
		</div>
	</div>
	<div class="form-group">
		<input type="text" name="schoolName" class="form-control" placeholder="school name..." value="<?php echo $data['data']->schoolName;?>">
		<div class="error">
			<?php if($data['schoolNameError']): echo $data['schoolNameError']; endif; ?>
			
		</div>
	</div>
		<div class="form-group">
		<select name="month" class="form-control" value="<?php echo $data['data']->month;?>">
			<option value="">Month of Examined</option>
			<option value="january">January</option>
			<option value="february">February</option>
			<option value="march">March</option>
			<option value="April">April</option>
			<option value="may">May</option>
			<option value="june">June</option>
			<option value="july">July</option>
			<option value="auguest">Auguest</option>
			<option value="september">September</option>
			<option value="october">October</option>
			<option value="november">November</option>
			<option value="december">december</option>
		</select>
		<div class="error">
			<?php if($data['monthError']): echo $data['monthError']; endif; ?>
		</div>
		<input type="hidden" name="hiddenId" value="<?php echo $data['data']->id ?>">
	</div>
	<div class="form-group">
		<input type="text" name="disease" class="form-control" placeholder="disease name..." value="<?php echo $data['data']->disease;?>">
		<div class="error">
			<?php if($data['diseaseError']): echo $data['diseaseError']; endif; ?>
			
		</div>
	</div>
	<div class="form-group">
		<input type="submit" value="Update details" class="btn btn-primary">
	</div> 
</form>
