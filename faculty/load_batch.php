<?php
    $db = mysqli_connect("localhost", "root", "", "id15169349_peamigos"); //Connection variable

    $output = '';

    if(isset($_POST["team_id"]))
    {
        if($_POST["team_id"] != '')
        {
            $query = "select * from teams where team_id = '".$_POST["team_id"]."' order by team_id asc";
        }
        else
        {
            $query = "select * from teams order by team_id asc";
        }
        $result = mysqli_query($db,$query);

        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                $output .= '
                <div class="col-md-3" id="show_teams" style="padding-left: 170px; display:inline-flex">
                <form method="post" action="index.php?action=add&id='.$row["team_id"].'">
                        <div style="border: 1px solid #333; background-color:#f1f1f1; border-radius: 5px; padding: 16px; height:200px; width: 300px">
                            <h4 class="text-primary">'.$row["team_name"].'</h4>
                            <h4 class="text-success">Batch: '.$row["batch"].'</h4>
                            <h4 class="text-info">Year: '.$row["year"].'</h4>
                            <a type="submit" name = "submit" class="btn-get-started scrollto">View Team</a>
                        </div>
                </form>
            </div>
                            ';
            }
        }
        echo $output;
    }
?>
