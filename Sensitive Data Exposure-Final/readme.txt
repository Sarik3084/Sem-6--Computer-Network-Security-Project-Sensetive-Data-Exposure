There are 2 files, namely login.php and safe-login.php. The former is susceptible to basic SQL Injections while the latter is not.

1> login.php is prone to the attacks:
    a>Username: hacker
      Password: hacker' OR '1'='1

    b>Username: hacker
      Password: bar' OR ''='

     c>Username: '='
       Password: 105'OR '1'='1

     d>Username: '='
       Password: 105'OR '1'='1

     e>Username: 105' ; drop table user; -- 

        --> This query(e) executed in cases where the program has been written with the code, which has been commented in login.php 

      
        $sql = "SELECT Username, Password FROM employee where Username='$login_ename';";
          $result = mysqli_multi_query($conn, $sql);


2> safe-login.php has thwarted these basic SQL Injections with the use of the code sequence of parameterized queries:

     $stmt=mysqli_prepare($conn,"SELECT Username, Password FROM employee where Username=? and Password=?");
     mysqli_stmt_bind_param($stmt, 'ss', $login_ename, $login_password);
     mysqli_stmt_execute($stmt);
     $result = $stmt->get_result();
