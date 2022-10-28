<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_receipt{{$payment_student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('fee_trans.delete_exchange') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('payment_students.destroy','test')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$payment_student->id}}">
                    <h5 style="font-family: 'Cairo', sans-serif;"> {{ trans('fee_trans.Warning_fee') }}</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('fee_trans.Close')}}</button>
                        <button  class="btn btn-danger">{{trans('fee_trans.delete_exchange')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
