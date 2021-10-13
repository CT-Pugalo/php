<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width">
    <title>Tp6: News</title>
    <script type="text/javascript">
        function filtrerNews() {
            options = document.getElementById("selectUser");
            id = options.options[options.selectedIndex].value;
            inputdate = document.getElementById("date").value;
            if (typeof (inputdate) == 'undefined') {
                date = "01/01/1750";
            }
            date = inputdate;
            console.log(options);
            console.log(id);
            console.log(date);
            var request = new XMLHttpRequest();
            request.onload = function () {
                document.getElementById("destAjax").innerHTML = request.responseText;
            }
            request.open("GET", "chercheNews.php?selectUser=" + id + "&date=" + date);
            request.send();
            id = 0;
        }
    </script>
</head>
<body onload="filtrerNews()">
<form>
    <label>
        Auteur
        <select id="selectUser" name="selectUser" onchange="filtrerNews()">
            <option value="0">--Selectionner pour filtrer--</option>
            <?php
            include 'include.php';
            $users = UserModel::getAll();
            foreach ($users as $user) {
                $login = $user->getLogin();
                $id = $user->getId();
                echo "<option value='{$id}' id='{$login}'>$login</option>";
            }
            ?>
        </select>
    </label>
    <label>
        Date
        <input type="date" id="date" name="date">
        <button type="button" onclick="filtrerNews()">Fitrer</button>
    </label>
</form>
<div id="destAjax"></div>
</body>