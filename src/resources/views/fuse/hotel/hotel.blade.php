<!DOCTYPE HTML>
<html>
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WHR92JN');</script>
    <!-- End Google Tag Manager -->
    <meta name="referrer" content="origin">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css"
          href="https://images.habbo.com/game-data-server-static//./hotel.731d1960.css">
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//images.habbo.com/swfobject/2.3b/swfobject.js"></script>
    <script type="text/javascript">
        var BaseUrl = "https://duck-funk.test/swf";
        var flashvars =
            {
                @if(core()->user()->settings->welcome_flow_enabled)
                    "new.user.flow.enabled": "{{ core()->user()->settings->welcome_flow_enabled ? 'true' : 'false' }}",
                    "new.user.flow.onboarding.choose.your.room": "Elige la sala",
                    "new.user.flow.figure.ok": "Chico",
                    "new.user.flow.onboarding.what.is.hc": "\u00A1Con Habbo Club podr\u00E1s expresarte mejor que nunca tal y como eres! Los Habbos que pertenecen a este club cuentan con los siguientes beneficios: ropa, premios, dise\u00F1os de salas, una Tienda especial, lista de amigos y salas ampliada, y acceso prioritario en colas y salas.",
                    "new.user.flow.onboarding.button.select.room": "Quiero esta sala",
                    "new.user.flow.rename.submit": "Hecho",
                    "new.user.flow.onboarding.button.ready": "\u00A1Estoy listo!",
                    "new.user.flow.room.name.12": "Sala Soleada",
                    "new.user.flow.room.name.11": "\u00C1tico Penumbra",
                    "new.user.flow.room.name.10": "Hogar Reluciente Hogar",
                    "new.user.flow.onboarding.this.is.your.habbo": "Este es tu {{ config('duck-funk.keko') }}",
                    "new.user.flow.onboarding.room.information": "\u00A1Antes de empezar elige tu sala! \u00A1Luego podr\u00E1s crear m\u00E1s gratis!",
                    "new.user.flow.gender": "Chica",
                    "new.user.flow.onboarding.your.colour": "Elige un color",
                    "new.user.flow.loader.waiting": "\u00A1Cargando!",
                    "new.user.flow.bodyparts": "Cuerpo del texto",
                    "new.user.flow.rename.subtitle": "Se aceptan entre 4-15 caracteres, letras y n\u00FAmeros",
                    "spaweb": "0",
                    "new.user.flow.header": "\u00A1Est\u00E1s genial! Pr\u00F3ximo paso, elegir un nombre para tu Habbo. (Si no se te ocurre nada, no te agobies, deja esta opci\u00F3n para m\u00E1s tarde)",
                    "new.user.flow.room.select": "Selecciona",
                    "new.user.flow.intro3": "\u00A1S\u00F3lo una cosa m\u00E1s! Dinos con que tipo de sala te gustar\u00EDa empezar. \u00A1No es una decisi\u00F3n para toda la vida, as\u00ED que no te lo pienses demasiado!",
                    "new.user.flow.intro2": "\u00A1Nos gusta tu estilo! Ahora tienes que escoger un nombre para tu Habbo (o puedes saltarte este paso y elegirlo m\u00E1s tarde)",
                    "new.user.onboarding.hc.flow.enabled": "true",
                    "new.user.flow.onboarding.choose.your.name": "Elige un nombre ",
                    "new.user.flow.colors": "Podr\u00E1s ganar un Punto de Fidelidad por cada cr\u00E9dito que compres.  Por cada 120 Cr\u00E9ditos que compres durante el mismo mes, tendr\u00E1s un bonus de 120 Puntos. Intercambia tus puntos por cr\u00E9ditos extras, raros y Habbo Club. Haz clik sobre el link Puntos de Fidelidad para obtener m\u00E1s informaci\u00F3n y comprobar tu balance.",
                    "new.user.flow.onboarding.creative.tip": "\u00A1Se crean cientos de Habbos cada d\u00EDa, as\u00ED que se creativo!",
                    "new.user.flow.onboarding.cant.decide": "\u00BFNo te decides? \u00A1No te preocupes, mas tarde podr\u00E1s elegir de nuevo tu ropa!",
                    "new.user.flow.onboarding.get.hc.button": "\u00A1Hazte de Habbo Club!",
                    "new.user.flow.onboard.what.is.hc.header": "Mucho m\u00E1s dentro...",
                    "new.user.flow.gender.girl": "Mientras preparamos tu acceso, puedes ir eligiendo tu primer look:",
                    "new.user.flow.loader": "en proceso...",
                    "new.user.flow.onboarding.info.hc": "\u00BFQu\u00E9 es Habbo Club?<br>Habbo Club es un club especial al que te puedes unir para tener acceso a m\u00E1s estilos de ropa, exclusivos dise\u00F1os de sala, m\u00E1s capacidad en tu lista de amigos y muchas sorpresas.",
                    "new.user.flow.onboarding.button.remove.items": "Quitar items",
                    "new.user.flow.onboarding.your.looks": "Elige un look",
                    "new.user.flow.note.header": "\u00A1Por elegir Habbo!",
                    "new.user.flow.save": "\u00A1Me pondr\u00E9 esto!",
                    "new.user.flow.onboarding.hint.hc": "NOTA: Alguna de las opciones seleccionadas solo est\u00E1n disponibles para Habbo Club  -  Necesitas comprar Habbo Club o cambiar tu look para continuar.",
                    "nux.lobbies.enabled": "true",
                    "new.user.flow.onboard.what.is.hc.description": "\u00BFQu\u00E9 es Habbo Club?\nHabbo Club es un club especial al que te puedes unir para tener acceso a m\u00E1s estilos de ropa, exclusivos dise\u00F1os de sala, m\u00E1s capacidad en tu lista de amigos y muchas sorpresas",
                    "new.user.flow.galleryUrl": "\/\/images.habbo.com\/c_images\/nux\/",
                    "new.user.reception.minLength": "2",
                    "new.user.flow.page": "{{ core()->user()->settings->welcome_flow_step }}",
                    "new.user.flow.title": "V\u00EDdeo anterior.",
                    "new.user.flow.roomTypes": "10,11,12",
                    "new.user.onboarding.show.hc.items": "true",
                    "new.user.flow.name": "{{ core()->user()->username }}",
                    "new.user.reception.maxLength": "15",
                    "new.user.flow.onboarding.characters.tip": "CONSEJO:  De 3 a 15 caracteres, puedes utilizar letras, n\u00FAmeros y algunos signos de puntuaci\u00F3n como los guiones.",
                    "new.user.flow.rename.warning": "Consejo:cada d\u00EDa se crean cientos de Habbos, y tu nombre tiene que ser \u00FAnico, \u00A1as\u00ED que intenta ser creativo! S\u00F3lo se pueden usar los siguientes caracteres:  _-",
                    "new.user.flow.rename.title": "Pon un nombre a tu Habbo",
                    "new.user.flow.intro": "Mientras preparamos tu registro, puedes ir eligiendo el primer look de tu avatar:",
                    "new.user.flow.onboarding.button.skip": "Saltar",
                    "new.user.flow.onboarding.choose.your.style": "Elige un estilo",
                    "new.user.flow.onboarding.hint.hc.header": "\u00A1Espera un segundo!",
                    "new.user.flow.rename.error.too_short": "¡VAYA! El {{ config('duck-funk.keko') }} nombre que has elegido es demasiado corto.",
                    "new.user.flow.rename.error.too_long": "¡VAYA! El {{ config('duck-funk.keko') }} nombre que has elegido es demasiado largo.",
                    "new.user.flow.rename.error.words": "¡VAYA! Tu nombre contiene palabras prohibidas. Inténtalo con otro.",
                    "new.user.flow.rename.error.taken": "¡VAYA! Alguien ya está utilizando este {{ config('duck-funk.keko') }} nombre.",
                    "new.user.flow.rename.error.chars": "¡VAYA! Tu nombre tiene carácteres no válidos.",
                    "new.user.flow.gender.female": "Chica",
                    "new.user.flow.gender.male": "Chico",
                    "new.user.flow.clothes": "\u00BFQuieres tener m\u00E1s Cr\u00E9ditos, Raros y Habbo Club?",
                    "new.user.flow.gender.boy": "\u00A1Elige tu Habbo!",
                    "new.user.flow.figure.error": "G\u00E9nero",
                    "new.user.flow.note.title": "Gracias",
                    "new.user.flow.rename.skip": "Dejarlo para otro momento",
                    "new.user.flow.room.description.12": "Incluye L\u00E1mpara Burbujeante de Lava para darle un ambiente retro.",
                    "new.user.flow.room.description.11": "\u00A1No hay nada como la Fiesta Penumbra!",
                    "new.user.flow.room.description.10": "Para aquellos Habbos con gusto por las cosas brillantes",
                @endif
                "special.url" : BaseUrl+"/c_images",
                "client.allow.cross.domain" : "0",
                "client.notify.cross.domain" : "0",
                "client.starting" : "Por favor, espera. El hotel está cargando...",
                "client.starting.revolving":"Para ciencia, \u00A1T\u00FA, monstruito!\/Cargando mensajes divertidos... Por favor, espera.\/\u00BFTe apetecen salchipapas con qu\u00E9?\/Sigue al pato amarillo.\/El tiempo es s\u00F3lo una ilusi\u00F3n.\/\u00A1\u00BFTodav\u00EDa estamos aqu\u00ED?!\/Me gusta tu camiseta.\/Mira a la izquierda. Mira a la derecha. Parpadea dos veces. \u00A1Ta-ch\u00E1n!\/No eres t\u00FA, soy yo.\/Shhh! Estoy intentando pensar.\/Cargando el universo de p\u00EDxeles.",                "connection.info.host" : "{{ config('duck-funk.host_server') }}",
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
                "unique_habbo_id" : "{{ core()->user()->id }}",
                "avatareditor.promohabbos" : BaseUrl+"/game/hotlooks.xml"
            }
    </script>
    <script>
        function initializeExternalInterfaces() {
            'use strict';
            window.HabboFlashClient.init(document.getElementById('flash-container'))
        }

        !function () {
            'use strict';
            var n = '*';
            window.MainApp = {
                postMessage: function (e) {
                    window.parent.postMessage(e, n)
                }
            }
        }(),
            function () {
                'use strict';
                var n = !1;
                window.FlashExternalInterface = {},
                    window.FlashExternalInterface.closeHabblet = function (n) {
                        window.MainApp.postMessage({
                            call: 'close-habblet',
                            target: n
                        })
                    },
                    window.FlashExternalInterface.disconnect = function () {
                        window.MainApp.postMessage({
                            call: 'disconnect'
                        })
                    },
                    window.FlashExternalInterface.heartBeat = function () {
                        window.HabboFlashClient.started = !0,
                            window.MainApp.postMessage({
                                call: 'heartbeat'
                            })
                    },
                    window.FlashExternalInterface.legacyTrack = function (n, e, a) {
                        window.HabboFlashClient.started = !0,
                            window.HabboTracking.track(n, e, a)
                    },
                    window.FlashExternalInterface.loadConversionTrackingFrame = function () {
                        var n = window.flashvars.unique_habbo_id;
                        $('#conversion-tracking').attr('src', '/client/' + n + '/conversion-tracking')
                    },
                    window.FlashExternalInterface.logCrash = function (n) {
                        window.HabboFlashClient.started = !0,
                            window.MainApp.postMessage({
                                call: 'disconnect'
                            }),
                            window.HabboWebApi.logCrash(n, function (n) {
                                n && window.FlashExternalInterface.track('log', 'fatal', 'Can\'t log login crash: ' + n)
                            })
                    },
                    window.FlashExternalInterface.logDebug = function (n) {
                        window.FlashExternalInterface.track('log', 'debug', n)
                    },
                    window.FlashExternalInterface.logError = function (n) {
                        window.HabboFlashClient.started = !0,
                            window.HabboWebApi.logError(n, function (n) {
                                n && window.FlashExternalInterface.track('log', 'error', 'Can\'t log login error: ' + n)
                            })
                    },
                    window.FlashExternalInterface.logWarn = function (n) {
                        window.FlashExternalInterface.track('log', 'warn', n)
                    },
                    window.FlashExternalInterface.logLoginStep = function (e, a) {
                        window.FlashExternalInterface.track('clientload', e, a),
                            window.HabboFlashClient.started = !0,
                        n || 'client.init.core.running' !== e || (n = !0, window.MainApp.postMessage({
                            call: 'hotel-ready'
                        })),
                            window.HabboWebApi.logLoginStep(e, a, function (n) {
                                n && window.FlashExternalInterface.track('log', 'error', 'Can\'t log login step: ' + n)
                            })
                    },
                    window.FlashExternalInterface.logout = function () {
                        window.MainApp.postMessage({
                            call: 'logout'
                        })
                    },
                    window.FlashExternalInterface.openExternalPage = function (n) {
                        window.MainApp.postMessage({
                            call: 'open-external',
                            target: n
                        })
                    },
                    window.FlashExternalInterface.openHabblet = function (n, e) {
                        window.HabboTracking.track('openhablet', 'habletid', n);
                        var a = window.HabboPageTransformer.transformHabblet(n, e);
                        window.FlashExternalInterface.openPage(a)
                    },
                    window.FlashExternalInterface.openWebHabblet = function (n, e) {
                        window.HabboTracking.track('openwebhablet', n, e);
                        var a = window.HabboPageTransformer.transformHabblet(n, e);
                        window.FlashExternalInterface.openPage(a)
                    },
                    window.FlashExternalInterface.openPage = function (n) {
                        n = window.HabboPageTransformer.translate(n),
                            window.HabboTracking.track('openpage', '', n),
                            window.MainApp.postMessage({
                                call: 'open-page',
                                target: n
                            })
                    },
                    window.FlashExternalInterface.track = function (n, e, a) {
                        window.HabboFlashClient.started = !0,
                            window.HabboTracking.track(n, e, a)
                    },
                    window.FlashExternalInterface.updateFigure = function (n) {
                        window.MainApp.postMessage({
                            call: 'update-figure',
                            target: n
                        })
                    },
                    window.FlashExternalInterface.updateName = function (n) {
                        window.MainApp.postMessage({
                            call: 'update-name',
                            target: n
                        })
                    },
                    window.FlashExternalInterface.openMinimail = function (n) {
                        window.HabboTracking.track('minimail', 'open', n),
                            window.MainApp.postMessage({
                                call: 'open-page',
                                target: '/'
                            })
                    },
                    window.FlashExternalInterface.openNews = function () {
                        window.HabboTracking.track('news', 'open', ''),
                            window.MainApp.postMessage({
                                call: 'open-page',
                                target: '/'
                            })
                    },
                    window.FlashExternalInterface.openAvatars = function () {
                        window.FlashExternalInterface.openPage('/settings/avatars')
                    },
                    window.FlashExternalInterface.showInterstitial = function () {
                        window.MainApp.postMessage({
                            call: 'show-interstitial'
                        })
                    },
                    window.FlashExternalInterface.subscriptionUpdated = function (n) {
                        window.MainApp.postMessage({
                            call: 'update-habbo-club',
                            target: n
                        })
                    },
                    window.FlashExternalInterface.updateBuildersClub = function (n) {
                        window.MainApp.postMessage({
                            call: 'update-builders-club',
                            target: n
                        })
                    }
            }(),
            function () {
                'use strict';

                function n(n) {
                    if (n.data) {
                        var t = n.data;
                        switch (console.log('Received event, with call: ' + t.call), t.call) {
                            case 'logout':
                                window.location = '{{ route('logout') }}';
                                break;
                            case 'open-link':
                                e(t.target);
                                break;
                            case 'open-room':
                                a(t.target);
                                break;
                            case 'interstitial-status':
                                o(t.target)
                        }
                    }
                }

                function e(n) {
                    t.openlink(n)
                }

                function a(n) {
                    n.indexOf('r-hh') >= 0 ? t.openroom(n) : e('navigator/goto/' + n)
                }

                function o(n) {
                    window.HabboFlashClient.flashInterface.interstitialCompleted(n)
                }

                var t;
                window.addEventListener('message', n, !1),
                    window.HabboFlashClient = {
                        started: !1,
                        init: function (n) {
                            window.HabboTracking.track('clientload', 'starting', 'Initalizing Habbo Client.'),
                                window.FlashExternalInterface.logLoginStep('web.view.start'),
                            n || (console.error('Invalid FlashClient. Can\'t use JS->Flash interface.'), window.FlashExternalInterface.logLoginStep('web.flash_missing')),
                                t = n,
                                window.HabboFlashClient.flashInterface = n,
                                setTimeout(function () {
                                    window.HabboFlashClient.started || window.FlashExternalInterface.logLoginStep('client.init.swf.error')
                                }, 30000)
                        }
                    }
            }(),
            window.addEventListener('load', initializeExternalInterfaces, !1),
            function () {
                'use strict';

                function n(n, e) {
                    return 0 === n.indexOf(e)
                }

                var e = {
                    '/credits': '/shop',
                    '/creditflow': '/shop',
                    '/news': '/community/category/all/1'
                };
                window.HabboPageTransformer = {
                    translate: function (a) {
                        for (var o in e) if (e.hasOwnProperty(o) && n(a, o)) return e[o];
                        return a
                    },
                    transformHabblet: function (n, e) {
                        return '/' + n
                    }
                }
            }(),
            function () {
                'use strict';

                function n(n, e) {
                    $.ajax({
                        url: n,
                        contentType: 'application/json',
                        dataType: 'json',
                        type: 'GET'
                    }).done(function (n) {
                        e(null, n)
                    }).fail(function (n) {
                        e(n, null)
                    })
                }

                window.HabboShopApi = {},
                    window.HabboShopApi.checkOffer = function (e) {
                        n('/shopapi/checkoffer/', e)
                    }
            }(),
            function () {
                'use strict';
                var n = function (n, e, a) {
                    'console' in window && 'log' in console && console.log('action = [' + n + '], label = [' + e + '], value = [' + a + ']')
                };
                window.HabboTracking = {
                    track: function (e, a, o) {
                        n(e, a, o),
                        'clientload' === e && window.HabboTracking.gaTrack(e, a)
                    },
                    gaTrack: function (n, e) {
                        window._gaq && window._gaq.push(['_trackEvent',
                            n,
                            e])
                    }
                }
            }(),
            function () {
                'use strict';

                function n(n, e, a) {
                    $.ajax({
                        url: n,
                        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')},
                        contentType: 'application/json',
                        dataType: 'json',
                        type: 'POST',
                        data: JSON.stringify(e)
                    }).done(function (n) {
                        a(null, n)
                    }).fail(function (n) {
                        a(n, null)
                    })
                }

                window.HabboWebApi = {},
                    window.HabboWebApi.checkName = function (e, a) {
                        n('/api/newuser/name/check', {
                            name: e
                        }, a)
                    },
                    window.HabboWebApi.claimName = function (e, a) {
                        n('/api/newuser/name/select', {
                            name: e
                        }, a)
                    },
                    window.HabboWebApi.saveFigure = function (e, a, o) {
                        n('/api/user/look/save', {
                            figure: e,
                            gender: a
                        }, o)
                    },
                    window.HabboWebApi.selectRoom = function (e, a) {
                        n('/api/newuser/room/select', {
                            roomIndex: e
                        }, a)
                    },
                    window.HabboWebApi.logCrash = function (e, a) {
                        n('/api/log/crash', {
                            message: e
                        }, a)
                    },
                    window.HabboWebApi.logError = function (e, a) {
                        n('/api/log/error', {
                            message: e
                        }, a)
                    },
                    window.HabboWebApi.logLoginStep = function (e, a, o) {
                        n('/api/log/loginstep', {
                            step: e,
                            data: a
                        }, o)
                    }
            }(),
            function () {
                'use strict';
                window.NewUserReception = {},
                    window.NewUserReception.checkName = function (username) {
                        console.log('Checking name: "' + username + '"...'),
                            window.HabboWebApi.checkName(username, function (e, a) {
                                return e ? (console.error('Checking name failed!'), void window.HabboFlashClient.flashInterface.newUserReceptionCheckNameFailed(username)) : void window.HabboFlashClient.flashInterface.newUserReceptionCheckNameResponse(username, a.code, a.validationResult || [], a.suggestions)
                            })
                    },
                    window.NewUserReception.chooseRoom = function (n) {
                        console.log('Choosing room: "' + n + '"...'),
                            window.HabboWebApi.selectRoom(n, function (n) {
                                return n ? (console.error('Choosing room failed!'), void window.HabboFlashClient.flashInterface.newUserReceptionChooseRoomFailed()) : void window.HabboFlashClient.flashInterface.newUserReceptionChooseRoomResponse()
                            })
                    },
                    window.NewUserReception.claimName = function (n) {
                        console.log('Claiming name: "' + n + '"...'),
                            window.HabboWebApi.claimName(n, function (e, a) {
                                return e ? (console.error('Claiming name failed!'), void window.HabboFlashClient.flashInterface.newUserReceptionClaimNameFailed(n)) : (window.HabboFlashClient.flashInterface.newUserReceptionClaimNameResponse(a.code, a.validationResult, a.suggestions), void ('OK' === a.code && window.MainApp.postMessage({
                                    call: 'update-name',
                                    target: n
                                })))
                            })
                    },
                    window.NewUserReception.logStep = function (n) {
                        window.HabboTracking.track('nux', 'log', n)
                    },
                    window.NewUserReception.saveOutfit = function (n, e) {
                        console.log('Saving outfit: "' + n + '" - "' + e + '"...'),
                            window.HabboWebApi.saveFigure(n, e, function (n, a) {
                                return n ? (console.error('Saving outfit failed!'), void window.HabboFlashClient.flashInterface.newUserReceptionSaveOutfitFailed()) : (window.HabboFlashClient.flashInterface.newUserReceptionSaveOutfitResponse(a.figureString, e, 'OK'), void window.MainApp.postMessage({
                                    call: 'update-figure',
                                    target: a.figureString
                                }))
                            })
                    }
            }(),
            function () {
                'use strict';
                window.TargetedWebOffer = {},
                    window.TargetedWebOffer.checkOffer = function () {
                        console.log('Checking for offer...'),
                            window.HabboShopApi.checkOffer(function (n, e) {
                                return n ? void window.HabboFlashClient.flashInterface.targetedWebOfferCheckFailed() : void window.HabboFlashClient.flashInterface.targetedWebOfferCheckResponse(e)
                            })
                    }
            }();

    </script>

    <script type="text/javascript">
        var params = {
            "base": "https://duck-funk.test/swf/gordon/PRODUCTION-201904011212-888653470/",
            "allowScriptAccess": "always",
            "menu": "false",
            "wmode": "opaque"
        };
        swfobject.embedSWF('https://duck-funk.test/swf/gordon/PRODUCTION-201904011212-888653470/patched-habbo.swf', 'flash-container', '100%', '100%', '11.1.0', '//images.habbo.com/habboweb/63_1d5d8853040f30be0cc82355679bba7c/11956/web-gallery/flash/expressInstall.swf', flashvars, params, null, null);
    </script>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WHR92JN"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="client-ui">
    <div id="flash-wrapper">
        <div id="flash-container">
            <div id="content" style="width: 400px; margin: 20px auto 0 auto; display: none">
                <p>FLASH NOT INSTALLED</p>
                <p><a href="http://www.adobe.com/go/getflashplayer"><img
                            src="//images.habbo.com/habboweb/63_1d5d8853040f30be0cc82355679bba7c/11956/web-gallery/v2/images/client/get_flash_player.gif"
                            alt="Get Adobe Flash player"/></a></p>
            </div>
        </div>
    </div>
    <div id="content" class="client-content"></div>
    <iframe id="page-content" class="hidden" allowtransparency="true" frameBorder="0" src="about:blank"></iframe>
</div>
</body>
</html>
