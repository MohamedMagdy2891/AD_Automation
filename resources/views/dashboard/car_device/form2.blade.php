
    <div class="col-xl-3 col-lglg-3 col-md-9 col-sm-12 col-12 ">
        <div class="form-group ">
            <button  type="submit" value="unlock"name="lockAndBlockReverse"class="btn btn-primary mb-2 w-100">السماح بفتح أبواب السيارة</button>

        </div>
    </div>
    <div class="col-xl-3 col-lglg-3 col-md-9 col-sm-12 col-12 ">
        <div class="form-group ">
            <button  type="submit"value="lock" name="lockAndBlockReverse"class="btn card-header mb-2 w-100">غلق أبواب السيارة</button>
        </div>
    </div>



    @if($block=="BLOCK")
    <div class="col-xl-3 col-lglg-3 col-md-9 col-sm-12 col-12 ">
        <div class="form-group">

            <button type="submit" value="unblock"name="lockAndBlockReverse" class="btn btn-primary mb-2 w-100">السماح بفتح محرك السيارة</button>

        </div>
    </div>
    <div class="col-xl-3 col-lglg-3 col-md-9 col-sm-12 col-12 ">
        <div class="form-group ">
            <button type="submit" value="unlockAndUnblock" name="lockAndBlockReverse"class="btn btn-primary mb-2 w-100">  فتح المحرك و أبواب السيارة</button>

        </div>
    </div>
    @else
    <div class="col-xl-3 col-lglg-3 col-md-9 col-sm-12 col-12 ">
        <div class="form-group">

            <button type="submit" value="block"name="lockAndBlockReverse"class="btn card-header mb-2 w-100">غلق محرك السيارة</button>

        </div>
    </div>
    <div class="col-xl-3 col-lglg-3 col-md-9 col-sm-12 col-12 ">
        <div class="form-group ">
            <button type="submit" value="lockAndBlock"name="lockAndBlockReverse"class="btn card-header mb-2 w-100">  غلق المحرك و أبواب السيارة  </button>

        </div>
    </div>
    @endif
