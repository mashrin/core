<?php require_once("../../includes/session.php");?>
<?php require_once("../../includes/db_connection.php");?>
<?php require_once("../../includes/functions.php");?>
<?php confirm_logged_in(); ?>
<?php
$event_set = find_all_events();
?>
<?php
    $current_user = $_SESSION["username"];
    $name_query = "SELECT * FROM users WHERE username = '{$current_user}' LIMIT 1";
    $name_result = mysqli_query($conn, $name_query);
    confirm_query($name_result);
    $name_title = mysqli_fetch_assoc($name_result);
    $first_name = explode(" ", $name_title['sname']);
        
?>
<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['yesno'])) { $yesno = $_POST['yesno']; }
    if ($yesno=="yes") {
        if((isset($_POST['submit']))&&(isset($_FILES['uploaded_file']))&&(isset($_POST['branch']))&&(isset($_POST['club']))){
            
                $title = $_POST['title'];
                $content = $_POST['content'];
                $start_date_time = $_POST['start_date_time'];
                $end_date_time = $_POST['end_date_time'];
                $branch = implode(" ",$_POST['branch']);
                $club = implode(" ", $_POST['club']);
                $name = $conn->real_escape_string ($_FILES['uploaded_file']['name']);
                $mime = $conn->real_escape_string ($_FILES['uploaded_file']['type']);
                $data = $conn->real_escape_string(file_get_contents($_FILES ['uploaded_file']['tmp_name']));
                $size = intval($_FILES['uploaded_file']['size']);
                $buzz_username = $_SESSION['username'];
                date_default_timezone_set('Asia/Calcutta');
                $buzz_time = date("Y-m-d\TH:i:s");
                if($content !=''){
                    $query = "INSERT INTO notify (title, content, start_date_time, end_date_time, branch, club, name, mime, size, data, buzz_username, buzz_time)";
                    $query .= " VALUES ('{$title}', '{$content}', '{$start_date_time}', '{$end_date_time}', '{$branch}', '{$club}', '{$name}', '{$mime}', '{$size}', '{$data}', '{$buzz_username}', '{$buzz_time}')";
                    $sql = mysqli_query($conn, $query);
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                            
        } elseif ((isset($_POST['submit']))&&(isset($_FILES['uploaded_file']))&&(isset($_POST['branch']))&&(empty($_POST['club']))) {
            
                $title = $_POST['title'];
                $content = $_POST['content'];
                $start_date_time = $_POST['start_date_time'];
                $end_date_time = $_POST['end_date_time'];
                $branch = implode(" ",$_POST['branch']);
                $club = "xyz";
                $name = $conn->real_escape_string ($_FILES['uploaded_file']['name']);
                $mime = $conn->real_escape_string ($_FILES['uploaded_file']['type']);
                $data = $conn->real_escape_string(file_get_contents($_FILES ['uploaded_file']['tmp_name']));
                $size = intval($_FILES['uploaded_file']['size']);
                $buzz_username = $_SESSION['username'];
                date_default_timezone_set('Asia/Calcutta');
                $buzz_time = date("Y-m-d\TH:i:s");
                if($content !=''){
                    $query = "INSERT INTO notify (title, content, start_date_time, end_date_time, branch, club, name, mime, size, data, buzz_username, buzz_time)";
                    $query .= " VALUES ('{$title}', '{$content}', '{$start_date_time}', '{$end_date_time}', '{$branch}', '{$club}', '{$name}', '{$mime}', '{$size}', '{$data}', '{$buzz_username}', '{$buzz_time}')";
                    $sql = mysqli_query($conn, $query);
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                        
        } elseif ((isset($_POST['submit']))&&(isset($_FILES['uploaded_file']))&&(empty($_POST['branch']))&&(isset($_POST['club']))) {
            
               $title = $_POST['title'];
                $content = $_POST['content'];
                $start_date_time = $_POST['start_date_time'];
                $end_date_time = $_POST['end_date_time'];
                $branch = "xyz";
                $club = implode(" ", $_POST['club']);
                $name = $conn->real_escape_string ($_FILES['uploaded_file']['name']);
                $mime = $conn->real_escape_string ($_FILES['uploaded_file']['type']);
                $data = $conn->real_escape_string(file_get_contents($_FILES ['uploaded_file']['tmp_name']));
                $size = intval($_FILES['uploaded_file']['size']);
                $buzz_username = $_SESSION['username'];
                date_default_timezone_set('Asia/Calcutta');
                $buzz_time = date("Y-m-d\TH:i:s");
                if($content !=''){
                    $query = "INSERT INTO notify (title, content, start_date_time, end_date_time, branch, club, name, mime, size, data, buzz_username, buzz_time)";
                    $query .= " VALUES ('{$title}', '{$content}', '{$start_date_time}', '{$end_date_time}', '{$branch}', '{$club}', '{$name}', '{$mime}', '{$size}', '{$data}', '{$buzz_username}', '{$buzz_time}')";
                    $sql = mysqli_query($conn, $query);
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                } 
                        
        } elseif ((isset($_POST['submit']))&&(isset($_FILES['uploaded_file']))&&(empty($_POST['branch']))&&(empty($_POST['club']))) {
            
               $title = $_POST['title'];
                $content = $_POST['content'];
                $start_date_time = $_POST['start_date_time'];
                $end_date_time = $_POST['end_date_time'];               
                $name = $conn->real_escape_string ($_FILES['uploaded_file']['name']);
                $mime = $conn->real_escape_string ($_FILES['uploaded_file']['type']);
                $data = $conn->real_escape_string(file_get_contents($_FILES ['uploaded_file']['tmp_name']));
                $size = intval($_FILES['uploaded_file']['size']);
                $buzz_username = $_SESSION['username'];
                date_default_timezone_set('Asia/Calcutta');
                $buzz_time = date("Y-m-d\TH:i:s");
                if($content !=''){
                    $query = "INSERT INTO notify (title, content, start_date_time, end_date_time, name, mime, size, data, buzz_username, buzz_time)";
                    $query .= " VALUES ('{$title}', '{$content}', '{$start_date_time}', '{$end_date_time}', '{$name}', '{$mime}', '{$size}', '{$data}', '{$buzz_username}', '{$buzz_time}')";
                    $sql = mysqli_query($conn, $query);
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                        
        }
    } elseif ($yesno = "no") {
        if((isset($_POST['submit']))&&(isset($_POST['branch']))&&(isset($_POST['club']))){
            
                $title = $_POST['title'];
                $content = $_POST['content'];
                $start_date_time = $_POST['start_date_time'];
                $end_date_time = $_POST['end_date_time'];
                $branch = implode(" ", $_POST['branch']);
                $club = implode(" ", $_POST['club']);
                $buzz_username = $_SESSION['username'];
                date_default_timezone_set('Asia/Calcutta');
                $buzz_time = date("Y-m-d\TH:i:s");
                if($content !=''){
                    $query = "INSERT INTO notify (title, content, start_date_time, end_date_time, branch, club, buzz_username, buzz_time)"; 
                    $query .=" VALUES ('{$title}', '{$content}', '{$start_date_time}', '{$end_date_time}', '{$branch}', '{$club}', '{$buzz_username}', '{$buzz_time}')";
                    $sql = mysqli_query($conn, $query);
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                       
        } elseif ((isset($_POST['submit']))&&(isset($_POST['branch']))&&(empty($_POST['club']))) {
            
                $title = $_POST['title'];
                $content = $_POST['content'];
                $start_date_time = $_POST['start_date_time'];
                $end_date_time = $_POST['end_date_time'];
                $branch = implode(" ", $_POST['branch']);
                $club = "xyz";
                $buzz_username = $_SESSION['username'];
                date_default_timezone_set('Asia/Calcutta');
                $buzz_time = date("Y-m-d\TH:i:s");
                if($content !=''){
                    $query = "INSERT INTO notify (title, content, start_date_time, end_date_time, branch, club, buzz_username, buzz_time)"; 
                    $query .=" VALUES ('{$title}', '{$content}', '{$start_date_time}', '{$end_date_time}', '{$branch}', '{$club}', '{$buzz_username}', '{$buzz_time}')";
                    $sql = mysqli_query($conn, $query);
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                        
        } elseif ((isset($_POST['submit']))&&(empty($_POST['branch']))&&(isset($_POST['club']))) {
            
                $title = $_POST['title'];
                $content = $_POST['content'];
                $start_date_time = $_POST['start_date_time'];
                $end_date_time = $_POST['end_date_time'];
                $branch = "xyz";
                $club = implode(" ", $_POST['club']);
                $buzz_username = $_SESSION['username'];
                date_default_timezone_set('Asia/Calcutta');
                $buzz_time = date("Y-m-d\TH:i:s");
                if($content !=''){
                    $query = "INSERT INTO notify (title, content, start_date_time, end_date_time, branch, club, buzz_username, buzz_time)"; 
                    $query .=" VALUES ('{$title}', '{$content}', '{$start_date_time}', '{$end_date_time}', '{$branch}', '{$club}', '{$buzz_username}', '{$buzz_time}')";
                    $sql = mysqli_query($conn, $query);
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                        
        } elseif ((isset($_POST['submit']))&&(empty($_POST['branch']))&&(empty($_POST['club']))) {
            
                $title = $_POST['title'];
                $content = $_POST['content'];
                $start_date_time = $_POST['start_date_time'];
                $end_date_time = $_POST['end_date_time'];
                $buzz_username = $_SESSION['username'];
                date_default_timezone_set('Asia/Calcutta');
                $buzz_time = date("Y-m-d\TH:i:s");
                if($content !=''){
                    $query = "INSERT INTO notify (title, content, start_date_time, end_date_time, buzz_username, buzz_time)"; 
                    $query .=" VALUES ('{$title}', '{$content}', '{$start_date_time}', '{$end_date_time}', '{$buzz_username}', '{$buzz_time}')";
                    $sql = mysqli_query($conn, $query);
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                        
        }
    }
         
}   
?>
<?php
    $query = "SELECT * FROM notify ORDER BY id DESC";
    $result = mysqli_query($conn, $query);
    confirm_query($result);
    $filter_query = "SELECT * FROM users WHERE username = '{$current_user}' LIMIT 1";
    $filter_result = mysqli_query($conn, $filter_query);
    confirm_query($filter_result);
    $filter_array = mysqli_fetch_assoc($filter_result);
    date_default_timezone_set('Asia/Calcutta');
    $delete_time = date("Y-m-d\TH:i:s");
    $work = "DELETE  FROM notify WHERE end_date_time < '{$delete_time}'";
    mysqli_query($conn, $work);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Cambuzz" />
    <meta name="author" content="" />
    <title>Cambuzz</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style-core.css">
    <link rel="stylesheet" href="assets/css/style-theme.css">
    <link rel="stylesheet" href="assets/css/style-forms.css">
    
    <!-- Buzz button -->
    <link rel="stylesheet" type="text/css" href="assets/css/buttoncreatebuzz.css" />
    <link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css" />
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
    
  
    <script>
    $.noConflict();
    </script>
</head>

<body>
    <div class="page-container">
        <div class="sidebar-menu">
            <div class="sidebar-menu-inner" style="font-family: 'Montserrat', sans-serif">
                <header class="logo-env">
                    <!-- logo -->
                    <div class="logo">
                        <a href="buzz.php">
                            <h1 style="font-family: 'Pacifico', sans-serif; font-weight: 200px; color: white; margin-top: -2px; font-size:25px;">vitcc cambuzz</h1>
                        </a>
                    </div>
                    <!-- logo collapse icon -->
                    <div class="sidebar-collapse">
                        <a href="#" class="sidebar-collapse-icon">
                            <!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                            <i class="entypo-menu"></i>
                        </a>
                    </div>
                    <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                    <div class="sidebar-mobile-menu visible-xs">
                        <a href="#" class="with-animation">
                            <!-- add class "with-animation" to support animation -->
                            <i class="entypo-menu"></i>
                        </a>
                    </div>
                </header>
                <div class="sidebar-user-info">
                    <div class="sui-normal">
                        <div class="user-link">
                            <?php
                                if (empty($name_title["data_propic"])) { 
                            ?>
                                    <img src="assets/images/nopic.png" class="img-circle" height="200px" width="100px" style="border-radius: 100%;" />
                            <?php
                                } elseif (isset($name_title["data_propic"])) {
                                        echo '<img src="data:image/jpeg;base64,' . base64_encode($name_title['data_propic']) . '" class="img-circle" height="200px" width="100px"  style="border-radius: 100%;"/>';        
                                }
                            ?>
                            <span>Welcome,</span>
                            <strong><?php echo htmlentities($first_name[0]); ?></strong>
                        </div>
                    </div>
                    <div class="sui-hover inline-links animate-in">
                        <a href="settings.php">
                            <i class="entypo-pencil"></i> Account Settings
                        </a>
                        <span class="close-sui-popup">&times;</span>
                       
                    </div>
                </div>
                <ul id="main-menu" class="main-menu">
                    <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                    <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                    <li>
                        <a href="buzz.php">
                            <i class="entypo-megaphone"></i>
                            <span class="title">Buzz</span>
                        </a>
                    </li>
                    <li>
                        <a href="track_teacher.php">
                            <i class="entypo-graduation-cap"></i>
                            <span class="title">Track Teacher</span>
                        </a>
                    </li>
                    <li>
                        <a href="quora.php">
                            <i class="entypo-publish"></i>
                            <span class="title">Ask a question</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content">
            <div class="row">
                <!-- Profile Info and Notifications -->
                <!-- Raw Links -->
                <div class="col-md-6 col-sm-4 clearfix hidden-xs" style="float: right;">
                    <ul class="list-inline links-list pull-right">
                        <!-- Language Selector -->
                        <li>
                            <a href="settings.php">
                            Settings <i class="entypo-cog right"></i>
                        </a>
                            <li>
                                <a href="logout.php">
                            Log Out <i class="entypo-logout right"></i>
                        </a>
                            </li>
                    </ul>
                </div>
            </div>
            <hr />
            <!-- main content starts here -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="morph-button morph-button-overlay morph-button-fixed">
                        <button type="button"><span style="font-family: 'Montserrat', sans-serif;">Create a buzz</span></button>
                        <div class="morph-content">
                            <div>
                                <div class="content-style-overlay">
                                    <div class="heading-button-buzz">
                                        <span class="icon icon-close">Close the overlay</span>
                                        <h2>Create a notification for all</h2>
                                        <style>
                                        .ms-container .ms-list {
                                            width: 135px;
                                            height: 205px;
                                        }
                                        
                                        .post-save-changes {
                                            float: right;
                                        }
                                        
                                        @media screen and (max-width: 789px) {
                                            .post-save-changes {
                                                float: none;
                                                margin-bottom: 20px;
                                            }
                                        }

                                        #createbuzz{
                                            font-family: 'Montserrat', sans-serif;
                                        }

                                        #datestyling{
                                            border: none;
                                            font-size: 12px;
                                        }
                                        </style>
                                        <form method="post" action="buzz.php" enctype="multipart/form-data" id="createbuzz">
                                            <!-- Title and Publish Buttons -->
                                            <div class="row">
                                                <div class="col-sm-2 post-save-changes">
                                                    <input type="submit" name="submit" value="Submit" class="btn btn-green btn-lg btn-block btn-icon"> 
                                                    <i class="entypo-check" style="padding: 10px 10px; font-size: 15px; line-height: 1.33; border-radius: 3px; color: white; right: 10px; top: 0; height: 100%; background-color: #007d3d; position: absolute;"></i>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control input-lg" name="title" placeholder="Title" required />
                                                </div>
                                            </div>
                                            <br />
                                            <!-- WYSIWYG - Content Editor -->
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <textarea class="form-control wysihtml5" rows="10" data-stylesheet-url="assets/css/wysihtml5-color.css" name="content" id="post_content" placeholder="Information" style="font-size: 15px;" required /></textarea>
                                                </div>
                                            </div>
                                            <br />
                                            <!-- Metaboxes -->
                                            <div class="row">
                                                <!-- Metabox :: Publish Settings -->
                                                <div class="col-sm-4">
                                                    <div class="panel panel-primary" data-collapsed="0">
                                                        <div class="panel-heading">
                                                            <div class="panel-title">
                                                                Buzz Timing
                                                            </div>
                                                            <div class="panel-options">
                                                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <p>Start Date</p>
                                                            <div class="input-group">
                                                                <!-- <input type="text" class="form-control datepicker" data-format="D, dd MM yyyy">
                                                                <div class="input-group-addon">
                                                                    <a href="#"><i class="entypo-calendar"></i></a>
                                                                </div> -->
                                                                <div class="date-and-time">
                                                                    <input id="datestyling"type="datetime-local" name="start_date_time" min="<?php date_default_timezone_set('Asia/Calcutta'); echo date('Y-m-d\TH:i:s'); ?>" required />                                    
                                                                </div>
                                                            </div>
                                                            <br />
                                                            <p>End Date</p>
                                                            <div class="input-group">
                                                                <div class="date-and-time">
                                                                    <input id="datestyling" type="datetime-local" name="end_date_time" min="<?php date_default_timezone_set('Asia/Calcutta'); echo date('Y-m-d\TH:i:s'); ?>" required />
                                                                </div>
                                                            </div>
                                                            <br />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Metabox :: Poster Image -->
                                                <div class="col-sm-4">
                                                    <div class="panel panel-primary" data-collapsed="0">
                                                        <div class="panel-heading" style="display: inline-block;">
                                                            <div class="panel-title">
                                                                Upload your poster
                                                            </div>
                                                            <ul class="icheck-list" style="display: inline-flex;">
                                                                <li style="margin-right: 10px; margin-left: 30px;">
                                                                    <input tabindex="7" class="icheck" type="radio" id="yes" name="yesno" value="yes">
                                                                    <label for="minimal-radio-1">Yes</label>
                                                                </li>
                                                                <li>
                                                                    <input tabindex="8" class="icheck" type="radio" id="no" name="yesno" value="no" checked>
                                                                    <label for="minimal-radio-1">No</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="col-sm-6">
                                                            </div>
                                                            <div class="fileinput fileinput-new" data-provides="fileinput" id="poster_box" style="display: none;">
                                                                <div class="fileinput-new thumbnail" style="max-width: 310px; height: 160px;" data-trigger="fileinput">
                                                                    <img src="http://placehold.it/320x160" alt="...">
                                                                </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px"></div>
                                                                <div>
                                                                    <span class="btn btn-white btn-file">
                                                                    <span class="fileinput-new">Select image</span>
                                                                    <span class="fileinput-exists">Change</span>
                                                                    <input type="file" name="uploaded_file" id="poster" accept=".jpeg, .jpg, .bmp, .png" />
                                                                    </span>
                                                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Metabox :: Branch -->
                                                <div class="col-sm-2">
                                                    <div class="panel panel-primary" data-collapsed="0">
                                                        <div class="panel-heading">
                                                            <div class="panel-title">
                                                                Related to any Branch?
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="scrollable" data-height="200" data-scroll-position="right" data-rail-color="#333" data-rail-opacity=".9" data-rail-width="8" data-rail-radius="10" data-autohide="0">
                                                                <ul class="icheck-list" style="text-align: left;">
                                                                    <li>
                                                                        <input tabindex="5" type="checkbox" name="branch[]" value="CSE" class="icheck" id="minimal-checkbox-1">
                                                                        <label for="minimal-checkbox-1">CSE</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="branch[]" value="ECE" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">ECE</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="branch[]" value="ME" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">ME</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="branch[]" value="EEE" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">EEE</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="branch[]" value="CIVIL" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">CIVIL</label>
                                                                    </li>
<li>
                                                                        <input tabindex="6" type="checkbox" name="branch[]" value="MBA" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">MBA</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="branch[]" value="MCA" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">MCA</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="branch[]" value="MS" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">MS</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="branch[]" value="LAW" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">LAW</label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Metabox :: Club -->
                                                <div class="col-sm-2">
                                                    <div class="panel panel-primary" data-collapsed="0">
                                                        <div class="panel-heading">
                                                            <div class="panel-title">
                                                                Related to any Club?
                                                            </div>
                                                            <div class="panel-options">
                                                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="scrollable" data-height="200" data-scroll-position="right" data-rail-color="#333" data-rail-opacity=".9" data-rail-width="8" data-rail-radius="10" data-autohide="0">
                                                                <ul class="icheck-list" style="text-align: left;">
                                                                    <li>
                                                                        <input tabindex="5" type="checkbox" name="club[]" value="LUG" class="icheck" id="minimal-checkbox-1">
                                                                        <label for="minimal-checkbox-1">Linux User Group (LUG)</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="club[]" value="NSS" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">National Service Scheme</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="club[]" value="Dance" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">Dance Club</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="club[]" value="Music" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">Music Club</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="club[]" value="Sports" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">Sports Club</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="club[]" value="DebSoc" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">Debate Society</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="club[]" value="Automotive" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">Society of Automotive Engineers</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="club[]" value="Dramatic" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">Dramatic Club</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="club[]" value="Health" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">Health Club</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="club[]" value="Arts" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">The Fine Arts Club</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="club[]" value="English" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">English Literary Association</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="club[]" value="Android" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">Android Club</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="club[]" value="Code" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">Code Y-Gen Club</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="club[]" value="Event" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">Event Managers' Club</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="club[]" value="Robotics" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">Robotics Club</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="club[]" value="Woman" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">Woman Development Cell</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="club[]" value="Entrepreneurship" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">National Entrepreneurship Network</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="club[]" value="VITeach" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">VITeach</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="club[]" value="Quiz" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">Quiz Club</label>
                                                                    </li>
                                                                    <li>
                                                                        <input tabindex="6" type="checkbox" name="club[]" value="NCC" class="icheck" id="minimal-checkbox-2">
                                                                        <label for="minimal-checkbox-2">NCC</label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="profile-env">
                    <section class="profile-feed">
                        <div class="profile-stories">
                         <?php
                            while($notification = mysqli_fetch_assoc($result)) {       
                                $arbranch = $notification['branch'];
                                $arclub = $notification['club'];
                                $ar1 = array("$arbranch $arclub");
                                $sent2 = implode(" ", $ar1);
                                $ar2branch = $filter_array['filter_branch'];
                                $ar2club = $filter_array['filter_club'];
                                $ar2 = array("$ar2branch $ar2club");
                                $sent1 = implode(" ", $ar2);
                                $out = explode(" ", $sent1);
                                $size_array = sizeof($out);
                                for ($m=0; $m < $size_array; $m++) { 
                                    $sry = array("$out[$m] $sent2 ");
                                    $temp = $out[$m];
                                    $n2 = strlen($temp);
                                    $s = implode(" ", $sry);
                                    $n = strlen($s);
                                    $Z = new SplFixedArray($n);
                                    $Z[0] = $n;
                                    $L = 0;
                                    $R = 0;
                                    for ($i= 1; $i < $n; $i++) { 
                                        if ($i> $R) {
                                            $L = $R = $i;
                                            while ($R < $n && $s[$R-$L+$i]==$s[$R-$L]) {
                                                $R++;
                                            }
                                            $Z[$i] = $R-$L;
                                            $R--;           
                                        } else {
                                            $k = $i-$L;
                                            if ($Z[$k]<$R-$i+1) {
                                                $Z[$k] = $Z[$i];
                                            } else {
                                                $L = $i;
                                                while ($R < $n && $s[$R-$L+$i]==$s[$R-$L]) {
                                                    $R++;
                                                }
                                                $Z[$i] = $R-$L;
                                                $R--;
                                            }
                                        }
                                    } 
                                    $flag=0;    
                                    for ($i=1; $i < $n ; $i++) { 
                                        if ($Z[$i]>$n2) {                                              
                                            if (empty($notification['data'])) { 
                                                $buzz_user = $notification["buzz_username"];
                                                $name_print_query = "SELECT * FROM users WHERE username = '{$buzz_user}' LIMIT 1";
                                                $name_print_result = mysqli_query($conn, $name_print_query);
                                                confirm_query($name_print_result);
                                                $name_print_title = mysqli_fetch_assoc($name_print_result);
                                                if ($buzz_user==$current_user) { ?>
                                                    <article class="story">
                                                    <aside class="user-thumb">
                                                    <?php                
                                                    if (empty($name_print_title["data_propic"])) { ?>
                                                        <img src="assets/images/nopic.png" height="44px" width="44px" alt="" class="img-circle">
                                                        <?php
                                                    } elseif (isset($name_print_title["data_propic"])) {
                                                        echo '<img src="data:image/jpeg;base64,' . base64_encode($name_print_title['data_propic']) . '" height="44px" width="44px" alt="" class="img-circle">';         
                                                    }
                                                    ?>
                                                    </aside>
                                                    <div class="story-content">
                                                    <header>
                                                    <div class="publisher" style="color: #303641; font-family: 'Montserrat', sans-serif;">
                                                    <span style="font-weight: bold;"><?php echo $name_print_title["sname"]; ?></span><span style="color: #9b9fa6;">&nbsp;posted a buzz!</span>
                                                    <em style="color: #9b9fa6;">
                                                        <?php 
                                                            $post_time = strtotime($notification['buzz_time']);
                                                            echo date("d M, y | h:i a", $post_time);
                                                         ?>
                                                    </em>
                                                    </div>
                                                    </header>
                                                    <div class="story-main-content">
                                                    <p style="font-size: 30px; font-family: 'Playfair Display', serif; font-weight: bold; line-height: 1.3; color: black;"><?php echo $notification["title"]; ?></p>
                                                    <p><?php echo $notification["content"]. " "; ?>                                                
                                                    </p>                                                
                                                    <b style="margin-top: 10px; display: block; margin-left: auto; margin-right: auto; font-family:'Montserrat', sans-serif">
                                                    <?php
                                                    $timestamp_start = strtotime($notification["start_date_time"]);
                                                    $timestamp_end = strtotime($notification["end_date_time"]); ?>
                                                    <span style="padding: 5px; font-size: 12px; background-color: #00a651; color: white; border-radius: 5px; float: left;">
                                                    Starting on: <?php echo date("l, d M, y | h:i a", $timestamp_start); ?>
                                                    </span>
                                                    <span style="padding: 5px; font-size: 12px; background-color: #e85657; color: white; border-radius: 5px; float: right;">
                                                    Ending on: <?php echo date("l, d M, y | h:i a", $timestamp_end); ?>
                                                    </span>
                                                      </b>                                
                                                    </div>            
                                                    </div>                                                                                                   
                                                    </article>
                                                    <a href="delete_event.php?id=<?php echo urlencode($notification["id"]); ?>" onclick="return confirm('Are you sure?');">Delete</a>
                                                    <hr>
                                        <?php   } else { ?>
                                                    <article class="story">
                                                    <aside class="user-thumb">
                                                    <?php                
                                                    if (empty($name_print_title["data_propic"])) { ?>
                                                        <img src="assets/images/nopic.png" height="44px" width="44px" alt="" class="img-circle">
                                                        <?php
                                                    } elseif (isset($name_print_title["data_propic"])) {
                                                        echo '<img src="data:image/jpeg;base64,' . base64_encode($name_print_title['data_propic']) . '" height="44px" width="44px" alt="" class="img-circle">';         
                                                    }
                                                    ?>
                                                    </aside>
                                                    <div class="story-content">
                                                    <header>
                                                    <div class="publisher" style="color: #303641; font-family: 'Montserrat', sans-serif;">
                                                    <span style="font-weight: bold;"><?php echo $name_print_title["sname"]; ?></span><span style="color: #9b9fa6;">&nbsp;posted a buzz!</span>
                                                    <em style="color: #9b9fa6;">
                                                        <?php 
                                                            $post_time = strtotime($notification['buzz_time']);
                                                            echo date("d M, y | h:i a", $post_time);
                                                         ?>
                                                    </em>
                                                    </div>
                                                    </header>
                                                    <div class="story-main-content">
                                                    <p style="font-size: 30px; font-family: 'Playfair Display', serif; font-weight: bold; line-height: 1.3; color: black;"><?php echo $notification["title"]; ?></p>
                                                    <p><?php echo $notification["content"]. " "; ?>                                                
                                                    </p>                                                
                                                    <b style="margin-top: 10px; display: block; margin-left: auto; margin-right: auto; font-family:'Montserrat', sans-serif">
                                                    <?php
                                                    $timestamp_start = strtotime($notification["start_date_time"]);
                                                    $timestamp_end = strtotime($notification["end_date_time"]); ?>
                                                    <span style="padding: 5px; font-size: 12px; background-color: #00a651; color: white; border-radius: 5px; float: left;">
                                                    Starting on: <?php echo date("l, d M, y | h:i a", $timestamp_start); ?>
                                                    </span>
                                                    <span style="padding: 5px; font-size: 12px; background-color: #e85657; color: white; border-radius: 5px; float: right;">
                                                    Ending on: <?php echo date("l, d M, y | h:i a", $timestamp_end); ?>
                                                    </span>
                                                      </b>                                
                                                    </div>            
                                                    </div>                                                
                                                    </article>
                                                    <hr> <?php
                                                }
                                                
                                            } elseif (isset($notification['data'])) { 
                                                $buzz_user = $notification["buzz_username"];
                                                $name_print_query = "SELECT * FROM users WHERE username = '{$buzz_user}' LIMIT 1";
                                                $name_print_result = mysqli_query($conn, $name_print_query);
                                                confirm_query($name_print_result);
                                                $name_print_title = mysqli_fetch_assoc($name_print_result);
                                                if ($buzz_user==$current_user) { ?>
                                                    <article class="story">
                                                    <aside class="user-thumb">
                                                    <?php
                                                    if (empty($name_print_title["data_propic"])) { ?>
                                                        <img src="assets/images/nopic.png" height="44px" width="44px" alt="" class="img-circle">
                                                        <?php 
                                                    } elseif (isset($name_print_title["data_propic"])) {
                                                        echo '<img src="data:image/jpeg;base64,' . base64_encode($name_print_title['data_propic']) . '" height="44px" width="44px" alt="" class="img-circle">';      
                                                    }
                                                    ?>
                                                    </aside>
                                                    <div class="story-content">
                                                    <header>
                                                    <div class="publisher" style="color: #303641; font-family: 'Montserrat', sans-serif;">
                                                    <span style="font-weight: bold;"><?php echo $name_print_title["sname"]; ?></span><span style="color: #9b9fa6;">&nbsp;posted a buzz!</span>
                                                    <em style="color: #9b9fa6;">
                                                        <?php 
                                                            $post_time = strtotime($notification['buzz_time']);
                                                            echo date("d M, y | h:i a", $post_time);
                                                         ?>
                                                    </em>
                                                    </div>
                                                    </header>
                                                    <div class="story-main-content">
                                                    <p style="font-size: 30px; font-family: 'Playfair Display', serif; font-weight: bold; line-height: 1.3; color: black;"><?php echo $notification["title"]; ?></p>
                                                    <p><?php echo $notification["content"]. " "; ?>
                                                    
                                                    </p>
                                                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($notification['data']) . '" class="img-responsive" ">'; ?>
                                                    <b style="margin-top: 10px; display: block; margin-left: auto; margin-right: auto; font-family:'Montserrat', sans-serif">
                                                    <?php 
                                                    $timestamp_start = strtotime($notification["start_date_time"]);
                                                    $timestamp_end = strtotime($notification["end_date_time"]); ?>
                                                    <span style="padding: 5px; font-size: 12px; background-color: #00a651; color: white; border-radius: 5px; float: left;">
                                                    Starting on: <?php echo date("l, d M, y  |  h:i a", $timestamp_start); ?>
                                                    </span>
                                                    <span style="padding: 5px; font-size: 12px; background-color: #e85657; color: white; border-radius: 5px; float: right;">
                                                    Ending on: <?php echo date("l, d M, y  |  h:i a", $timestamp_end); ?>
                                                    </span>                                                
                                                    </b>
                                                    </div>
                                                    </div>                                                    
                                                    </article>
                                                    <a href="delete_event.php?id=<?php echo urlencode($notification["id"]); ?>" onclick="return confirm('Are you sure?');">Delete</a>
                                                    <hr> <?php
                                                } else { ?>
                                                    <article class="story">
                                                    <aside class="user-thumb">
                                                    <?php
                                                    if (empty($name_print_title["data_propic"])) { ?>
                                                        <img src="assets/images/nopic.png" height="44px" width="44px" alt="" class="img-circle">
                                                        <?php 
                                                    } elseif (isset($name_print_title["data_propic"])) {
                                                        echo '<img src="data:image/jpeg;base64,' . base64_encode($name_print_title['data_propic']) . '" height="44px" width="44px" alt="" class="img-circle">';      
                                                    }
                                                    ?>
                                                    </aside>
                                                    <div class="story-content">
                                                    <header>
                                                    <div class="publisher" style="color: #303641; font-family: 'Montserrat', sans-serif;">
                                                    <span style="font-weight: bold;"><?php echo $name_print_title["sname"]; ?></span><span style="color: #9b9fa6;">&nbsp;posted a buzz!</span>
                                                    <em style="color: #9b9fa6;">
                                                        <?php 
                                                            $post_time = strtotime($notification['buzz_time']);
                                                            echo date("d M, y | h:i a", $post_time);
                                                         ?>
                                                    </em>
                                                    </div>
                                                    </header>
                                                    <div class="story-main-content">
                                                    <p style="font-size: 30px; font-family: 'Playfair Display', serif; font-weight: bold; line-height: 1.3; color: black;"><?php echo $notification["title"]; ?></p>
                                                    <p><?php echo $notification["content"]. " "; ?>
                                                    
                                                    </p>
                                                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($notification['data']) . '" class="img-responsive" ">'; ?>
                                                    <b style="margin-top: 10px; display: block; margin-left: auto; margin-right: auto; font-family:'Montserrat', sans-serif">
                                                    <?php 
                                                    $timestamp_start = strtotime($notification["start_date_time"]);
                                                    $timestamp_end = strtotime($notification["end_date_time"]); ?>
                                                    <span style="padding: 5px; font-size: 12px; background-color: #00a651; color: white; border-radius: 5px; float: left;">
                                                    Starting on: <?php echo date("l, d M, y  |  h:i a", $timestamp_start); ?>
                                                    </span>
                                                    <span style="padding: 5px; font-size: 12px; background-color: #e85657; color: white; border-radius: 5px; float: right;">
                                                    Ending on: <?php echo date("l, d M, y  |  h:i a", $timestamp_end); ?>
                                                    </span>                                                
                                                    </b>
                                                    </div>
                                                    </div>

                                                    </article>
                                                    <hr> <?php
                                                }                   
                                            } 
                                            $flag=1;
                                            break;
                                        }// if 
                                    }// for
                                    if($flag==1)break;        
                                } //for m   
                            } // while
                        ?>   
                        </div>
                    </section>
                </div>
            </div>
            <footer>
            </footer>
        </div>
    </div>
    
    <script src="assets/js/modernizr.custom.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  

    <script src="assets/js/fileinput.js"></script>
    <script src="assets/js/style-custom.js"></script>
    <script src="assets/js/style-demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/classie/1.0.1/classie.min.js"></script>

    <!-- Bottom scripts (common) -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/TweenMax.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="assets/js/joinable.js"></script>
    <script src="assets/js/resizeable.js"></script>
    <script src="assets/js/uiMorphingButton_fixed.js"></script>
    <script src="assets/js/style-api.js"></script>
        
    <!-- Imported scripts on this page -->
    <script type="text/javascript">
    var file = document.getElementById('poster');

    file.onchange = function(e){
        var ext = this.value.match(/\.([^\.]+)$/)[1];
        switch(ext)
        {
            case 'jpg':
            case 'jpeg':
            case 'bmp':
            case 'png':
            case 'tif':
            case 'JPG':
            case 'JPEG':
            case 'BMP':
            case 'PNG':
            case 'TIF':
            
            break;
            default:
            alert('File type not supported, please select an image file.');
            this.value='';
        }
    };
    </script>
    <script type="text/javascript">
        $('#yes').click(function() {
            $('#poster_box').slideDown();
            document.getElementById("poster").setAttribute("required", "");
        });
        $('#no').click(function() {
            $('#poster_box').slideUp();
            document.getElementById("poster").removeAttribute("required");
        });
    </script>
    
    <script>
    (function() {
        var docElem = window.document.documentElement,
            didScroll, scrollPosition;

        // trick to prevent scrolling when opening/closing button
        function noScrollFn() {
            window.scrollTo(scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0);
        }

        function noScroll() {
            window.removeEventListener('scroll', scrollHandler);
            window.addEventListener('scroll', noScrollFn);
        }

        function scrollFn() {
            window.addEventListener('scroll', scrollHandler);
        }

        function canScroll() {
            window.removeEventListener('scroll', noScrollFn);
            scrollFn();
        }

        function scrollHandler() {
            if (!didScroll) {
                didScroll = true;
                setTimeout(function() {
                    scrollPage();
                }, 60);
            }
        };

        function scrollPage() {
            scrollPosition = {
                x: window.pageXOffset || docElem.scrollLeft,
                y: window.pageYOffset || docElem.scrollTop
            };
            didScroll = false;
        };

        scrollFn();

        var el = document.querySelector('.morph-button');

        new UIMorphingButton(el, {
            closeEl: '.icon-close',
            onBeforeOpen: function() {
                // don't allow to scroll
                noScroll();
            },
            onAfterOpen: function() {
                // can scroll again
                canScroll();
                // add class "noscroll" to body
                classie.addClass(document.body, 'noscroll');
                // add scroll class to main el
                classie.addClass(el, 'scroll');
            },
            onBeforeClose: function() {
                // remove class "noscroll" to body
                classie.removeClass(document.body, 'noscroll');
                // remove scroll class from main el
                classie.removeClass(el, 'scroll');
                // don't allow to scroll
                noScroll();
            },
            onAfterClose: function() {
                // can scroll again
                canScroll();
            }
        });
    })();
    </script>
</body>

</html>

<?php
    mysqli_free_result($name_result);
    if (isset ($conn)){
            mysqli_close($conn);
    }
?>