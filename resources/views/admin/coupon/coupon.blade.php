@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">


        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Cupons</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Lista de Cupons
                    <a href="" class="btn btn-sm btn-warning" style="float: right;"
                       data-toggle="modal" data-target="#modaldemo3"
                    >Adicionar Novo</a>
                </h6>


                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Código de Cupom</th>
                            <th class="wd-15p">Cupom de Desconto</th>
                            <th class="wd-20p">Ação</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupon as $key=>$row)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $row->coupon }}</td>
                                <td>{{ $row->discount }} %</td>
                                <td>
                                    <a href="{{ \Illuminate\Support\Facades\URL::to('edit/coupon/'.$row->id) }}" class="btn btn-sm btn-info">Editar</a>
                                    <a href="{{ \Illuminate\Support\Facades\URL::to('delete/coupon/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Excluir</a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->



        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->


        <!-- LARGE MODAL -->
        <div id="modaldemo3" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Adicionar Cupom</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pd-20">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('store.coupon') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Código de Cupom</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="Código de Cupom" name="coupon">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Desconto de Cupom (%)</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="Desconto de Cupom" name="discount">
                            </div>


                    </div><!-- modal-body -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">Salvar</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Fechar</button>
                    </div>
                    </form>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->




@endsection
