<div class="container mx-auto px-4">
    <!-- ... -->

    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Salary Projection') }}
    </h2>
    <br>
    <h5 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
        Actual Salary: $${{ $employee->base_salary }}
    </h5>

    <div id="app">
        {!! $chart->container() !!}
    </div>
</div>
<script src="https://unpkg.com/vue"></script>
<script>
    var app = new Vue({
        el: '#app',
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
{!! $chart->script() !!}
