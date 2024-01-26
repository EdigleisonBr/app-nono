@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600 text-danger">
            {{ __('Opss!') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600 text-danger">
            @foreach ($errors->all() as $error)
                <li style="list-style-type: none;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
