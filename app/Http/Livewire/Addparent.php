<?php

namespace App\Http\Livewire;
use App\Models\Nationality;
use App\Models\Religion;
use App\Models\Parentt;
use App\Models\ParentFile;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use DB;

class Addparent extends Component
{
    use WithFileUploads;
    public $successMessage ='';
    public $catchError,$updateMode = false,$photos,$show_table = true,$Parent_id;
    public $currentStep = 1,
    $email, $password,
    $name_father, $name_father_en,
    $national_father, $passport_father,
    $phone_father, $job_father, $job_father_en,
    $nationality_father_id,$address_father, $religion_father_id,
    $name_mother, $name_mother_en,
    $national_mother, $passport_mother,
    $phone_mother, $job_mother, $job_mother_en,
    $nationality_mother_id,$address_mother, $religion_mother_id;

public function updated($propertyName)
{
    $this->validateOnly($propertyName, [
        'email' => 'required|email',
        'national_father' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
        'passport_father' => 'min:10|max:10',
        'phone_father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'national_mother' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
        'passport_mother' => 'min:10|max:10',
        'phone_mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
    ]);
}

public function render()
{
    return view('livewire.addparent', [
        'nationalities' => Nationality::all(),
        'religions' => Religion::all(),
        'parentts' => Parentt::all(),
    ]);

}

public function showformadd(){
    $this->show_table = false;
}

//firstStepSubmit
public function firstStepSubmit()
{
    $this->validate([
        'email' => 'required|unique:parentts,email,'.$this->id,
        'password' => 'required',
        'name_father' => 'required',
        'name_father_en' => 'required',
        'job_father' => 'required',
        'job_father_en' => 'required',
        'national_father' => 'required|unique:parentts,national_father,' . $this->id,
        'passport_father' => 'required|unique:parentts,passport_father,' . $this->id,
        'phone_father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'nationality_father_id' => 'required',
        'religion_father_id' => 'required',
        'address_father' => 'required',
    ]);
    $this->currentStep = 2;
}

//secondStepSubmit
public function secondStepSubmit()
{
    $this->validate([
        'email' => 'required|unique:parentts,email,'.$this->id,
        'password' => 'required',
        'name_mother' => 'required',
        'name_mother_en' => 'required',
        'job_mother' => 'required',
        'job_mother_en' => 'required',
        'national_mother' => 'required|unique:parentts,national_mother,' . $this->id,
        'passport_mother' => 'required|unique:parentts,passport_mother,' . $this->id,
        'phone_mother' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'nationality_mother_id' => 'required',
        'religion_mother_id' => 'required',
        'address_mother' => 'required',
    ]);
    $this->currentStep = 3;
}


//back
public function back($step)
{
    $this->currentStep = $step;
}

//submitForm
public function submitForm()
{
    try {
        $parentt= new Parentt();
        $parentt->email = $this->email;
        $parentt->password = Hash::make($this->password);
        $parentt->name_father = ['en' => $this->name_father_en, 'ar' => $this->name_father];
        $parentt->national_father = $this->national_father;
        $parentt->passport_father = $this->passport_father;
        $parentt->phone_father = $this->phone_father;
        $parentt->job_father = ['en' => $this->job_father_en, 'ar' => $this->job_father];
        $parentt->nationality_father_id = $this->nationality_father_id;
        $parentt->religion_father_id = $this->religion_father_id;
        $parentt->address_father = $this->address_father;
        $parentt->name_mother = ['en' => $this->name_mother_en, 'ar' => $this->name_mother];
        $parentt->national_mother = $this->national_mother;
        $parentt->passport_mother = $this->passport_mother;
        $parentt->phone_mother = $this->phone_mother;
        $parentt->job_mother = ['en' => $this->job_mother_en, 'ar' => $this->job_mother];
        $parentt->nationality_mother_id = $this->nationality_mother_id;
        $parentt->religion_mother_id = $this->religion_mother_id;
        $parentt->address_mother = $this->address_mother;
        $parentt->save();
        if (!empty($this->photos)){
            foreach ($this->photos as $photo) {
                $photo->storeAs($this->national_father, $photo->getClientOriginalName(), $disk = 'parent_files');
                ParentFile::create([
                    'name_file' => $photo->getClientOriginalName(),
                    'parent_id' => Parentt::latest()->first()->id,
                ]);
            }
        }
        $this->successMessage = trans('messages.success');
        $this->clearForm();
        $this->currentStep = 1;
    }
    catch (\Exception $e) {
        $this->catchError = $e->getMessage();
    };

}

public function clearForm()
{
        $this->email = '';
        $this->password = '';
        $this->name_father = '';
        $this->name_father_en = '';
        $this->job_father = '';
        $this->job_father_en = '';
        $this->national_father ='';
        $this->passport_father = '';
        $this->phone_father = '';
        $this->nationality_father_id = '';
        $this->address_father ='';
        $this->religion_father_id ='';
        $this->name_mother = '';
        $this->job_mother = '';
        $this->job_mother_en = '';
        $this->name_mother_en = '';
        $this->national_mother ='';
        $this->passport_mother = '';
        $this->phone_mother = '';
        $this->nationality_mother_id = '';
        $this->address_mother ='';
        $this->religion_mother_id ='';

}

public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $parent = Parentt::where('id',$id)->first();
        $this->Parent_id = $id;
        $this->email = $parent->email;
        $this->password = $parent->password;
        $this->name_father = $parent->getTranslation('name_father', 'ar');
        $this->name_father_en = $parent->getTranslation('name_father', 'en');
        $this->job_father = $parent->getTranslation('job_father', 'ar');;
        $this->job_father_en = $parent->getTranslation('job_father', 'en');
        $this->national_father =$parent->national_father;
        $this->passport_father = $parent->passport_father;
        $this->phone_father = $parent->phone_father;
        $this->nationality_father_id = $parent->nationality_father_id;
        $this->religion_father_id = $parent->religion_father_id;
        $this->address_father =$parent->address_father;
        $this->religion_mother_id =$parent->religion_mother_id;
        $this->name_mother = $parent->getTranslation('name_mother', 'ar');
        $this->name_mother_en = $parent->getTranslation('name_mother', 'en');
        $this->job_mother = $parent->getTranslation('job_mother', 'ar');;
        $this->job_mother_en = $parent->getTranslation('job_mother', 'en');
        $this->national_mother =$parent->national_mother;
        $this->passport_mother = $parent->passport_mother;
        $this->phone_mother = $parent->phone_mother;
        $this->nationality_mother_id = $parent->nationality_mother_id;
        $this->address_mother =$parent->address_mother;
        $this->religion_mother_id =$parent->religion_mother_id;
    }

    //firstStepSubmit
    public function firstStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 2;

    }

    //secondStepSubmit_edit
    public function secondStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 3;

    }

    public function submitForm_edit(){

        if ($this->Parent_id){
            $parentt = Parentt::find($this->Parent_id);
            $parentt->update([
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'name_father' => ['en' => $this->name_father_en, 'ar' => $this->name_father],
                'national_father' => $this->national_father,
                'passport_father'=> $this->passport_father,
                'phone_father' => $this->phone_father,
                'job_father' => ['en' => $this->job_father_en, 'ar' => $this->job_father],
                'nationality_father_id' => $this->nationality_father_id,
                'religion_father_id' => $this->religion_father_id,
                'address_father' => $this->address_father,
                'name_mother' => ['en' => $this->name_mother_en, 'ar' => $this->name_mother],
                'national_mother' => $this->national_mother,
                'passport_mother' => $this->passport_mother,
                'phone_mother' => $this->phone_mother,
                'job_mother' => ['en' => $this->job_mother_en, 'ar' => $this->job_mother],
                'nationality_mother_id' => $this->nationality_mother_id,
                'religion_mother_id' => $this->religion_mother_id,
                'address_mother' => $this->address_mother,
            ]);

        }

        return redirect()->to('/add_parent');
    }

    public function delete(Request $request , $id){
        Parentt::findOrFail($id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->to('/add_parent');
    }


}
