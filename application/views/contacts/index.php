
<style>
    .pagination-links {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination-links a {
        display: inline-block;
        padding: 8px;
        margin: 0 5px;
        background-color: #eee;
        color: #333;
        text-decoration: none;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .pagination-links a:hover {
        background-color: #ccc;
    }

    .pagination-links .active {
		display: inline-block;
    padding: 8px;
    margin: 0 5px;
    background-color: #212529;
    color: #fff;
    text-decoration: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    }
</style>
<title>index</title>
<?php if ($this->session->flashdata('not_found')): ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('not_found'); ?>
    </div>
	<?php endif;?>
	<?php if ($this->session->flashdata('no_data')): ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('no_data'); ?>
    </div>
	<?php endif;?>
<?php if ($this->session->flashdata('file_done')): ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('file_done'); ?>
    </div>
<?php endif;?>
<?php if ($this->session->flashdata('alert')): ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('alert'); ?>
    </div>
<?php endif;?>
<?php if ($this->session->flashdata('no_email')): ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('no_email'); ?>
    </div>
<?php endif;?>
<form method="get" action="<?php echo base_url() . "/Extractemail/search" ?>">
<div class="form-group">
		 <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

		 </div >
      <div class="form-group">
			 <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">

		 </div>

    </form>

<table class="table table-dark">
    <?php if ($information): ?>
		<thead>
		<tr>
			<th scope="col">id</th>
			<th scope="col">First Name</th>
			<th scope="col">Last Name</th>
			<th scope="col">EMAIL</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($information as  $data): ?>

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
        <?php endif;?>
	</table>

<a href="<?=base_url() . 'Extractemail/extract'?>" class="btn btn-primary"> Extract Email</a>
</div>
<div class="pagination-links" style="display: flex; justify-content: center; margin: 20px;">
	<?php echo $this->pagination->create_links(); ?>
     </div>
