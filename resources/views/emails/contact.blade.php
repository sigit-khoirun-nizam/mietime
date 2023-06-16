<x-mail::message>
# Contact dari {{ $name }}

{{ $content }}

<x-mail::button :url="''">
Lihat disini
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
