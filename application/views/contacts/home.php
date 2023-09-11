
<?php if ($contacts): ?>
<table class="table table-dark">
	<thead>
	<tr>
		<th scope="col">id</th>
		<th scope="col">First Name</th>
		<th scope="col">Last Name</th>
		<th scope="col">Email</th>
		<th scope="col">Phone</th>
		<th scope="col">Remarks</th>
		<th scope="col">status</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($contacts as $contact): ?>
		<tr>
					<td><?=$contact['id']?></td>
			<td><?=$contact['first_name']?></td>
			<td><?=$contact['last_name']?></td>
			<td><?=$contact['email']?></td>
			<td><?=$contact['phone']?></td>
			<td><?=$contact['remarks']?></td>
			<td><?=$contact['status']?></td>
			<td><a href="<?=base_url() . 'Contacts/edit/' . $contact['id']?>" class="btn btn-light">edit</a>
			<td>
				<?php echo form_open('Contacts/delete/' . $contact['id']); ?>
				<button type="submit" class="btn btn-outline-danger">delete
				</button>
			</form>
			</td>
		</tr>
	<?php endforeach;?>
	</tbody>
</table>
<?php endif;?>
<div>
<a href="<?=base_url() . 'contact/create'?>" class="btn btn-primary">create contact</a>
</div>


