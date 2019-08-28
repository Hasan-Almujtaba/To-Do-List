<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="card mt-3 w-75 mx-auto">
			  <div class="card-body">
			    <h4 class="card-title text-center">To Do List</h4>
			    <hr>
				
				<!-- Alert -->
				<?php if( $this->session->flashdata('success') ) : ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <strong>Success!</strong> <?= $this->session->flashdata('success'); ?>.
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
				<?php endif ?>

			    <!-- Button trigger modal -->
			    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTask">
			      Add New Task
			    </button>

				<h5 class="my-2">Currently on process</h5>
				
				<?php if( $uncompleted ) : ?>
				<div class="list-group">
				<?php foreach( $uncompleted as $u ) : ?>
				  <a href="<?= base_url('task/completed/') . $u['id'] ; ?>" class="list-group-item list-group-item-action" data-toggle="tooltip" data-placement="top" title="Click to mark this task as complete" onclick="return confirm('Already completed this task?') "><?= $u['task']; ?> <span class="badge badge-warning clear-fix"><?= $u['time']; ?></span>
				  </a>
				<?php endforeach ?>
				</div>

				<?php else : ?>
				<ul class="list-group">
				  <li class="list-group-item">No other task. Try add one</li>
				</ul>
				<?php endif ?>

				<h5 class="my-2">Completed Task</h5>

				<div class="list-group">
				<?php foreach( $completed as $c ) : ?>
				  <a href="<?= base_url('task/delete/') . $c['id'] ; ?>" class="list-group-item list-group-item-action text-muted" data-toggle="tooltip" data-placement="top" title="Click to delete this task" onclick="return confirm('Delete this completed task?') "><?= $c['task']; ?> <span class="badge badge-success clear-fix">Completed</span>
				  </a>
				<?php endforeach ?>
				</div>

			  </div>
			</div>			
		</div>
	</div>
</div>

<!-- Modal add mew task -->
<div class="modal fade" id="addTask" tabindex="-1" role="dialog" aria-labelledby="addTaskLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addTaskLabel">Add New Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('task'); ?>" method="post">
        	<form>
        	  <div class="form-group">
        	    <input type="text" class="form-control" id="task" placeholder="Enter New Task" name="task">
        	  </div>
        	  <div class="form-group">
        	  	<label for="time">When you want to do it?</label>
        	    <input type="time" class="form-control" id="time" name="time">
        	  </div>
      </div>
      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Add Task</button>
        </form>
      </div>
    </div>
  </div>
</div>