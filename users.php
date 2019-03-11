<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog - Users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/users.css" />
    <script src="js/users.js"></script>
</head>
<body>
    <section id="Section_User" class="Flex_center_column">
        <h1>Page utilisateurs</h1>
        <table>
            <thead>
                <tr>
                    <th colspan="2">Inscription d'utilisateur</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nom :</td>
                    <td><input type="text" name="nom" id="nom" value="" placeholder="nom" maxlength="100" /></td>
                </tr>
                <tr>
                    <td>Prenom :</td>
                    <td><input type="text" name="prenom" id="prenom" value="" placeholder="prenom" maxlength="100" /></td>
                </tr>
                <tr>
                    <td>email :</td>
                    <td><input type="text" name="email" id="email" value="" placeholder="email" maxlength="100" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button type="button" onclick="ajouter_User()">
                            S'inscrire
                        </button>   
                    </td>
                    
                </tr>
            </tbody>
        </table>

    </section>
    
    <section id="Section_ListUsers" class="Flex_center_column">
        <h1>Liste des utilisateurs</h1>
        <div id="DivUserList">
            <?php
                include_once('view/user_list.php');
            ?>
        </div>
    </section>
</table>
</body>
</html>