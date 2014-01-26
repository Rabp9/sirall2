<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>jQuery UI Selectable - Default functionality</title>
        <link rel="stylesheet" href="../resources/css/start/jquery-ui-1.10.3.custom.css">
        <script src="../resources/js/jquery-1.9.1.js"></script>
        <script src="../resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">

        <style>
            #feedback { font-size: 1.4em; }
            #selectable .ui-selecting { background: #75BBD8; color: white; }
            #selectable .ui-selected { background: #1B86B7; color: white; }
            #selectable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
            #selectable li { margin: 3px; padding: 0.4em; font-size: 0.8em; height: 18px; }
        </style>
        <script>
            $(function() {
                $( "#selectable" ).selectable();
            });
        </script>
    </head>
    <body>
        <ol id="selectable">
            <li class="ui-widget-content">Item 1</li>
            <li class="ui-widget-content">Item 2</li>
            <li class="ui-widget-content">Item 3</li>
            <li class="ui-widget-content">Item 4</li>
            <li class="ui-widget-content">Item 5</li>
            <li class="ui-widget-content">Item 6</li>
            <li class="ui-widget-content">Item 7</li>
        </ol>
    </body>
</html>
