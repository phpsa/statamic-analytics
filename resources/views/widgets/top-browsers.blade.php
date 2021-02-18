<div class="card p-0 content">
    <div class="py-2 px-3">
        <h2>{{ __('statamic-analytics::messages.top-browsers-header', ['days' => $config['days'] ?? 7 ]) }}</h2>
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
        <bar-chart :chartdata="tbChartData" />
        @break

        @case('line-chart')
        @case('line')
        <line-chart :chartdata="tbChartData" />
        @break

        @case('pie-chart')
        @case('pie')
        <pie-chart :chartdata="tbChartData" />
        @break

        @case('doughnut-chart')
        @case('doughnut')
        <doughnut-chart :chartdata="tbChartData" />
        @break

        @case('radar-chart')
        @case('radar')
        <radar-chart :chartdata="tbChartData" />
        @break

        @case('polar-chart')
        @case('polar')
        <polar-chart :chartdata="tbChartData" />
        @break

        @case('bubble-chart')
        @case('bubble')
        <bubble-chart :chartdata="tbChartData" />
        @break

        @case('scatter-chart')
        @case('scatter')
        <scatter-chart :chartdata="tbChartData" />
        @break

        @default
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
        @endswitch
        @endif
    </div>

</div>


<script>
    const tbChartData = {
        labels: {!! json_encode($data-> pluck("browser")) !!},
    datasets: [{

        label: "{{ __('statamic-analytics::messages.top-browsers-header', ['days' => $config['days'] ?? 7 ]) }}",
        data: {!! json_encode($data -> pluck("sessions"))!!},

        }]
        };

</script>
