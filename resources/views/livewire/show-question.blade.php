<div class="container m-4" >
    <div>
        <div class="card card-statistics mb-30">
            <div class="card-body">
                <div class="container">
                <h5 class="card-title"> {{$data[$counter]->title}}</h5>

                @foreach(preg_split('/(-)/', $data[$counter]->answers) as $index=>$answer)
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio{{$index}}" name="customRadio" class="custom-control-input" inh>
                        <br>
                        <label style="padding-left: 34px;" class="custom-control-label" for="customRadio{{$index}}" wire:click="nextQuestion({{$data[$counter]->id}} , {{$data[$counter]->score}} , '{{$answer}}', '{{$data[$counter]->right_answer}}')"> {{$answer}} </label>
                        <br>
                    </div>
                @endforeach
                </div>

            </div>
        </div>
    </div>

</div>
