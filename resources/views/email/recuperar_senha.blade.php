@component('mail::message')
<p style="text-align: justify; font-weight:bold;">Prezado(a) {{ $user->name }},</p>

<p style="text-align: justify;">Recebemos uma solicitação de redefinição 
    de Palavra-Passe para a sua conta. Para concluir o processo de recuperação, 
    clica no botão abaixo:
</p>


@component('mail::button', ['url'=>"http://127.0.0.1:8000/user/mail/{$user->token}/{$user->id}"])
    Recuperar Palavra-Passe
@endcomponent

<p style="text-align: justify;">Se você tiver alguma dúvida ou precisar de
    assistência adicional, não hesite em entrar em contato
    connosco. Estamos aqui para ajudar.
</p>
<br/>
<p style="text-align: justify;">
Atenciosamente,<br/>
[INSCRITOR]<br/>
[+244 922 000 000]<br/>
</p>
@endcomponent
