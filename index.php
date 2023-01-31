
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="script/main.js"></script>
    <link rel="stylesheet" href="style/main.css">
    <!-- tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Auto</title>
</head>
<body>
<header>

</header>
    <main>
        <article>
            <section>
                <div id="containerSearch">
                    <h2>
                        <span class="text-2xl">Search</span>
                    </h2>
                </div>
                <div id="search">
                    <form action="" method="get" id="searchForm" class="flex flex-row">
                        <div id="form-field">
                            <input type="text" name="search_box" class="form-control form-control-lg" placeholder="Type Here..." id="search_box" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onkeyup="javascript:load_data(this.value)" onfocus="javascript:load_search_history()" />
                            <span id="search_result"></span>
                        </div>
                        <button type="submit">Rechercher</button>
                    </form>
                </div>
            </section>
        </article>
    </main>
<footer>

</footer>
<script>

</script>
</body>
</html>