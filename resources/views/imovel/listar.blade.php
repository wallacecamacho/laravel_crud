@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Imovel
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ route('rotaImovelSearch') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="nome" class="col-sm-3 control-label">Imovel</label>

                            <div class="col-sm-6">
                                <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Pesquisar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($listaImoveis) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Imóveis
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Imóvel</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($listaImoveis as $imovel)
                                    <tr>
                                        <td class="table-text"><div>{{ $imovel->nome }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form  action="{{ route('imoveis.destroy',$imovel->id) }}" method="DELETE">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection