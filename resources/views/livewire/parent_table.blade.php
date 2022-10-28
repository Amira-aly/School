<button class="btn btn-success btn-lg btn-lg pull-right" style="margin-bottom: 10px" wire:click="showformadd" type="button">{{ trans('parent_trans.add_parent') }}</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ trans('parent_trans.Email') }}</th>
            <th>{{ trans('parent_trans.Name_Father') }}</th>
            <th>{{ trans('parent_trans.National_ID_Father') }}</th>
            <th>{{ trans('parent_trans.Passport_ID_Father') }}</th>
            <th>{{ trans('parent_trans.Phone_Father') }}</th>
            <th>{{ trans('parent_trans.Job_Father') }}</th>
            <th>{{ trans('parent_trans.Processes') }}</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($parentts as $parent)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{ $parent->email }}</td>
                <td>{{ $parent->name_father }}</td>
                <td>{{ $parent->national_father }}</td>
                <td>{{ $parent->passport_father }}</td>
                <td>{{ $parent->phone_father }}</td>
                <td>{{ $parent->job_father }}</td>
                <td>
                    <button wire:click="edit({{ $parent->id }})" title="{{ trans('level_trans.Edit') }}"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $parent->id }})" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
    </table>
</div>
