<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Event Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>Add New Event</h1>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="event.php" method="post">
                            <div class="col-md-6">
                                <label for="ename" class="form-label">Event Name:</label>
                                    <input type="text" class="form-control" name="ename" id="ename" placeholder="Enter Event Name" autofocus required>
                            </div>
                            <div class="col-md-3">
                                <label for="edate" class="form-label">Event Date:</label>
                                    <input type="date" class="form-control" name="edate" id="edate" required>
                            </div>
                            <div class="col-md-3">
                                <label for="etime" class="form-label">Event Time:</label>
                                    <input type="time" class="form-control" name="etime" id="etime" required>
                            </div>
                            <div class="col-12">
                                <label for="evenue" class="form-label">Event Venue:</label>
                                    <input type="text" class="form-control" name="evenue" id="evenue" placeholder="Enter Venue of event" required>
                            </div>                    
                            <div class="mb-3">
                                <label for="edetails" class="form-label">Additional Information:</label>
                                    <textarea class="form-control" name="edetails" id="edetails" rows="5"  placeholder="Event Details"></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <a href="admin.php" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-success" name="add">Add Event</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>