@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">


        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Alterar Categoria</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Alterar Categoria

                </h6>


                <div class="table-wrapper">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ url('update/category/'.$category->id) }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nome Categoria</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Categoria"
                                   value="{{ $category->category_name }}" name="category_name">
                        </div>


                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Salvar</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Fechar</button>
                </div>
                </form>
                </div><!-- table-wrapper -->
            </div><!-- card -->



        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->


        <!-- LARGE MODAL -->
        <div id="modaldemo3" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Adicionar Categoria</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->




@endsection
