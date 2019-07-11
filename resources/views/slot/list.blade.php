@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Show SLOTS</h3></div>

                <div class="card-body">
                    

                        <form action="{{route('slot.filter')}}" method="POST">

                            <input type="text" name="datetimes" style="width:100%;"><br><br>
                            @csrf
                            <button type="submit">TAIP</button>
                        </form>

                        @foreach ($list as $slot)
                            {{$slot->provider_id}}<br>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>    



<script>
    $(function() {
      $('input[name="datetimes"]').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
          format: 'M/DD hh:mm A'
        }
      });
    });
    </script>
@endsection