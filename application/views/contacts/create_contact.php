<div class="row" >
     <div class="col-12">
		 <?php echo form_open('Contacts/create'); ?>
		 <div class="form-group">
			 <label >First Name</label>
			 <input type="text" class="form-control" name="first_name">
			 <span style="color: red;"><?php echo form_error('first_name'); ?></span>

		 </div>
		   <div class="form-group">
			 <label >last Name</label>
			 <input type="text" class="form-control" name="last_name" >
			 <span style="color: red;"><?php echo form_error('last_name'); ?></span>

		 </div>
		 <div class="form-group">
			 <label >Email </label>
			 <input type="email" class="form-control" name="email" >
			 <span style="color: red;"><?php echo form_error('email'); ?></span>

		 </div>
		 <div class="form-group">
		 	<label > phone</label>
		 	<input type="number" class="form-control" name="phone" >
			 <span style="color: red;"><?php echo form_error('phone'); ?></span>

		 </div>
		 <div class="form-group">
		 	<label >remarks</label>
		 	<input type="text" class="form-control" name="remarks" >
			 <span style="color: red;"><?php echo form_error('remarks'); ?></span>

		 </div>
		 <div class="form-group">
		 	<label >Status</label>
		 	<input type="text" class="form-control" name="status" >
			 <span style="color: red;"><?php echo form_error('status'); ?></span>

		 </div>
		 <div class="form-group">
		 <button type="submit" class="btn btn-primary">Create</button>
		 </div>
		 </form>

	 </div>
</div>
