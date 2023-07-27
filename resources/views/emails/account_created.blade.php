<x-mail::message>
#  Congratulations to {{$infomation['name']}}!

Your account has been created DPLC.com

<x-mail::panel>
    <p>Email: </br> {{$infomation['email']}} </p>
    <p>Password: </br> {{$infomation['password']}} </p>
<br>
    <h2>Role:  {{$infomation['role']}} </h2>
</x-mail::panel>
<p>You can change password by login into your Account</p>


<x-mail::button :url="url('login')" color="success">
    Click to login
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
