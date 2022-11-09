<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
	header('location:index.php');
}
 
include_once('../controller/user_controller.php');
 
$user = new User();
 
//fetch user data
$sql = "SELECT * FROM users WHERE id = '".$_SESSION['user']."'";
$row = $user->details($sql);
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="path/to/select2.min.css" rel="stylesheet" />
    <script src="path/to/select2.min.js"></script>
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>LOADRUNNER</title>
</head>
<body>
    <nav class="navbar" style="background: #21294b; color: white;">
        <div>
            
        </div>
        <div class="container-fluid d-flex">
            <img src="../img/logo.png" style="height: 41px;" alt="">
            <span class="navbar-brand mb-0 h1 position-absolute" style="left: 65px;">Web Tours</span>
        </div>
    </nav>
    <?php
		    	if(isset($_SESSION['message'])){
		    		?>
		    			<div class="alert alert-info text-center" style="position: absolute; z-index: 1; width: 100%;">
					        <?php echo $_SESSION['message'].' '.$row['fname']; ?>
					    </div>
		    		<?php
 
		    		unset($_SESSION['message']);
		    	}
		    ?>
    <nav class="navbar" style="background: #e9e2ec; width: 244px; position: absolute; height: 100%;">
        <div class="form position-absolute" style="top: 87px; left: 13px;">
            <a href="./flights.php" class="btn btn-default mt-2" style="border: 1px solid; width: 90px; height: 30px;">Flights</a>
            <br>
            <a class="btn btn-default mt-2" style="border: 1px solid; width: 90px;height: 30px;">Itenerary</a>
            <br>
            <a href="./home.php" class="btn btn-default mt-2" style="border: 1px solid; width: 90px;height: 30px;">Home</a>
            <br>
            <a class="btn btn-default mt-2" style="border: 1px solid; width: 90px;height: 30px;">Sign off</a> 
            <br>
            <a href="../controller/logout_controller.php" class="btn btn-default mt-2" style="border: 1px solid; width: 90px;height: 30px;">Logout</a>
        </div>
    </nav>
    <div class="container" style="position: absolute;width: 1271px;background: #e9e2ec;height: 100%;right: 1px;">
        <div class="section" style="position: absolute; top: 150px; left: 170px;">
            <h1>
                Find Flights
            </h1>
            <form action="" method="post" class="d-flex">
                <div class="row1">
                    <div class="1">
                        <label for="dep_city">Departure City: </label>
                        <select name="" id="dep_city" class="">
                            <option></option>
                            <option value="Sydney">Sydney</option>
                            <option value="Seattle">Seattle</option>
                        </select>
                    </div>
                    <div class="2 mt-3">
                        <label for="arr">Arrival City: </label>
                        <select name="" id="arr" class="">
                            <option></option>
                            <option value="Sydney">Sydney</option>
                            <option value="Seattle">Seattle</option>
                        </select>
                    </div>
                    <div class="3 mt-3">
                        <label for="nopass">No. of Passengers</label>
                        <input type="number" name="" id="">
                    </div>
                    <div class="form-check mt-3">
                        <label for="radios">Seating Preference</label>
                        <div class="radios" id="radios">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Aisle
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Window
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    None
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row2 ms-3">
                    <div class="dep_date d-flex">
                        <label for="depdate">Departure Date: </label>
                        <input type="date" class="depdate" id="depdate">
                    </div>
                    <div class="ret_date mt-3">
                        <label for="retdate">Return Date: </label>
                        <input type="date" name="retdate" id="retdate">
                    </div>
                    <div class="rtrip">
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="isrountrip" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Roundtrip ticket
                        </label>
                    </div>
                    <div class="tseat mt-4">
                        <label for="radios">Type of Seat</label>
                        <div class="radios" id="radios">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    First
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Business
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Coach
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        $('#dep_city').select2({
            placeholder: 'Please select a destination',
            allowClear: false,
            tags: true
        });
        $('#arr').select2({
            placeholder: 'Please select a destination',
            allowClear: false,
            tags: true
        });
    </script>
    <script>
        $("#depdate").flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });
    </script>
</body>
</html>