<?php
$search = $_POST['search'];
$search = addslashes($search);
$search = htmlspecialchars($search);
$search = stripslashes($search);
   if($search == ''){
       exit("Почніть вводити запит");
   }
$db = mysqli_connect("localhost","root","","db_busn");
//mysqli_select_db("db_busn",$db);
mysqli_query($db,"SET NAMES utf8");
$arr_id_users = 0;
$querys = "SELECT * FROM `bu_users_setings` WHERE `name` LIKE '%" . $search . "%' 
            OR `posada` LIKE '%" . $search . "%'
            OR `serFac` LIKE '%" . $search . "%'
            OR `serKaf` LIKE '%" . $search . "%'
            AND `hidden` = '0'";
$query = mysqli_query($db,$querys);
if(mysqli_num_rows($query) > 0){
    $row = mysqli_fetch_array($query);
    ?>
    <ul id="gallery" class="gallery ui-helper-reset ui-helper-clearfix">
    <?php
    do{
        $arr_id_users .= $row['id_user'].' ';
        ?>
                <li class="ui-widget-content ui-corner-tr">
                    <h5 class="ui-widget-header"><?=$row['name']?></h5>
                    <img src="<?=$row['ava']?>" alt="<?=$row['name']?>" width="150" height="150">
                    <a href="link/to/trash/script/when/we/have/js/off"  title="Delete this image" class="ui-icon ui-icon-trash">Delete image</a>
                    <input type="hidden" name="userRead[]" value="<?=$row['id_user']?>" />
                </li>
<?php
    }while($row = mysqli_fetch_array($query));
    ?>
    </ul>
    <button type="submit" name="okOgoloshenya" value="okOgoloshenya" class="btn btn-primary">Публікувати всім</button>
<?php
}else{
    echo "Немає результатів";
}
