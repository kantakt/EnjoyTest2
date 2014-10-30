<h1>Тестовое Задание - Генерация Паролей</h1>


<form action="http://enjoytest/main/generate" method="post">
    <table align="center">
        <tr>
            <th>Type number of symbols</th>
        </tr>
        <tr>
            <td><input name="num" type="text"></td>
        </tr>
        <tr>
            <td><input name="anum" type="checkbox" value="">Numbers without 0 and 1</input></td>
        </tr>
        <tr>
            <td><input name="acap" type="checkbox">Big letters without o and O</input></td>
        </tr>
        <tr>
            <td><input name="alit" type="checkbox">Small letters without "l"</input></td>
        </tr>
        <tr>
            <td><input name="Gen" type="submit" value="Generate"></td>
        </tr>
        <tr>
            <td class="err">
                <?php echo $data["err"]; ?>
            </td>
        </tr>

    </table>

    <div id="password" class="pwd"><?php echo $data["password"]; ?></div>
</form>

