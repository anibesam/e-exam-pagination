<?php include("connection.php")?>

<?php
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else {
    $page=1;
}
$num_per_page=1;
$start_from=($page-1)*1;

$query="SELECT `question_number`,`text` FROM `question` limit $start_from,$num_per_page";
$result = $con->query($query );
$row=$result->fetch_assoc();

$query="SELECT * from choices WHERE question_number=$page";
$result = $con->query($query );
$row2=$result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content = "width=device-width", initial-scale=1.0>
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/csc_cbt.css">
<title>Pagination</title>
</head>
<body>

<h3></h3>

<table>
<tr>
<td><h5><strong><?php echo $row['question_number'];?> <?php echo $row['text'];?></strong>
</h5></td>
</tr>
<?php
do{
    ?>
<tr>
<td>
<?php echo $row2['text']."<BR>";?>

</td>
</tr>
<?php
}while($row2=$result->fetch_array());
?>
</table>

<?php
$pr_query="Select * from question";
$pr_result=$con->query($pr_query) or die($con->error._LINE_);
$total_records = $pr_result->num_rows;
//echo $total_records;

$total_page=($total_records/$num_per_page);
?>
<p align="left"><br><br>
<?php
If($page>1)
{
    echo "<a href='index.php?page=".($page-1)."'class='btn btn-danger'>Previous</a>";
}
//echo $total_page;
for($i=1; $i<$total_page; $i++)
{
    echo "<a href='index.php?page=".$i."' class='btn btn-primary'>$i</a>";
}
If($i>$page)
{
    echo "<a href='index.php?page=".($page+1)."' class='btn btn-success'>Next</a>";
}
?>
</p>

</body>
</html>
