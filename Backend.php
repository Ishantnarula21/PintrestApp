<?php

require "./composer/vendor/autoload.php";
require './composer/vendor/autoload.php';

use Carbon\Carbon;

use Intervention\Image\ImageManagerStatic as Image;

class Pintrest
{
    //declaring database properties
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "pintrestApp";
    public $con;

    //Making databse Connection
    function __construct()
    {
        $this->con = new mysqli($this->servername, $this->username, $this->password, $this->database);
        return $this->con;
    }

    //Register User Method
    public function Register()
    {
        $username = $_REQUEST['username'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $gender = ucfirst($_REQUEST['gender']);
        $fullname = $_REQUEST['fullname'];
        if ($gender == "gender") {
            echo "Please Select Gender";
        } else {
            //Validating Whether The username or email already Exists.
            $query = "select username, email from login where username='$username' OR email='$email'";
            $result = $this->con->query($query);
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($row['username'] == $username && $row['email'] != $email) {
                        echo "Username Is Already Taken";
                    }
                    if ($row['email'] == $email && $row['username'] != $username) {
                        echo "Email Already Registered, Try Using New Email";
                    }
                    if ($row['email'] == $email && $row['username'] == $username) {
                        echo "User Already Exists";
                    }
                    break;
                }
            } else {
                $query = "insert into login (username,email,password,gender,fullname) VALUES('$username','$email','$password','$fullname','$gender')";
                $result = $this->con->query($query);
                if ($result == true) {
?>
                    <script>
                        alert("User Registered Successfully");
                        window.location.href = 'Login.php';
                    </script>
            <?php
                }
            }
        }
    }

    //Login Method
    public function Login()
    {
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $query = "select * from login where email='$username' and password='$password'";
            $result = $this->con->query($query);
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                $query = "select username from login where username='$username' OR email='$username'";
                $result = $this->con->query($query);
                $row = $result->fetch_assoc();
                $_SESSION['Login'] = $row['username'];
                header('Location:index.php');
            } else {
                echo "Wrong credentials ";
            }
        } else {
            $query = "select * from login where username='$username' and password='$password'";
            $result = $this->con->query($query);
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                $_SESSION['Login'] = $username;
                header('Location:index.php');
            } else {
                echo "Wrong credentials ";
            }
        }
    }

    //upload method
    public function Upload()
    {
        if (!empty($_SESSION['Login'])) {
            //getting form values
            $date = date("d / m / Y");
            $time = Carbon::now('Asia/kolkata');
            $finaltime = $time->locale('fr')->isoFormat('MMMDo YYYY, H:mm, a');
            $timexplode = explode(",", $finaltime);
            $time = $timexplode[1];
            $day = $timexplode[2];
            $title = $_REQUEST['title'];
            $visibility = $_REQUEST['visibility'];
            $username = $_SESSION['Login'];
            if ($visibility == "Visibility") {
                echo "Select Visibility Type (Public or Private)";
            } else {
                //getting extension of every image
                $filename = $_FILES['image']['name'];
                $filepath = $_FILES['image']['tmp_name'];
                $imagename = explode(".", $filename);
                $ext = $imagename[1];

                //getting table id
                $query = "show table status like 'upload' ";
                $result = $this->con->query($query);
                $row = $result->fetch_assoc();
                $id = $row['Auto_increment'];
                $newfilename = $id . "." . $ext;

                //inserting record
                $query = "insert into upload (title,imagename,visibility,username,date,time,day) VALUES('$title','$newfilename','$visibility','$username','$date','$time','$day')";
                $result = $this->con->query($query);
                if ($result == true) {
                    //moving uploaded file to upload folder
                    move_uploaded_file($filepath, 'upload/' . $filename);
                    echo "file Uploaded";
                }
                $Image = Image::make("upload/" . $filename)->resize(200, 200)->save("upload/" . $newfilename, 100);
                unlink('upload/' . $filename);
            }
        } else {

            ?>
            <script>
                alert("You Have To Sign In First To Upload Images");
                window.location.href = 'Login.php';
            </script>
        <?php
        }
    }

    //forgot pass verification
    public function Verify()
    {
        $name = $_REQUEST['username'];
        $email = $_REQUEST['email'];
        $query = "select * from login where username='$name' and email='$email'";
        $result = $this->con->query($query);
        $row = mysqli_num_rows($result);
        if ($row > 0) {
            $_SESSION['verify'] = $name;
            header('Location:CreatePass.php');
        } else {
        ?>
            <script>
                alert("Your Credentials Does Not Match Any User");
                window.location.href = 'Forgotpass.php';
            </script>
            <?php
        }
    }

    //Create pass
    public function Createpass()
    {
        $username = $_SESSION['verify'];
        $pass = $_REQUEST['pass'];
        $newpass = $_REQUEST['newpass'];
        if ($pass == $newpass) {
            $query = "update login set password='$newpass' where username='$username' ";
            $result = $this->con->query($query);
            if ($result == true) {
            ?>
                <script>
                    alert("Your Password Has Been Updated");
                    window.location.href = 'Login.php';
                </script>
            <?php
            }
        } else {
            echo "Your Password Does Not Match";
        }
    }

    //display
    public function display()
    {
        $query = "select * from upload where visibility='public' ";
        $result = $this->con->query($query);
        return $result;
    }
    public function userdisplay()
    {
        $user = $_SESSION['Login'];
        $query = "select * from login where username='$user' ";
        $result = $this->con->query($query);
        return $result;
    }
    public function Myupload()
    {
        $user = $_SESSION['Login'];
        $query = "select * from upload where username='$user' ";
        $result = $this->con->query($query);
        return $result;
    }

    public function Favdisplay()
    {
        if (!empty($_SESSION['Login'])) {
            $user = $_SESSION['Login'];
            $query = "select up.*,fv.eid,fv.username from favorite fv,upload up where fv.eid=up.id and fv.username='$user' ";
            $result = $this->con->query($query);
            return $result;
        }
    }

    //Favorite add
    public function Favorite($fav)
    {
        if (!empty($_SESSION['Login'])) {
            $query = "select * from upload where id=$fav";
            $result = $this->con->query($query);
            $row = $result->fetch_assoc();
            echo $iname = $row['imagename'];
            $user = $_SESSION['Login'];
            $query = "select * from favorite where imagename='$iname' and username='$user' ";
            $result = $this->con->query($query);
            $row = mysqli_num_rows($result);
            if ($row > 0) {
            ?>
                <script>
                    alert("Image Already Added To Favorites");
                    window.location.href = 'index.php';
                </script>
                <?php
                $_SESSION['fav'] = "true";
            } else {
                $query = "insert into favorite (eid,username,imagename) select id,'$user','$iname' from upload where id=$fav";
                $result = $this->con->query($query);
                if ($result == true) {
                ?>
                    <script>
                        alert("Image Added To Favorites");
                        window.location.href = 'index.php';
                    </script>
<?php
                }
            }
        } else {
            header('Location:Favorite.php');
        }
    }
    public function RemoveFav($fav)
    {
        $query = "delete from favorite where eid=$fav";
        $result = $this->con->query($query);
        if ($result == true) {
            echo "Image Removed";
        }
    }

    //pic info method
    public function Picinfo($id)
    {
        $query = "update upload  set views=views + 1 where id=$id ";
        $result = $this->con->query($query);
        if ($result == true) {
            $query = "select up.*,log.* from upload up,login log where up.id='$id' and log.username=up.username ";
            $result = $this->con->query($query);
            if ($result) {
                $data = $result->fetch_assoc();
            }
            return $data;
        } else {
            echo "Error";
        }
    }
    //upload count
    public function uploadcount()
    {
        $user = $_SESSION['Login'];
        $query = "select * from upload where username='$user'";
        $result = $this->con->query($query);
        $count = mysqli_num_rows($result);
        return $count;
    }
    //upload count
    public function totalviews()
    {
        $user = $_SESSION['Login'];
        $query = "select * from upload where username='$user'";
        $result = $this->con->query($query);
        return $result;
    }

    //profile display
    public function profiledisplay($username)
    {
        $query = "select * from login where username='$username' ";
        $result = $this->con->query($query);
        $row = $result->fetch_assoc();
        return $row;
    }
    //update profile
    public function updateprofile()
    {
        $username = $_REQUEST['username'];
        $user = $_SESSION['Login'];
        $email = $_REQUEST['email'];
        $gender = ucfirst($_REQUEST['gender']);
        $fullname = $_REQUEST['fullname'];
        $query = "update login set username='$username',email='$email',gender='$gender',fullname='$fullname' where username='$user' ";
        $result = $this->con->query($query);
        if ($result == true) {
            echo "Profile Updated";
        }
    }
    //delete post
    public function deletepost($id)
    {
        $query = "select imagename from upload where id=$id";
        $result = $this->con->query($query);
        $row = $result->fetch_assoc();
        if ($result == true) {
            unlink('upload/' . $row['imagename']);
            $query = "delete from upload where id=$id";
            $result = $this->con->query($query);
            if ($result == true) {
                echo "Image deleted";
            }
        }
    }
    //edit post
    public function editpost($id)
    {
        $query = "select * from upload where id=$id";
        $result = $this->con->query($query);
        $row = $result->fetch_assoc();
        return $row;
    }
    //update record
    public function updaterecord()
    {
        if (!empty($_SESSION['Login'])) {
            //getting form values
            $id = $_REQUEST['editid'];
            $date = date("d / m / Y");
            $time = Carbon::now('Asia/kolkata');
            $finaltime = $time->locale('fr')->isoFormat('MMMDo YYYY, H:mm, a');
            $timexplode = explode(",", $finaltime);
            $time = $timexplode[1];
            $day = $timexplode[2];
            $title = $_REQUEST['title'];
            $visibility = $_REQUEST['visibility'];
            $username = $_SESSION['Login'];
            if ($visibility == "Visibility") {
                echo "Select Visibility Type (Public or Private)";
            } else {
                $query = "select imagename from upload where id=$id";
                $result = $this->con->query($query);
                $img = $result->fetch_assoc();
                if ($result == true) {
                    //getting extension of every image
                    $filename = $_FILES['image']['name'];
                    $filepath = $_FILES['image']['tmp_name'];
                    $imagename = explode(".", $filename);
                    $ext = $imagename[1];
                    $newfilename = $img['imagename'];

                    //unlinking oldfile

                    unlink('upload/' . $img['imagename']);

                    //inserting record
                    $query = "update upload set title='$title',imagename='$newfilename',visibility='$visibility',username='$username',date='$date',time='$time',day='$day' where id=$id";
                    $result = $this->con->query($query);
                    if ($result == true) {
                        //moving uploaded file to upload folder
                        move_uploaded_file($filepath, 'upload/' . $filename);
                        echo "file Uploaded";
                    }
                    $Image = Image::make("upload/" . $filename)->resize(200, 200)->save("upload/" . $newfilename, 100);
                    unlink('upload/' . $filename);
                }
            }
        }
    }
}
