<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog Ajax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <script src="js/main.js"></script>
</head>
<body>
    <header>
        <h1>Page article</h1>
    </header>
    <section>
        <article>
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
        <div id="cExemple">
            <p>
                Aliquam dapibus mi a urna fringilla, sed semper quam pretium.
            </p>
        </div>
        <div id="cExemple2">
            <p>
                Donec maximus erat sit amet ante facilisis blandit. 
            </p>
        </div>
    </section>
</body>
</html>