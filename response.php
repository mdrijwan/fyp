<!DOCTYPE html>
<html>
<head>
    <title>My Rad Contact Form</title>
    <style type="text/css">
        table tr > td { text-align: right; }
        table tr > td + td { text-align: left; }
    </style>
</head>
<body>

  <?php
if (empty($_POST) === true){
echo 'Submitted';

}
   ?>

    <form action="" method="post">
        <table>
            <tr>
                <td>
                    Your Name:
                </td>
                <td>
                    <input type="text" id="Name" name="Name" />
                </td>
            </tr>
            <tr>
                <td>
                    Your Email:
                </td>
                <td>
                    <input type="text" id="Email" name="Email" />
                </td>
            </tr>
            <tr>
                <td>
                    Least Favorite Color:
                </td>
                <td>
                    <select id="LeastFavoriteColor" name="LeastFavoriteColor">
                        <option value="">- Choose -</option>
                        <option value="Blue">Blue</option>
                        <option value="Green">Green</option>
                        <option value="Orange">Orange</option>
                        <option value="Red">Red</option>
                        <option value="Yellow">Yellow</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" id="submit" value="Contact Me!" />
                    <input type="reset" id="reset" value="Start Over!" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
