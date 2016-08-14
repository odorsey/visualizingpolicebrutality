<?php $pageName = 'data'; ?>
<?php
include("header.php");
include("connection.php");
?>

<!-- Custom CSS for data.php-->
<link rel="stylesheet" href="css/data.css">

<!-- Google Analytics code -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39247935-4', 'auto');
  ga('send', 'pageview');

</script>

<?php
// $countquery set up
$countquery = "SELECT COUNT(*) as num FROM victim";
$total_pages = mysqli_fetch_assoc(mysqli_query($db,$countquery));
$total_pages = $total_pages['num'];

// Variable set up
$limit = 25;
$targetpage = "data.php";


// GET request set up for each page to $page
if(isset($_GET['page'])) {
  $page = $_GET['page'];
  $offset = $limit * $page;
}
else {
  $page = 0;
  $offset = 0;
}

// setting up pagination, every page is in increments of 25
if($page)
{
  $start = ($page - 1) * $limit;
}
else
{
  $start = 0;
}

// set up $header to automatically sort by lastName when mySQL query runs
$header = "lastName";

// set up sorting via $_GET request
if(isset($_GET['sortby'])) {
  if ($_GET['sortby'] == 'firstName')
  {
      $header = "firstName";
  }
  elseif ($_GET['sortby'] == 'lastName')
  {

      $header = "lastName";
  }
  elseif ($_GET['sortby'] == 'sex')
  {
      $header = "sex";
  }
  elseif ($_GET['sortby'] == 'age')
  {
      $header = "age";
  }
  elseif ($_GET['sortby'] == 'killed')
  {
      $header ="killed";
  }
}

// query setup for the table
$query = "SELECT * from victim ORDER by $header ASC LIMIT $start, $limit";
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>The Data</h1>
      <p>The data used in this project is far from comprehensive, but it is my hope that by sharing this data that we can begin to understand police brutality in the context of the African American community and learn how to prevent it.</p>
      <p>You can browse the data below by clicking on the headers to sort the data. Please feel free to download the JSON data file below to use the data in any way that you see fit.</p>
    </div>
  </div>


  <div class="row">
    <div class="col-md-12">
      <table class="table table-condensed table-bordered">
        <thead>
          <tr class="header">
          <?php echo"
          <th><a href='data.php?page=".$page."&sortby=firstName'>First Name</a></th>
          <th><a href='data.php?page=".$page."&sortby=lastName'>Last Name</a></th>
          <th><a href='data.php?page=".$page."&sortby=sex'>Sex</a></th>
          <th><a href='data.php?page=".$page."&sortby=age'>Age</a></th>
          <th><a href='data.php?page=".$page."&sortby=killed'>Killed</a></th>"
          ?>
          </tr>
        </thead>
        <?php include("search.php"); ?>
        <?php if($result = mysqli_query($db,$query)) {
          while ($row = mysqli_fetch_assoc($result))
          {
            echo "<tr class='content'>";
            echo "<td>" . $row['firstName'] . "</td>";
            echo "<td>" . $row['lastName'] . "</td>";
            echo "<td>" . $row['sex'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['killed'] . "</td>";
            echo "</tr>";
          }
          echo "</table>";
        }?>
      </div>
      <div class="row pull-right">
        <div class="col-md-12">
        <?php
        $total = ceil($total_pages / $limit);

        for ($i=1; $i<$total; $i++) {
          echo "<span class='paging'><a href='data.php?page=".$i."&sortby=".$header."'>".$i."</a> </span>";
        }
        ?>
      </div>
    </div>
  </div>
    <div class="row">
      <div class="col-md-12">
        <a href="datajson.php">Want to download the data?</a>
		<br><br><br><br><br><br>
      </div>
    </div>
  </div>

<?php
include("footer.php");
?>
