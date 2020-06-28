
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Cadastrar Nova Permissão</h1>
@stop

@section('content')
    <div class="row">

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-users"></i>
                    </span>

                <div class="info-box-content">
                    <span class="info-box-text">Total de Usuários</span>
                    <span class="info-box-number">{{ $totalUsers }}</span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-tablet"></i>
                    </span>

                <div class="info-box-content">
                    <span class="info-box-text">Total de Mesas</span>
                    <span class="info-box-number">{{ $totalTables }}</span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>


            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-users"></i>
                    </span>

                <div class="info-box-content">
                    <span class="info-box-text">Total de Categorias</span>
                    <span class="info-box-number">{{ $totalCategories }}</span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>


            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-users"></i>
                    </span>

                <div class="info-box-content">
                    <span class="info-box-text">Total de Produtos</span>
                    <span class="info-box-number">{{ $totalProducts }}</span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>


        @admin()
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-users"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Total de Empresas</span>
                <span class="info-box-number">{{ $totalTenants }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        @endadmin

        @admin()
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-users"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Total de Planos</span>
                <span class="info-box-number">{{ $totalPlans }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        @endadmin


        @admin()
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-users"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Total de Cargos</span>
                <span class="info-box-number">{{ $totalRoles }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        @endadmin

        @admin()
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-users"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Total de Pefis</span>
                <span class="info-box-number">{{ $totalProfiles }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        @endadmin

        @admin()

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-users"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Total de Permissões</span>
                <span class="info-box-number">{{ $totalPermissions }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        @endadmin
    </div>
@stop
