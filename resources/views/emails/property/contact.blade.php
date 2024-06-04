@component('mail::message')
# Nouvelle demande de contact

Une nouvelle demande de contacte a été fait pour le bien <a href="{{route('property.show', ['slug' => $property->getSlug(), 'property' => $property])}}">{{ $property->title }}</a>

- Prénom : {{ $data['firstname'] }}
- Nom : {{ $data['lastname'] }}
- Contact : {{ $data['phone'] }}
- Email : {{ $data['email'] }}

Merci,<br>
{{ config('app.name') }}
@endcomponent
