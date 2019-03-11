<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Article-Like</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/un_article.css" />
    <script src="js/un_article.js"></script>
</head>
<body>
    <header>
        <h1>Page article avec Like et commentaire</h1>
    </header>
    <section>
        <article>
            <div id="articleContent">
                <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu elementum sem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
                Nunc id lectus sit amet lectus fermentum vehicula. Cras at massa luctus, viverra nunc quis, fermentum nibh. Nam venenatis a nisi eget volutpat. 
                Praesent sit amet urna consequat, elementum dui vitae, facilisis mauris. Mauris arcu massa, egestas ac egestas id, interdum eu arcu. Pellentesque ac justo sapien. Morbi non pellentesque ex. 
                Aenean consectetur congue massa, non consequat magna iaculis at. Pellentesque in ante pellentesque, lobortis enim vel, aliquet sem.
                <br>

                A2liquam dapibus mi a urna fringilla, sed semper quam pretium. Vivamus condimentum bibendum ipsum, quis placerat ligula tristique eget. 
                Sed nec tellus sed eros rutrum venenatis. Integer eget sollicitudin nibh. Sed lacinia ligula venenatis nisi ultrices placerat. Aliquam ut ornare dolor. 
                Duis ornare justo justo, id viverra turpis maximus vel. Sed pretium molestie lectus, non fringilla odio posuere vel. Donec maximus erat sit amet ante facilisis blandit. 
                In eu ante purus. Duis maximus tortor nec tellus tempus, eu laoreet risus mattis. Fusce luctus urna sit amet tellus porttitor, nec pellentesque enim vehicula. Nullam ac euismod nulla. 
                </p>
            </div>
            <div id="divButtons">
                <div id='div_img1' class='div_img'>
                    <img src="img/like.png"     id='buttonLike'     class='imgLike button_notClicked' onclick='ajaxLike(this)'>
                </div>
                <div id='div_img2' class='div_img'>
                    <img src="img/dislike.png"  id='buttonDislike'  class='imgLike button_notClicked' onclick='ajaxLike(this)'>
                </div>
                <div id='divLikeTxt'>
                    
                    <?php
                        // ecrire le nombre de like actuel
                        include_once('./php/like.load.php');
                    ?>
                </div>
            </div>
        </article>
    </section>

    <section id="section_comment">
        <div id="userForm">
            <table>
                <tr>
                    <td>
                        <textarea name="TextComment" id="TextComment" cols="100" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <input type="submit" value="ok" onclick="ajaxComment();">
                    </td>
                </tr>
            </table>
        </div>
        <div id="commentDivParent" class="commentDivParent">
            <div id="c1Ex" class="commentDiv0">
                <p>
                    Aliquam dapibus mi a urna fringilla, sed semper quam pretium.
                </p>
            </div>
            <div id="c2Ex" class="commentDiv1">
                <p>
                    Donec maximus erat sit amet ante facilisis blandit. 
                </p>
            </div>

                        
            <!-- Ajout des commentaires deja dans la bdd-->
            <?php
                include_once('./php/comment.load.php');

                // classNum et classChange controlent la class des commentaires recuperees
                
                $commentClassNum = 1;
                function classChange($c) {
                    switch($c) {
                        case 0 :
                            return 1;
                            break;
                        case 1 :
                            return 0;
                            break;
                        default : // Si bug
                            return 0;
                            break;
                    }
                }

                foreach ($comments as $key => $comment): 
                    //recuperer les informations DB
                    $id = $comment['id'];
                    $date = $comment['date_content'];
                    $commentText = $comment['content'];

                    //contruire ID/class pour l'affichage
                    $commentID = 'c'.$id;
                    $commentClassNum = classChange($commentClassNum); 
                    $commentClass = "commentDiv".$commentClassNum;
                    $htmlClass = 'commentDiv'.$commentClassNum; //alterner entre commentDiv0 et commentDiv1

                    echo "<div id=$commentID class=$commentClass>";
                    echo "<p> $commentText </p>";
                    echo "</div>";                
                endforeach;
            ?> 
        </div>    

    </section>
</body>
</html>