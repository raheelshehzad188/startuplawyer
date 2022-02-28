 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
        <tr>
            <td style="padding: 10px 0 30px 0;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                    <tr>
                        <td align="center" bgcolor="#046fbf" style="padding: 40px 0 30px 0;background: #ea0a60; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                            <a href="#"><img src="<?= base_url() ?>/assets/books/images/logo.png" alt="SHAREBOOK" width="170" height="118" style="display: block;" /></a>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <p>Hi,  <?= $bookOwner ?> </p>
                                    <p>You have a new message from <strong><?= $username ?> </strong>. For the book of <strong>"<?= $bookName ?>"</strong></p>
                                    <p>
                                        Message: "<?= nl2br($message) ?>"
                                    </p> 
                                    <p>Thanks by <?= $username ?> </p>

                                </tr>
                                <tr>
                                  <p> please contact with <?= $username ?> email <strong><?= $usermail ?></strong></p>   
                                </tr>
                               
                                
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td  style="padding: 30px 30px 30px 30px;background:#ea0a60;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="100%">
                                        SHAREBOOK - SULTAN CENTER COMMERCIAL COMPLEX، SHAREBOOK.
                                    </td>
                                   
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>