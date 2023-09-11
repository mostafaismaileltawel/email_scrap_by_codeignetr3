<?php if (validation_errors()): ?>
 <div class='alert alert-danger'><?php echo validation_errors(); ?></div>
 <?php endif;?>
 

<div class="row" >
	<div class="col-12">
		<?php echo form_open_multipart('Extractemail/upload_file'); ?>
		<div class="form-group">
			<label >file</label>
			<input type="file" name="files[]" class="form-control"  multiple accept="application/pdf" required>

		</div>

		<div class="form-group">
			<button type="submit" name="upload" class="btn btn-primary">upload</button>
		</div>
		</form>

	</div>
</div>
