<div class="text-center mb-3">

    <div class="d-inline mx-3">
      Malo
    </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="{{$question}}" id="{{$question}}"
        value="1" {{ $survey =='1' ? 'checked':'' }}/>
      <label class="form-check-label" for="inlineRadio1">1</label>
    </div>
    
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="{{$question}}" id="{{$question}}"
        value="2" {{ $survey =='2' ? 'checked':'' }}/>
      <label class="form-check-label" for="inlineRadio2">2</label>
    </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="{{$question}}" id="{{$question}}"
        value="3" {{ $survey =='3' ? 'checked':'' }}/>
      <label class="form-check-label" for="inlineRadio3">3</label>
    </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="{{$question}}" id="{{$question}}"
        value="4" {{ $survey =='4' ? 'checked':'' }}/>
      <label class="form-check-label" for="inlineRadio4">4</label>
    </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="{{$question}}" id="{{$question}}"
        value="5" {{ $survey =='5' ? 'checked':'' }}/>
      <label class="form-check-label" for="inlineRadio5">5</label>
    </div>

    <div class="d-inline me-4">
      Excelente
    </div>

  </div>
