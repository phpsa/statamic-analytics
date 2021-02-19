<div class="card p-0 content">
    <div class="py-2 px-3">
        <h2>{{ __('statamic-analytics::messages.most-viewed-pages-header', ['days' => 7]) }}</h2>
    </div>
    <div class="px-3 pb-2">
        @if ($message)
        <p class="bg-red-lighter text-red-dark p-2 border-red-dark rounded">
            {{$message}}
        </p>
        @endif
        @if ($data)
        @switch($config['display'] ?? 'table')
        @case('bar-chart')
        @case('bar')
        <bar-chart :chartdata="mvpChartData" />
        @break

        @case('line-chart')
        @case('line')
        <line-chart :chartdata="mvpChartData" />
        @break

        @case('pie-chart')
        @case('pie')
        <pie-chart :chartdata="mvpChartData" />
        @break

        @case('doughnut-chart')
        @case('doughnut')
        <doughnut-chart :chartdata="mvpChartData" />
        @break

        @case('radar-chart')
        @case('radar')
        <radar-chart :chartdata="mvpChartData" />
        @break

        @case('polar-chart')
        @case('polar')
        <polar-chart :chartdata="mvpChartData" />
        @break

        @case('bubble-chart')
        @case('bubble')
        <bubble-chart :chartdata="mvpChartData" />
        @break

        @case('scatter-chart')
        @case('scatter')
        <scatter-chart :chartdata="mvpChartData" />
        @break

        @default
        <table class="data-table">
            <thead>
                <tr>
                    <th>{{ __('statamic-analytics::messages.page') }}</th>
                    <th>{{ __('statamic-analytics::messages.views') }}</th>
                </tr>
            </thead>
            <!---->
            <tbody tabindex="0">
                @foreach ($data as $item)
                <tr>
                    <td> <a target="_blank" href="{{  url($item['url']) }}">{{ $item['pageTitle']}}</a></td>
                    <td> {{ $item['pageViews']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endswitch
        @endif
    </div>

</div>
@if ($data)
<script>
    const mvpChartData = {
        labels: {!! json_encode($data->pluck("pageTitle")) !!},
    datasets: [
    {
    label: "Views",
    data: {!! json_encode($data->pluck("pageViews"))!!},

    }]
        };




</script>
@endif
