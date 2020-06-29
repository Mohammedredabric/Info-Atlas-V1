@php $days = array('saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday');@endphp
@foreach($days as $day)
    @php $pieces =  explode("-", $listing->time->$day);

    @endphp
    <div class="col-md-6 col-lg-6 col-sm-12">
        <div class="form-group">
        <label for="">{{$day}} Opening {{  (int)$day }} </label>
        <select class="mb-2 form-control form-control-sm" id="" name="time_configuration[{{$day}}Opening]" >
            @php $num = null @endphp
            @if ((int)$pieces[0] >= 0 && (int)$pieces[0] <= 23 && $pieces[0]!=="closed")
               @php $num=(int)$pieces[0] @endphp
            @endif

        @for ($i = 0; $i < 24; $i++)
                    <option value="{{$i}}" {{ ($i === $num  )? "selected":"" }}> {{($i)? $i:"00"}}:00  </option>
            @endfor

            <option value="closed" {{ ($pieces[0] =='closed' )? "selected":"" }}>closed</option>

        </select>
            <label for="">{{$day}} Closing</label>
            <select class="mb-2 form-control form-control-sm" id="" name="time_configuration[{{$day}}Closing]">
                @php $num = null @endphp
                @if ((int)$pieces[1] >= 0 && (int)$pieces[1] <= 23 && $pieces[1]!=="closed")
                    @php $num=(int)$pieces[1] @endphp
                @endif
            @for ($i = 0; $i < 24; $i++)
                        <option value="{{$i}}" {{ ($i === $num )? "selected":"" }}> {{($i)? $i:"00"}}:00  </option>
                @endfor
                <option value="closed" {{ ($pieces[1] =='closed' )? "selected":"" }}>closed</option>
            </select>
        </div>
    </div>
@endforeach
