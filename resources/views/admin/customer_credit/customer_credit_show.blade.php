@extends("admin.master_admin")

@section("content")



<div class="row p-3">

    <div class="col-lg-12">

        <div class="card card-default">
            <div class="row p-3">
                <div class="col-lg-12 ">
                    <a href="{{ route('customer.credit.pdf')}}" class="btn btn-success btn-sm float-right" target="_blank"><i class="fa-solid fa-circle-plus text-dark"></i> Download PDF</a>
                </div>
            </div>
            <div class="card-header card-header-border-bottom">
                <h2>Customer Credit List Table</h2>
            </div>
            <div class="card-body">

                <table class="table table-striped" id="categoryTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Invoice No</th>
                            <th scope="col">Date</th>
                            <th scope="col" style="text-align: center">Due Amount (Tk)</th>
                            <th scope="col" style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 0; $total_due = 0; @endphp

                        @foreach($data as $datum)

                        @php $count++; $total_due += $datum->due_amount; @endphp
                        <tr>
                            <td scope="row">{{ $count }}</td>
                            <td>{{ $datum->customerName->customer_name }}</td>
                            <td>{{ $datum->invoice_no }}</td>
                            <td>{{ $datum->invoice_date }}</td>
                            <td style="text-align: center">{{ $datum->due_amount }}</td>
                            <td style="text-align: center">
                                <a href="{{ route('customer.credit.edit', ['id' => $datum->id, 'invoice_id' => $datum->invoice_id]) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a> ||
                                <a href="{{ route('customer.credit.details', ['id' => $datum->id]) }}" class="btn btn-sm btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" style="text-align: right;"><strong>Grand Total:</strong> </td>
                            <td style="font-weight: bold; font-size: 18px; text-align:center">{{ $total_due }}</td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>
</div>



@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#categoryTable').DataTable();
    });
</script>
@endsection