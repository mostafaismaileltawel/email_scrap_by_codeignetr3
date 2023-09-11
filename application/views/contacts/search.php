

<title>index</title>
  

<table class="table table-dark">
		<thead>
		<tr>
			<th scope="col">id</th>
			<th scope="col">First Name</th>
			<th scope="col">Last Name</th>
			<th scope="col">EMAIL</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($search as $data): ?>
			<tr>
				<td><?=$data['id']?></td>
				<td><?=$data['first_name']?></td>
				<td><?=$data['last_name']?></td>
				<td><?=$data['email']?></td>
				</td>
				<td>
				<?php echo form_open('Extractemail/delete_email/' . $data['id']); ?>
				<button type="submit" class="btn btn-outline-danger">delete
				</button>
			</form>
			</td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>


