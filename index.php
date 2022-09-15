<html>

<head>
    <meta name="viewport" content="width=device-width" />
    <title>Wi-Fi PiLight </title>
</head>
<style>
    body {
        background-color: rgb(212, 220, 252);
        font-family: 'Arial';
    }

    .red {
        background-color: red;
        width: 10em;
        height: 4em;
        font-size: 20px;
    }

    .yellow {
        background-color: yellow;
        width: 10em;
        height: 4em;
        font-size: 20px;
    }

    .green {
        background-color: green;
        width: 10em;
        height: 4em;
        font-size: 20px;
    }

    .green-dot {
        height: 50px;
        width: 50px;
        background-color: green;
        border-radius: 50%;
        display: inline-block;


    }

    .red-dot {
        height: 50px;
        width: 50px;
        background-color: red;
        border-radius: 50%;
        display: inline-block;


    }

    .yellow-dot {
        height: 50px;
        width: 50px;
        background-color: yellow;
        border-radius: 50%;
        display: inline-block;


    }

    .cycle-dot {
        height: 75px;
        width: 75px;
        background-color: none;
        border-radius: 50%;
        display: inline-block;

    }

    .align {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        min-height: 40vh;
    }

    .off {
        opacity: .5;
    }
</style>

<body>
    <center>
        <h1>Wi-Fi PILight</h1>
        <form method="get" action="index.php">
            <input class="red" type="submit" value="Turn Red LED On" name="ron">
            <input class="red off" type="submit" value="Turn Red LED Off" name="roff">
            <br /> <br />
            <input class="yellow" type="submit" value="Turn Yellow LED On" name="yon">
            <input class="yellow off" type="submit" value="Turn Yellow LED Off" name="yoff">
            <br /> <br />
            <input class="green" type="submit" value="Turn Green LED On" name="gon">
            <input class="green off" type="submit" value="Turn Green LED Off" name="goff">
            <br /> <br />
            <input class="cycle-dot" type="submit" value="Auto" name="auto">
            <input class="cycle-dot" type="submit" value="Off" name="off">
            <br /> <br />
        </form>
    </center>

    <?php
    shell_exec("gpio -g mode 17 out");
    shell_exec("gpio -g mode 22 out");
    shell_exec("gpio -g mode 27 out");

    if (isset($_GET['roff'])) {
        shell_exec("kill $(jobs -p)");
        shell_exec("gpio -g write 17 0");
    } else if (isset($_GET['ron'])) {
        shell_exec("kill $(jobs -p)");
        shell_exec("gpio -g write 17 1");
    } else if (isset($_GET['yon'])) {
        shell_exec("kill $(jobs -p)");
        shell_exec("gpio -g write 27 1");
    } else if (isset($_GET['yoff'])) {
        shell_exec("kill $(jobs -p)");
        shell_exec("gpio -g write 27 0");
    } else if (isset($_GET['gon'])) {
        shell_exec("kill $(jobs -p)");
        shell_exec("gpio -g write 22 1");
    } else if (isset($_GET['goff'])) {
        shell_exec("kill $(jobs -p)");
        shell_exec("gpio -g write 22 0");
    } else if (isset($_GET['auto'])) {
        shell_exec("nohup auto.sh &>/dev/null &");
    } else if (isset($_GET['off'])) {
        shell_exec("kill $(jobs -p)");
        shell_exec("gpio -g write 27 0");
        shell_exec("gpio -g write 17 0");
        shell_exec("gpio -g write 22 0");
    }

    ?>
</body>

</html>