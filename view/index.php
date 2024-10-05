<?php
include("../config/db.php");
include("../controllers/fileUpload.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/comman.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

    <title>Xml Import file</title>
</head>
<body>
<form action="index.php" method="post" enctype="multipart/form-data" id="recordbook">
    <label class="form-label" for="customFile">Upload File : </label>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload file" name="submit" id="uploadFile">
    <br/>
    <br/>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Create Record</button>
        <br/>
        <br/>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Auther</label>
                        <input type="text" class="form-control" id="author" placeholder="Enter Auther">
                    </div>
                    <div class="form-group">
                        <label for="">title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="">genre</label>
                        <input type="text" class="form-control" id="genre" placeholder="Enter genre">
                    </div>
                    <div class="form-group">
                        <label for="">price</label>
                        <input type="text" class="form-control" id="price" placeholder="Enter Price">
                    </div>
                    <div class="form-group">
                        <label for="">publish Date</label>
                        <input type="date" class="form-control" id="publish_date" placeholder="Enter Date">
                    </div>
                    <div class="form-group">
                        <label for="">description</label>
                        <textarea col="5" row="30" type="text" class="form-control" id="description" placeholder="Enter Description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="createRecord">Create</button>
                </div>
            </div>
            </div>
        </div>
</form>

<!-- edit  form -->
<div class="modal fade" id="EditexampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="recordID" value="">
                    <div class="form-group">
                        <label for="">Auther</label>
                        <input type="text" class="form-control" id="updateauthor" placeholder="Enter Auther">
                    </div>
                    <div class="form-group">
                        <label for="">title</label>
                        <input type="text" class="form-control" id="updatetitle" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="">genre</label>
                        <input type="text" class="form-control" id="updategenre" placeholder="Enter genre">
                    </div>
                    <div class="form-group">
                        <label for="">price</label>
                        <input type="text" class="form-control" id="updateprice" placeholder="Enter Price">
                    </div>
                    <div class="form-group">
                        <label for="">publish Date</label>
                        <input type="date" class="form-control" id="updatepublish_date" placeholder="Enter Date">
                    </div>
                    <div class="form-group">
                        <label for="">description</label>
                        <textarea col="5" row="30" type="text" class="form-control" id="updatedescription" placeholder="Enter Description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateRecord">Update</button>
                </div>
            </div>
            </div>
        </div>

    <!-- datatable -->
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Author</th>
                <th>title</th>
                <th>genre</th>
                <th>price</th>
                <th>publish_date</th>
                <th>description</th>
                <th>record_type</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM book where deleted_at='0'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
              $i=1;
              while($row = $result->fetch_assoc()) {
                ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row["author"]; ?></td>
                <td><?php echo $row["title"]; ?></td>
                <td><?php echo $row["genre"]; ?></td>
                <td><?php echo $row["price"]; ?></td>
                <td><?php echo $row["publish_date"]; ?></td>
                <td><?php echo $row["description"]; ?></td>
                <td><?php echo $row["record_type"]; ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($row["created_at"])); ?></td> 
                <td><?php echo date('d-m-Y H:i:s', strtotime($row["updated_at"])); ?></td>
                <td>
                    <button id="editRecord" data-toggle="modal" data-target="#EditexampleModal" value="<?php echo $row["id"]; ?>">Edit</button> 
                    &nbsp;&nbsp;&nbsp; <button type="button" id="DeleteRecord" value="<?php echo $row["id"]; ?>"> Delete </button></td>
                
            </tr>
                <?php
                $i++;
              }
            } else {
              ?>
            <tr>
                <td colspan="11" align="center"><?php echo "Record not Found" ?></td>
            </tr>

              <?php
            }
            ?>
           
        </tbody>
    </table>

</body>
</html>

<script type="text/javascript">
    new DataTable('#example');
</script>


