<head>
    <meta name="viewport" content="width=device-width">
    <title>Tp6: News</title>
    <script type="text/javascript">
        let numero = 0;

        function afficherNewsDynamic() {
            var t = setInterval(function () {
                afficherNews(numero);
                numero++;
            }, 3000);
        }

        function afficherNews(numero) {
            var request = new XMLHttpRequest();
            request.onload = function () {
                document.getElementById("destAjax").innerHTML = request.responseText;
            }
            request.open("GET", "afficherNews.php?numero=" + numero);
            request.send();
        }
    </script>
</head>