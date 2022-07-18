

    @if(!$unblock)
    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
        <div class="form-group">
            <input type="hidden" name="unblock" value="{{$row['data']['commandId']}}">
            <button type="submit" class="btn btn-primary mb-2 w-100">السماح بفتح محرك السيارة</button>
        </div>
    </div>

    @else
    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
        <div class="form-group">
            <input type="hidden" name="block" value="{{$row['data']['commandId']}}">
            <button type="submit" class="btn btn-danger mb-2 w-100">غلق محرك السيارة</button>
        </div>
    </div>
    @endif



