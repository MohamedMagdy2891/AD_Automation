
    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
        <div class="form-group">
            <input type="hidden" name="unlock" value="{{$row['data']['commandId']}}">
            <button type="submit" class="btn btn-primary mb-2 w-100">السماح بفتح أبواب السيارة</button>

        </div>
    </div>
    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
        <div class="form-group">
            <input type="hidden" name="lock" value="{{$row['data']['commandId']}}">
            <button type="submit" class="btn btn-danger mb-2 w-100">غلق أبواب السيارة</button>
        </div>
    </div>
