@if($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>

                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('parent_trans.Name_Mother')}}</label>
                        <input type="text" wire:model="name_mother" class="form-control">
                        @error('name_mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('parent_trans.Name_Mother_en')}}</label>
                        <input type="text" wire:model="name_mother_en" class="form-control">
                        @error('name_mother_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-3">
                        <label for="title">{{trans('parent_trans.Job_Mother')}}</label>
                        <input type="text" wire:model="job_mother" class="form-control">
                        @error('job_mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="title">{{trans('parent_trans.Job_Mother_en')}}</label>
                        <input type="text" wire:model="job_mother_en" class="form-control">
                        @error('job_mother_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{trans('parent_trans.National_ID_Mother')}}</label>
                        <input type="text" wire:model="national_mother" class="form-control">
                        @error('national_mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('parent_trans.Passport_ID_Mother')}}</label>
                        <input type="text" wire:model="passport_mother" class="form-control">
                        @error('passport_mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{trans('parent_trans.Phone_Mother')}}</label>
                        <input type="text" wire:model="phone_mother" class="form-control">
                        @error('phone_mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">{{trans('parent_trans.Nationality_Father_id')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="nationality_mother_id">
                            <option selected>{{trans('parent_trans.Choose')}}...</option>
                            @foreach($nationalities as $national)
                                <option value="{{$national->id}}">{{$national->name}}</option>
                            @endforeach
                        </select>
                        @error('nationality_mother_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputZip">{{trans('parent_trans.Religion_Father_id')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="religion_mother_id">
                            <option selected>{{trans('parent_trans.Choose')}}...</option>
                            @foreach($religions as $religion)
                                <option value="{{$religion->id}}">{{$religion->name}}</option>
                            @endforeach
                        </select>
                        @error('religion_mother_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">{{trans('parent_trans.Address_Mother')}}</label>
                    <textarea class="form-control" wire:model="address_mother" id="exampleFormControlTextarea1"
                              rows="4"></textarea>
                    @error('address_mother')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <button class="btn btn-danger btn-lg nextBtn btn-lg pull-right" style="margin: 0 10px " type="button" wire:click="back(1)">
                    {{trans('parent_trans.Back')}}
                </button>

                @if($updateMode)
                    <button class="btn btn-success btn-lg nextBtn btn-lg pull-right" wire:click="secondStepSubmit_edit"
                            type="button">{{trans('parent_trans.Next')}}
                    </button>
                @else
                    <button class="btn btn-success btn-lg nextBtn btn-lg pull-right" type="button"
                            wire:click="secondStepSubmit">{{trans('parent_trans.Next')}}</button>
                @endif

            </div>
        </div>
    </div>
