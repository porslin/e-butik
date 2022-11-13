<?
 require('../../src/config.php');

 $message = "";

 if (isset($_POST['deleteUserBtn'])) {
    $userDbHandler->deleteUsers();
    
 }

 $users = $userDbHandler->fetchAllUsers();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage users</title>
    <link rel="stylesheet" href="css/style.css">
</head>


<body>
 <div>
    <div id="container2">
         <h1>Manage users</h1>

         <?=$message ?>

         <nav id="main-nav">
            <form action="../newuser.php" method="POST">
            	<input type="submit" value="Create a new user">
            </form>
         </nav>

         <nav id="main-nav2">
            <a href="index.php">Admin home</a>
         </nav>


            <br>
         
         <table class="content-table">
             <thead>
                 <tr>
                     <th>id</th>
                     <th>First name</th>
                     <th>Last name</th>
                     <th>E-mail</th>
                     <th>Password</th>
                     <th>Phone number</th>
                     <th>Street</th>
                     <th>Postal code</th>
                     <th>City</th>
                     <th>Country</th>
                     <th>Registered since </th>
                     <th>Handle</th>
                 <tr>
             </thead>
             <tbody id="data">
                 <?php foreach($users as $user) : ?>
                     <tr>
                         <td><?=htmlentities($user['id']) ?></td>
                         <td><?=htmlentities($user['first_name']) ?></td>
                         <td><?=htmlentities($user['last_name']) ?></td>
                         <td><?=htmlentities($user['email']) ?></td>
                         <td><?=htmlentities($user['password']) ?></td>
                         <td><?=htmlentities($user['phone']) ?></td>
                         <td><?=htmlentities($user['street']) ?></td>
                         <td><?=htmlentities($user['postal_code']) ?></td>
                         <td><?=htmlentities($user['city']) ?></td>
                         <td><?=htmlentities($user['country']) ?></td>
                         <td><?=htmlentities($user['create_date']) ?></td>
                         <td>
                             <form action="updateuser.php" method="GET">
                                 <input type="hidden" name="userId" value="<?=htmlentities($user['id']) ?>">
                                 <input type="submit" value="Updatera">
                             </form>

                             <form action="" method="POST">
                                 <input type="hidden" name="userId" value="<?=htmlentities($user['id']) ?>">
                                 <input type="submit" name="deleteUserBtn" value="Radera">
                             </form>
                         </td>
                     
                     </tr>
                 <?php endforeach; ?>
             </tbody>
         </table>
        </div>
         </body>
        </html>

 
