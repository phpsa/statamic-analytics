<div class="card p-0 content">
    <div class="py-2 px-3">
        <h2>{{ __('statamic-analytics::messages.total-vistitors-and-page-header', ['days' => 7]) }}</h2>
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
        <bar-chart :chartdata="tvpChartData" />
        @break

        @case('line-chart')
        @case('line')
        <line-chart :chartdata="tvpChartData" />
        @break

        @case('pie-chart')
        @case('pie')
        <pie-chart :chartdata="tvpChartData" />
        @break

        @case('doughnut-chart')
        @case('doughnut')
        <doughnut-chart :chartdata="tvpChartData" />
        @break

        @case('radar-chart')
        @case('radar')
        <radar-chart :chartdata="tvpChartData" />
        @break

        @case('polar-chart')
        @case('polar')
        <polar-chart :chartdata="tvpChartData" />
        @break

        @case('bubble-chart')
        @case('bubble')
        <bubble-chart :chartdata="tvpChartData" />
        @break

        @case('scatter-chart')
        @case('scatter')
        <scatter-chart :chartdata="tvpChartData" />
        @break

        @default
        <table class="data-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Visitors</th>
                    <th>Views</th>
                </tr>
            </thead>
            <!---->
            <tbody tabindex="0">
                @foreach ($data as $item)
                <tr>
                    <td> {{ $item['date'] }}</td>
                    <td> {{ $item['visitors']}} </td>
                    <td> {{ $item['pageViews']}}</td>
                </tr>
                @endforeach



            </tbody>
        </table>
        @endswitch
        @endif
    </div>

</div>


<script>
    const tvpChartData = {
        labels: {!! json_encode($data->map(function($row) {
            $row['date'] = $row['date']->format("Y-m-d");
            return $row;
         })->pluck("date")) !!},
    datasets: [{
        label: "Visitors",
        data: {!! json_encode($data->pluck("visitors"))!!},

        },
    {
    label: "Views",
    data: {!! json_encode($data->pluck("pageViews"))!!},

    }]
        };





</script>
