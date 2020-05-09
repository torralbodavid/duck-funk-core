<input type="hidden" name="recaptcha_response" id="recaptchaResponse">

<script src="https://www.google.com/recaptcha/api.js?render={{ $site_key }}" async defer></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute("{{ env('CAPTCHA_SITE_KEY', '') }}", {action: '{{ $action }}'}).then(function(token) {
            var recaptchaResponse = document.getElementById('recaptchaResponse');
            recaptchaResponse.value = token;
        });
    });
</script>
