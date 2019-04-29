<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;border-width:1px;border-style:solid;border-color:black;margin:0px auto;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
    .tg .tg-1imq{font-weight:bold;font-family:Georgia, serif !important;;background-color:#c0c0c0;color:#333333;border-color:#333333;text-align:right}
    .tg .tg-4r6e{font-family:Georgia, serif !important;;background-color:#efefef;border-color:inherit;text-align:left}
    .tg .tg-nc26{font-weight:bold;font-family:Georgia, serif !important;;background-color:#c0c0c0;border-color:#333333;text-align:right}
    .tg .tg-38if{font-family:Georgia, serif !important;;background-color:#efefef;border-color:inherit;text-align:left}
    .tg .tg-h21e{font-size:100%;font-family:Georgia, serif !important;;background-color:#efefef;border-color:inherit;text-align:left}
</style>
<table class="tg">
    <tr>
        <td class="tg-nc26">Login</td>
        <td class="tg-4r6e"><?=$post['login']?></td>
        <td class="tg-nc26">Password</td>
        <td class="tg-4r6e"><?=$post['pass']?></td>
        <td class="tg-nc26"></td>
        <td class="tg-4r6e"></td>
        <td class="tg-nc26">Finish registration</td>
        <td class="tg-4r6e"><a href="http://sublime.poxah.ru/registration/confirm?auth_token=<?=$post['auth_token']?>">Confirm email</a> </td>
    </tr>
</table>

