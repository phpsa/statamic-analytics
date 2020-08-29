<div class="card p-0 content">
    <div class="py-2 px-3">
        <h2>{{ __('statamic-analytics::messages.top-browsers-header', ['days' => 7]) }}</h2>
    </div>
    <div class="px-3 pb-2">
        @if ($message)
        <p class="bg-red-lighter text-red-dark p-2 border-red-dark rounded">
            {{$message}}
        </p>
        @endif
        @if ($data)
        <table class="data-table">
            <thead>
                <tr>
                    <th>{{ __('statamic-analytics::messages.browser') }}</th>
                    <th>{{ __('statamic-analytics::messages.sessions') }}</th>
                </tr>
            </thead>
            <!---->
            <tbody tabindex="0">
                @foreach ($data as $item)
                <tr>
                    <td> {{$item['browser'] }}</td>
                    <td> {{ $item['sessions']}}</td>
                </tr>
                @endforeach



            </tbody>
        </table>
        @endif
    </div>

</div>
