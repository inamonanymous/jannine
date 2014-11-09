<?php
  /*navigation activator*/
    $home             = '';
    $administrator    = '';
    $booK_transaction = '';
    $Inventory        = '';
    $book_issue       = '';
    $book_return      = '';
    $book_list        = '';
    $add_book         = '';
    $manage_books     = '';
    $search_book      = '';
    $create_user      = '';
    $manage_users     = '';
    $setting          = '';
    $change_password  = '';
  if(isset($_GET['page'])){
    $page = mysql_real_escape_string($_GET['page']); //protected from sql injection
    switch($page){
      case 'home':
        $home = 'class="active"';
        break;
      case 'book_transaction':
        $booK_transaction = 'active';
        break;
      case 'inventory':
        $inventory = 'active';
        break;
      case 'administrator':
        $administrator = 'active';
        break;
      case 'setting':
        $setting = 'active';
        break;
      default:
        $home = 'class="active"';
        break;
    }
  }
  if(isset($_GET['sub'])){
    $subpage             = mysql_real_escape_string($_GET['sub']); //protected from sql injection
    $activator        = 'class="active_sub"';
    switch($subpage){
      case 'book_issue':
        $book_issue = $activator;
        break;
      case 'book_return':
        $book_return = $activator;
        break;
      case 'book_list':
        $book_list = $activator;
        break;
      case 'add_book':
        $add_book = $activator;
        break;
      case 'manage_books':
        $manage_books = $activator;
        break;
      case 'search_book':
        $search_book = $activator;
        break;
      case 'create_user':
        $create_user = $activator;
        break;
      case 'manage_users':
        $manage_users = $activator;
        break;
      case 'change_password':
        $change_password = $activator;
        break;
    }
  }
?>
<style>
  .active{
    color: white !important;
  }
  .active_sub{
    color: black !important;
    background-color: #D9230F;
  }
</style>
<div class="navbar navbar-default">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Library Management System</a>
  </div>
  <div class="navbar-collapse collapse navbar-responsive-collapse">
    <ul class="nav navbar-nav">
      <li <?php echo $home; ?> ><a href="index.php?page=home">Home</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle <?php echo $inventory;?>" data-toggle="dropdown">Inventory<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="?page=inventory&sub=add_book" <?php echo $add_book;?> >Add Book</a></li>
          <li><a href="?page=inventory&sub=manage_books" <?php echo $manage_books;?> >Manage Books</a></li>
          <li><a href="?page=inventory&sub=search_book" <?php echo $search_book; ?>>Search Book</a></li>
        </ul>
      </li>
       <li class="dropdown">
        <a href="#" class="dropdown-toggle <?php echo $administrator;?>" data-toggle="dropdown">Administrator<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="?page=administrator&sub=create_user" <?php echo $create_user; ?>>Create User</a></li>
          <li><a href="?page=administrator&sub=manage_users" <?php echo $manage_users; ?>>Manage Users</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle <?php echo $booK_transaction;?>" data-toggle="dropdown">Book Transaction<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="?page=book_transaction&sub=book_issue" <?php echo $book_issue; ?>>Issue Book</a></li>
          <li><a href="?page=book_transaction&sub=book_return" <?php echo $book_return; ?> >Return Book</a></li>
          <li><a href="?page=book_transaction&sub=book_list" <?php echo $book_list; ?>>Issued Book List</a></li>
        </ul>
      </li>
    </ul>
    <form class="navbar-form navbar-left">
      <input type="text" class="form-control col-lg-8" placeholder="Search">
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle <?php echo $setting;?>" data-toggle="dropdown">Logged in as Admin<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="?page=setting&sub=change_password" <?php echo $change_password; ?>>Change Password</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>