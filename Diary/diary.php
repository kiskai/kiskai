<!DOCTYPE html>
<html>
<head>
    <title>Diary</title>
    <style>
        h1 {
            text-align: center;
            font-family: monospace;
        }

        .container {
            margin: 100px auto;
            max-width: 250px;
            background-color: skyblue;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .addMsg {
            border: none;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }

        .search {
            border: none;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }

        .btn {
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            margin: 5px 0;
        }

        .btn-add,
        .btn-search {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .foundMsg, .addedMsg{
            font-family: monospace;
            font-size: 20px;
            text-align: center;
        }
        .notFoundMsg{
            font-family: monospace;
            font-size: 20px;
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    // Initialize the message_to_display variable
    $message_to_display = '';
    $added_to_diary = '';
    $message_not_found = '';

    // Check if the "Add to Diary" form is submitted
    if (isset($_POST['add'])) {
        $message = $_POST['message'];

        // Store the diary entries in an array (for simplicity, not a database)
        if (!isset($_SESSION['diary'])) {
            $_SESSION['diary'] = array();
        }
        $_SESSION['diary'][] = $message;
        $added_to_diary = 'Message added to diary!';
    }

    // Check if the "Search" form is submitted
    if (isset($_POST['search'])) {
        $entry_number = (int)$_POST['entry_number'];

        // Check if the requested entry exists
        if (isset($_SESSION['diary'][$entry_number])) {
            $message_to_display = $_SESSION['diary'][$entry_number];
        } else {
            $message_not_found = 'Entry not found!';
        }
    }
    ?>
    <div class="container">
        <h1>My Diary</h1>
        <form action="diary.php" method="post">
            <div class="form-group">
                <textarea name="message" class="addMsg" placeholder="Enter your message"></textarea>
                <div class="btn-add">
                    <input type="submit" class="btn" name="add" value="Add to Diary">
                </div>
            </div>

            <div class="form-group">
                <input type="text" class="search" name="entry_number" placeholder="Entry Number">
                <div class="btn-search">
                    <input type="submit" class="btn" name="search" value="Search">
                </div>
            </div>
        </form>
        <span class="foundMsg"><?php echo $message_to_display; ?></span>
        <span class="notFoundMsg"><?php echo  $message_not_found; ?></span>
        <span class="addedMsg"><?php echo  $added_to_diary; ?></span>
    </div>
    </div>
</body>
</html>
