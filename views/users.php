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
        
                echo "<td><a href='/?action=deleteuser&param=".$user['id']."'>Usuń</a></td>";
                echo '</tr>';
            }
        ?>
        </tbody>
    </table>
    </div>
</body>
</html>