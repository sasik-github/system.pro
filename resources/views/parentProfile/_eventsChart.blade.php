<div class="row">

    <div class="col-sm-12">

        <div class="row">
            <div class="col-sm-4 col-sm-push-4">
                <div class='input-group date' id='chart_date'>
                    <input type='text' class="form-control" value="{{\Carbon\Carbon::now()->format(config('app.dateformat'))}}"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 chart">
                <canvas id="myChart" width="800" height="400"></canvas>
            </div>

            <input type="hidden" id="chart_card_number" value="{{$child->card_number}}">
        </div>
    </div>
</div>