<?php
session_start();
require_once('config/db.php');


if (!isset($_SESSION['username']) OR !isset($_SESSION['id_user']) OR !is_int($_SESSION['id_user'])) {
    header("Location: login.php");
}
else {
    $res = $conn->query("SELECT level FROM users_web WHERE id_user=".$_SESSION['id_user'])->fetch_assoc();
    if($res["level"] != 2) {
        header("Location: index.php");
    }
}

require_once('assets/php/header.php');
require_once('assets/php/nav.php');

$sql = "SELECT * FROM users_web";
$result = $conn->query($sql);
$sql1 = "SELECT * FROM pets";
$result1 = $conn->query($sql1);

?>
<div id="users-admin">
    <div class="admin-title">
        <h1>FELHASZNÁLÓK</h1>
    </div>
    <table>
        <tr>
            <th>FELHASZNÁLÓ</th>
            <th>KERESZTNÉV</th>
            <th>VEZETÉKNÉV</th>
            <th>EMAIL</th>
            <th>AKTÍV</th>
            <th>RANG</th>
            <th colspan="2">MŰVELET</th>
        </tr>
        <?php
        while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?= $row["username"] ?></td>
            <td><?= $row["firstname"] ?></td>
            <td><?= $row["lastname"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><?= $row["active"] ?></td>
            <td><?= $row["level"] ?></td>
            <?php
            if($row["level"] == 2) {
            ?>
            <td>
                <form method="post" action="action/takeaway-admin-action.php">
                    <input type="text" hidden value="<?= $row["id_user"] ?>" name="takeAwayAdmin">
                    <button type="submit" name="takeaway" value="takeaway" id="takeAdmin">ADMIN JOG ELVÉTEL</button>
                </form>
            </td>
            <?php
            }
            else { ?>
            <td>
                <form method="post" action="action/give-admin-action.php">
                    <input type="text" hidden value="<?= $row["id_user"] ?>" name="giveAdmin">
                    <button type="submit" name="give" value="give" id="giveAdmin">ADMIN JOG ADÁS</button>
                </form>
            </td>
            <?php
            }
            if($row["active"] == 1) {
            ?>
            <td>
                <form method="post" action="action/ban-user-action.php">
                    <input type="text" hidden value="<?= $row["id_user"] ?>" name="banUser">
                    <button type="submit" name="ban" value="ban" id="ban" style="background-color: #CF2608">BANNOLÁS</button>
                </form>
            </td>
            <?php
            } else if ($row["active"] == 0) { 
            ?>
            <td>
                <span>Nincs aktiválva</span>
            </td>
            <?php
            } else { ?>
            <td>
                <form method="post" action="action/unban-user-action.php">
                    <input type="text" hidden value="<?= $row["id_user"] ?>" name="unbanUser">
                    <button type="submit" name="unban" value="unban" id="unban" style="background-color: #37C70C">FELOLDÁS</button>
                </form>
            </td>
            <?php
            }
            ?>
            <?php
        }
        ?>
    </table>
</div>

<div class="admin-title">
    <h1>HÍRDETÉSEK</h1>
</div>
<div id="ad-admin">
    <table>
        <tr>
            <th>ID</th>
            <th>FELHASZNÁLÓ</th>
            <th>NÉV</th>
            <th>LEÍRÁS</th>
            <th>NEM</th>
            <th>KOR</th>
            <th>ADOPTÁLVA</th>
            <th>AKTÍV</th>
            <th colspan="2">MŰVELET</th>
        </tr>
        <?php
        while($row = $result1->fetch_assoc()) {
        ?>
        <tr>
            <td><?= $row["specieId"] ?></td>
            <td><?= $row["whose"] ?></td>
            <td><?= $row["name"] ?></td>
            <td><?= $row["description"] ?></td>
            <td><?= $row["gender"] ?></td>
            <td><?= $row["age"] ?></td>
            <td><?= $row["adopted"] ?></td>
            <td><?= $row["active"] ?></td>
            <?php
            if($row["active"] == 0) {
            ?>
            <td>
                <form method="post" action="action/delete-pet-action.php">
                    <input type="text" hidden value="<?= $row["id"] ?>" name="delPet">
                    <button type="submit" name="deletePet" value="delete" id="deletePet">ELVETÉS</button>
                </form>
            </td>
            <td>
                <form method="post" action="action/add-pet-action.php">
                    <input type="text" hidden value="<?= $row["id"] ?>" name="allowPet">
                    <button type="submit" name="addPet" value="add" id="addPet">ENGEDÉLYEZÉS</button>
                </form>
            </td>
            <?php
            }
            else { ?>
            <td>
                <form method="post" action="action/delete-pet-action.php">
                    <input type="text" hidden value="<?= $row["id"] ?>" name="delPet">
                    <button type="submit" name="deletePet" value="delete" id="deletePet">TÖRLÉS</button>
                </form>
            </td>
            <td>
                <form method="post" action="action/add-pet-action.php">
                    <input type="text" hidden value="<?= $row["id"] ?>" name="allowPet">
                    <button type="submit" name="addPet" value="add" id="addPetDis" disabled>ENGEDÉLYEZÉS</button>
                </form>
            </td>
            <?php
            }
        }
        ?>
    </table>
</div>

<?php
require_once('assets/php/footer.php');
?>
</body>

</html>