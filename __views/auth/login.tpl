<!DOCTYPE HTML>
<html>
<head>
    <title>RIB Login Page</title>
    <link rel="stylesheet" type="text/css" href="{$host}__assets/css/clientpage.css?{$smarty.now}"/>
    <link href="{$host}__assets/css/style-login.css" rel="stylesheet" type="text/css" media="all" />
    <link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>
    {*<link rel="stylesheet" type="text/css" href="{$host}__assets/css/animate.css"/>*}
    <link rel="stylesheet" type="text/css" href="{$host}__assets/lib/sweet/sweet-alert.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="{$host}favicon.ico" type="image/png" />
</head>
<body>
<div class="wrap wow zoomIn">
    <!-- strat-contact-form -->
    <p style="text-align: center; margin-right: 30px;"><a href="{$host}"> <img src="{$host}__assets/images/logo_login.png" alt="" width="400px;"></a></p>
    <!-- start-form -->
    <form id="f_login" class="contact_form"  method="post" action="{$url}index.php/auth/l" name="contact_form">
        <input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
        <h1 id="title-box" style="font-size: 26px; color: #4B4B4B">Login Into Your Account</h1>
        <ul>
            <li>
                <input type="text" class="textbox1" name="userid" placeholder="User ID" required />
                <span class="form_hint">Enter a UserID</span>
                <p><img src="{$host}__assets/images/contact.png" alt=""></p>
            </li>
            <li>
                <input type="password" name="passwd" id="passwd" class="textbox2" placeholder="Password">
                <p><img src="{$host}__assets/images/lock.png" alt=""></p>
            </li>
        </ul>
        <input id="lgn-btn" name="Sign In" value="Sign In"/>
        <div class="clear"></div>
        {*<label class="checkbox"><input type="checkbox" name="checkbox" checked><i></i>Remember me</label>*}
        <div class="forgot">
            <a href="{$url}index.php/chome/forgot">forgot password?</a>
        </div>
        <div class="clear"></div>
    </form>
    <!-- end-form -->
    <!-- start-account -->

    <!-- end-account -->
    <div class="clear"></div>

    <!-- end-contact-form -->
    <div class="footer">
        {*<p>Template by <a href="http://w3layouts.com">w3layouts</a></p>*}
    </div>
</div>
<div id="msg_login" class="hide hidden">{$msg_login}</div>
<script type="text/javascript" src="{$host}__assets/js/jquery/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="{$host}__assets/js/bootstrap-3.0.0/bootstrap.min.js"></script>
<script type="text/javascript" src="{$host}__assets/js/wow.js"></script>
<script type="text/javascript" src="{$host}__assets/js/wow.min.js"></script>
{if !$auth}
    <script type="text/javascript" src="{$host}__assets/js/enc_md5.min.js"></script>
    <script type="text/javascript" src="{$host}__assets/js/enc_sha256.js"></script>
{/if}
<script src="{$host}__assets/lib/sweet/sweet-alert.js"></script>

<script type="text/javascript">
    $(function() {
	var msg_login = jQuery("#msg_login").text();
	if(msg_login!="")
	{
		swal({
						title: "Authentication Error.",
						text: msg_login,
						type: "warning",
						confirmButtonColor: '#DD6B55',
						confirmButtonText: 'OK'
						});
	}
        $("#lgn-btn").click(function () {
            $('#passwd').val(b64_hmac_sha256($('#csrf').val(), $('#passwd').val()));
            $('#f_login').submit();
        });
    });

    function loginEnter(elm, e)
    {
        if (window.event)
            key = window.event.keyCode;
        else if (e)
            key = e.which;
        else
            return true;
        //keychar = String.fromCharCode(key);
        // control keys
        if ((key==13) )
        {
            $('#passwd').val(b64_hmac_sha256($('#csrf').val(), $('#passwd').val()));
            $('#f_login').submit();
        }
    }
</script>
{*<script>*}
    {*new WOW().init();*}
{*</script>*}

</body>
</html>