<?php
include("navbar.php");
require './connect.php';
?>

<head>
    <style>
        *{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>


<main>
    <div class="container">

    <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong><?=$_SESSION['message'];?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php unset($_SESSION['message']);endif; ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center"><h3>EVENT LIST</h3></div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Event</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Venue</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM events";
                                    $query_run = mysqli_query($conn,$query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $event)
                                        {
                                ?>
                                            <tr>
                                                <td><?= $event['ename'] ?></td>
                                                <td><?= $event['edate'] ?></td>
                                                <td><?= $event['etime'] ?></td>
                                                <td><?= $event['evenue'] ?></td>
                                                <td><?= $event['edetails'] ?></td>
                                                <td>
                                                    <a href="editEvent.php?ename=<?=$event['ename']?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="./event.php" method="POST" class="d-inline">
                                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" 
                                                            data-bs-target="#exampleModal">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                <?php
                                        }
                                    }
                                    else{ 
                                        echo "<div class='alert alert-warning' role='alert'>
                                            No Events added yet.
                                        </div>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Event?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to delete the Event - <?=$event['ename']?>? This action cannot be undone.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form action="./event.php" method="POST" class="d-inline">
            <button type="submit" class="btn btn-danger" name="delete" value="<?=$event['ename']?>"
                data-bs-toggle="modal" data-bs-target="#exampleModal">
                Delete
            </button>
        </form>
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>