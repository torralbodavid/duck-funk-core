@if(config('duck-funk.captcha.active'))
<script src="https://www.google.com/recaptcha/api.js?render={{ $site_key }}" async defer></script>
<script>
    const form = document.getElementById('{{ $form }}')
    form.addEventListener("submit", function (e) {
        e.preventDefault()

        grecaptcha.ready(function () {
            grecaptcha.execute("{{ config('duck-funk.captcha.site_key') }}", {action: '{{ request()->page->slug ?? $form }}'}).then(function (token) {
                let recaptcha_response = document.createElement('input')
                recaptcha_response.type = 'hidden'
                recaptcha_response.name = 'recaptcha_response'
                recaptcha_response.id = 'recaptcha_response'
                form.appendChild(recaptcha_response)

                let recaptchaResponse = document.getElementById('recaptcha_response')
                recaptchaResponse.value = token
                form.submit()
            })
        })
    })
</script>
@endif
