<style>
    .capitalize {
        text-transform: lowercase;
    }
</style>

@component('mail::message')
# Your account is active now

To login use your diplomat code

@component('mail::button', ['url' => url('/login')])
Login
@endcomponent

Thanks,<br>
<p class="capitalize">{{ $user->name }} {{ $user->last_name }}</p>
@endcomponent
