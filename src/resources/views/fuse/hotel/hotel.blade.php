<!DOCTYPE HTML>
<html>
<head>
    <meta name="referrer" content="origin">
    <link rel="stylesheet" type="text/css" href="https://images.habbo.com/game-data-server-static//./hotel.731d1960.css">
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//images.habbo.com/swfobject/2.3b/swfobject.js"></script>
    <script type="text/javascript">
        var BaseUrl = "https://duck-funk.test/swf";
        var flashvars =
            {
                "special.url" : BaseUrl+"/c_images",
                "client.allow.cross.domain" : "0",
                "client.notify.cross.domain" : "0",
                "client.starting" : "Please wait, the hotel is loading",
                "client.starting.revolving" :"For science, you monster/Loading funny message…please wait./Would you like fries with that?/Follow the yellow duck./Time is just an illusion./Are we there yet?!/I like your t-shirt./Look left. Look right. Blink twice. Ta da!/It's not you, it's me./Shhh! I'm trying to think here./Loading pixel universe.",
                "connection.info.host" : "{{ config('duck-funk.host_server') }}",
                "connection.info.port" : "{{ config('duck-funk.port_server') }}",
                "site.url" : BaseUrl+"/",
                "url.prefix" : BaseUrl+"/",
                "client.reload.url" : BaseUrl+"/disconnected",
                "client.fatal.error.url" : BaseUrl+"/disconnected",
                "client.connection.failed.url" : BaseUrl+"/disconnected",
                "external.override.variables" : BaseUrl+"/gamedata/override/external_override_variables.txt",
                "external.variables.txt" : BaseUrl+"/gamedata/external_variables.txt",
                "external.texts.txt" : BaseUrl+"/gamedata/external_flash_texts.txt",
                "external.override.texts.txt" : BaseUrl+"/gamedata/override/external_flash_override_texts.txt",
                "external.figurepartlist.txt" : BaseUrl+"/gamedata/figuredata.xml",
                "productdata.load.url" : BaseUrl+"/gamedata/productdata.txt",
                "furnidata.load.url" : BaseUrl+"/gamedata/furnidata.xml",
                "hotelview.banner.url" : BaseUrl+"/game/rs4.php",
                "use.sso.ticket" : "1",
                "sso.ticket" : "{{ $sso }}",
                "processlog.enabled" : "1",
                "flash.client.origin" : "popup",
                "has.identity" : "1",
                "unique_habbo_id" : "{{ auth()->id() }}",
                "avatareditor.promohabbos" : BaseUrl+"/game/hotlooks.xml"
            };
    </script>
    <script type="text/javascript" src="https://images.habbo.com/game-data-server-static//./habboapi.6fc315c7.js"></script>
    <script type="text/javascript">
        var params = {
            "base" : "https://duck-funk.test/swf/gordon/PRODUCTION-201607262204-86871104/",
            "allowScriptAccess" : "always",
            "menu" : "false",
            "wmode": "opaque"
        };
        swfobject.embedSWF('https://duck-funk.test/swf/gordon/PRODUCTION-201607262204-86871104/Habbo.swf', 'flash-container', '100%', '100%', '11.1.0', '//images.habbo.com/habboweb/63_1d5d8853040f30be0cc82355679bba7c/11956/web-gallery/flash/expressInstall.swf', flashvars, params, null, null);
    </script>
</head>
<body>
<div id="client-ui">
    <div id="flash-wrapper">
        <div id="flash-container">
            <div id="content" style="width: 400px; margin: 20px auto 0 auto; display: none">
                <p>FLASH NOT INSTALLED</p>
                <p><a href="http://www.adobe.com/go/getflashplayer"><img src="//images.habbo.com/habboweb/63_1d5d8853040f30be0cc82355679bba7c/11956/web-gallery/v2/images/client/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
            </div>
        </div>
    </div>
    <div id="content" class="client-content"></div>
    <iframe id="page-content" class="hidden" allowtransparency="true" frameBorder="0" src="about:blank"></iframe>
</div>
</body>
</html>
