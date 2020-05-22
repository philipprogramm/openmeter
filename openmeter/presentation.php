<?php
/**
 * @copyright Copyright (c) 2020 Philipp Stappert <mail@philipprogramm.de>
 *
 * @author Philipp Stappert <mail@philipprogramm.de>
 *
 * @license MIT License
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 */

    // require functions
    require("functions.php");

    // get presentation informations
    $presInfos = getPresentationInformations($_GET["id"]);

    // if page is given, move all participants to that page
    if (isset($_GET["page"])){
        setModal($_GET["id"], $_GET["page"]);
    }

?>
<!doctype html>
<html translate="no" class="notranslate">
    <head>
        <!-- meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="google" content="notranslate" />
        <title><?php echo $presInfos["name"]; ?> | OpenMeter</title>

        <!-- CSS -->
        <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="lib/Chart.min.css">
        <link rel="stylesheet" href="css/presentation.css">

    </head>
    <body>
        <!-- Scripts -->
        <!-- Bootstrap / Design -->
        <script src="lib/jquery-3.5.1.min.js"></script>
        <script src="lib/popper.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="lib/Chart.min.js"></script>
        <script src="lib/wordcloud2.js"></script>


        <!-- Content -->
        <div id="content" class="text-white">
            <?php
                // if no page is given, display welcome page, else display modal page
                if (!isset($_GET["page"]) or $_GET["page"] < 0){
                    echo $presInfos["wait_html"];
                } else {
                    echo getModalHtmlViewer($_GET["id"], $_GET["page"]);
                }
            ?>
        </div>

        <!-- Copyright Notice -->
        <div id="footer-content">
            <p class="text-white">Programmiert mit &#10084; von <a href="https://www.philipprogramm.de/" target="_blank" class="text-white"><u>Philipp Stappert</u></a></p>
        </div>

        <!-- Scripts -->
        <!-- Functionality -->
        <script>
            // Variables
            var presId = "<?php echo $_GET["id"]; ?>";
        </script>
        <script src="js/presentation.js"></script>
    </body>
</html>