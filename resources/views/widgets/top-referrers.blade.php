<div class="card p-0 content">
    <div class="py-2 px-3">
        <h2>{{ __('statamic-analytics::messages.top-referrers-header', ['days' => 7]) }}</h2>
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
                    <th>Url</th>
                    <th>Referrals</th>
                </tr>
            </thead>
            <!---->
            <tbody tabindex="0">
                @foreach ($data as $item)
                <tr>
                    <td> <a target="_blank" href="{{  url($item['url']) }}">{{ $item['url']}}</a></td>
                    <td> {{ $item['pageViews']}}</td>
                </tr>
                @endforeach



            </tbody>
        </table>
        @endif
    </div>

</div>
