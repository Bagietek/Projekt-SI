<!DOCTYPE html>

<body>
    <div class="users_table">
    <table>
        <thead >
            <tr><th>ID</th><th>Login</th><th>Nick</th><th>Email</th><th>Uprawnienia</th><th>Akcja</th></tr>
        </thead>
        <tbody>
        <?php
            foreach($users as $user)
            {
                echo '<tr>';
                echo "<td>".$user['id']."</td>".
                    "<td>".$user['login']."</td>".
                    "<td>".$user['nick']."</td>".
                    "<td>".$user['email']."</td>".
                    "<td>".$user['permission']."</td>";
                if($user['permission'] == 'user')
                {
                    echo "<td><a href='/?action=deleteuser&param=".$user['id']."'>Usuń</a> <br>";
                    echo "<a href=/?action=changeperm&param=$user[id]&type=admin>Admin</a> <br>";
                    echo "<a href=/?action=changeperm&param=$user[id]&type=mod>Moderator</a> </td>";
                }else if($user['permission'] == 'mod')
                {
                    echo "<td><a href='/?action=deleteuser&param=".$user['id']."'>Usuń</a> <br>";
                    echo "<a href=/?action=changeperm&param=$user[id]&type=admin>Admin</a> <br>";
                    echo "<a href=/?action=changeperm&param=$user[id]&type=user>Usuń moda</a> </td>";
                }else{ // admin
                    echo "<td>";
                    if($_SESSION['logged']!=$user['id'])
                    {
                        echo "<a href='/?action=deleteuser&param=".$user['id']."'>Usuń</a><br>";
                        echo "<a href=/?action=changeperm&param=$user[id]&type=user>Usuń admina</a>";
                    }
                    echo "</td>";
                }
                
                echo '</tr>';
            }
        ?>
        </tbody>
    </table>
    </div>
</body>
</html>