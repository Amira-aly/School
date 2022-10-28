<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_one{{$promotion->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('students_trans.Undo_student')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('promotions.destroy','test')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$promotion->id}}">
                    <h5 style="font-family: 'Cairo', sans-serif;">{{trans('students_trans.sure')}} {{$promotion->p_student->name}}</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('students_trans.Close')}}</button>
                        <button  class="btn btn-danger">{{trans('students_trans.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
